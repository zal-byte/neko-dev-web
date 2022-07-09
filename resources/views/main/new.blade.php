@extends('../home')

@section('home-body')

	<div class="row justify-content-center ">
		<div class="col-lg-7">
			<div class="card border-0 shadow-sm">
				<div class="card-body">
					<span class="fa fa-solid fa-add fa-2xl"></span>
					<b>Create new post </b>
					<hr style="background-color: black;">
					<form id="myform" enctype="multipart/form-data">
						<input type="text" id="title" class="form-control form-control-lg" placeholder="Title">
						<textarea rows="5" class="form-control form-control-lg mt-2" id="description" placeholder="Description"></textarea>
						<input type="text" id="link" class="form-control form-control-lg mt-2"  placeholder="Resource link">
						<select class="form-select mt-2 form-select-lg" id="type">
							<option> No Type </option>
							<option value="Pack"> Pack </option>
							<option value="Extension"> Extension </option>
						</select>
						<input type="text" id="rp_version" class="form-control mt-2 form-control-lg" placeholder="Resource pack version ( Optional )">
						<input type="text" id="min_engine_version" class="form-control form-control-lg mt-2" placeholder="Min engine version">
						
						<label for="files" class="mt-2"> Choose image preview ( Optional ) </label>
						<input type="file" name="files[]" id="files" class="mt-1 form-control" multiple >

						<button type="button" id="submit" class="btn mt-3 w-50 btn-dark text-white float-end"> Submit </button>
						
					</form>
				</div>
			</div>	
		</div>
	</div>

	<div class="modal fade" data-backdrop="static" data-keyboard="false" tabindex="-1" id="uploadmodal">

		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-body">
					<b id="up_res_title"> Uploading ... </b>
					<p id="up_res_msg">
						Please wait...
					</p>
				</div>
			</div>
		</div>

	</div>

	<script type="text/javascript">
			
			$(document).ready(function(){
				$('#uploadmodal').modal({
					backdrop:'static',
					keyboard:false
				});	
				$('#submit').on('click', function(e){
					e.preventDefault();

					$('#uploadmodal').modal('show');

					$.ajaxSetup({
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						}
					});


					var d = new FormData();


					let totalFiles = $('#files')[0].files.length;
					let files = $('#files')[0];

					if(totalFiles > 0 ){
						for(let i= 0; i < totalFiles; i++){
							d.append('files' + i, files.files[i]);
						}
					}
					d.append('total_files', totalFiles);
					var title = $('#title').val();
					var description = $('#description').val();
					var type = $('#type').val();
					var link = $('#link').val();
					var rp_version = $('#rp_version').val();
					var min_engine_version = $('#min_engine_version').val();

					d.append('title', title);
					d.append('description', description);
					d.append('type', type);
					d.append('link',link);
					d.append('rp_version', rp_version);
					d.append('min_engine_version', min_engine_version);

					$.ajax({
						type:'POST',
						url: '{{route("new-blog-post")}}',
						data: d,
						cache:false,
						contentType:false,
						processData:false,
						success:function( res ){
							var jso = JSON.parse(JSON.stringify(res));
							
							if(jso.status == true ){
								$('#up_res_title').html("Upload successfully.");
								$("#up_res_msg").html(res.msg);
							}else{
								$('#up_res_title').html('Upload unsuccessfuly.');
								$('#up_res_msg').html(res.msg);
							}

							setTimeout(function(){
								$('#myform')[0].reset();
								$('#uploadmodal').modal('hide');
							},2000);
						},
						error: function(err){
							console.log('error');
							console.log(err);
						}
					});
				});

			});

	</script>

@endsection
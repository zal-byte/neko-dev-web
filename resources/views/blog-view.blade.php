@php
use Illuminate\Support\Facades\Auth;
@endphp

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
	@if($data)
	<title> {!! $data->title !!} </title>
	@endif
	<style type="text/css">
		body{
			overflow-x: hidden;
		}

		@media screen and (max-width: 762px){
			#modd{
				display: none;
			}
		}


		@media screen and (min-width: 762px){
			#mob{
				display: none;
			}
		}
	</style>
</head>
<body>
<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
	@if($data)

	<div class="navbar navbar-expand-lg bg-dark sticky-top" id="mynav">
		<div class="container-fluid">
			@if(Auth::check())
			<a class="nav-link" href="{{route('blog')}}"><span class="fa fa-solid fa-arrow-left fa-2xl"></span></a>
			@else
			<a class="navbar-brand"> NEKO </a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      			<span class="navbar-toggler-icon"></span>
    		</button>
		    <div class="collapse navbar-collapse" id="navbarSupportedContent">
		      <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
		        <li class="nav-item dropdown">
		          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
		            <span class="fa fa-solid fa-user">  </span> Account 
		          </a>
		          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
		            <li><a class="dropdown-item" href="{{route('login')}}">Login</a></li>
		            <li><a class="dropdown-item" href="{{route('signup')}}">Signup</a></li>
		            
		          </ul>
		        </li>
		      </ul>
		  </div>
			@endif
		</div>
	</div>

	<div class="row justify-content-center p-2">
		<div class="col-sm-5">
			<div class="card border-0 shadow-sm">
				<div class="card-body">
					<h2 class="font-weight-bold">{!! $data->title !!}</h2>

					@if($data->img)
						@php

						$unserialized = unserialize( $data->img );


						@endphp
						<div class="carousel slide" data-bs-ride="carousel" data-interval="false" id="mycarousel">
							<div class="carousel-indicators">
								@for($i=0; $i < count($unserialized);$i++)
									@if($i == 0)
									<button type="button" data-bs-target="#mycarousel" data-bs-slide-to="{{ $i }}" class="active" aria-current="true"></button>
									@else
									<button type="button" data-bs-target="#mycarousel" data-bs-slide-to="{{ $i }}"></button>
									@endif

								@endfor
							</div>
							<div class="carousel-inner">
								@php $index = 0;@endphp

								@foreach($unserialized as $sera)
									@if($index==0)
									<div class="carousel-item active">
										<img src="{{ asset($sera) }}" class="img-fluid d-block w-100" alt="...">
									</div>
									@else
									<div class="carousel-item">
										<img src="{{ asset($sera) }}" class="img-fluid d-block w-100">
									</div>
									@endif
									@php $index++; @endphp
								@endforeach
							</div>
							 <button class="carousel-control-prev" type="button" data-bs-target="#mycarousel" data-bs-slide="prev">
							    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
							    <span class="visually-hidden">Previous</span>
							  </button>
							  <button class="carousel-control-next" type="button" data-bs-target="#mycarousel" data-bs-slide="next">
							    <span class="carousel-control-next-icon" aria-hidden="true"></span>
							    <span class="visually-hidden">Next</span>
							  </button>
						</div>
					@endif

					<div id="mob" class="p-1 m-1">
						<div class="card shadow-sm">
							<div class="card-body">
								<strong> Resource pack information </strong><br>

								@if($data->min_engine_version)
									Minimal Engine Version <span class="badge bg-primary"> {!! $data->min_engine_version !!} </span>
								@endif
								<br>
								@if($data->rp_version)
									Resource pack version <span class="badge bg-primary"> {!! $data->rp_version !!} </span>
								@endif
							</div>
						</div>
					</div>

					<p class="pt-2 pb-2 mt-1">
						{!! $data->description !!}
					</p>
				</div>
			</div>
			<div class="card border-0 shadow-sm mt-4">
				<div class="card-body">
					<b> Comments</b>
				</div>
			</div>
		</div>
		<div class="col-sm-3" id="modd">
			<div class="card border-0 shadow-sm">
				<div class="card-body">
					<strong> Resource pack information </strong><br>
					@if($data->min_engine_version)
						Minimal Engine Version <span class="badge bg-primary"> {!! $data->min_engine_version !!} </span>
					@endif
					<br>
					@if($data->rp_version)
						Resource pack version <span class="badge bg-primary"> {!! $data->rp_version !!} </span>
					@endif
				</div>
			</div>	
		</div>
	</div>
	@else
	<div class="d-flex justify-content-center align-items-center vh-100 w-100">
		<div>
		<p class="text-center">
		<img src="{{asset('img/loli_smug.png')}}" style="width:30%">
	</p>
		<p class="text-center mt-1"><b>
			Article not found 
		</b></p>
		</div>
	</div>
	@endif
<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
<script type="text/javascript">
	$(function(){
		$('#mycarousel').carousel({interval:false,});
	})
</script>
</body>
</html>

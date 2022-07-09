@extends('../home')

@section('home-body')
	<style>
		body{
			background-color: #f5f5f5;
		}
	</style>
	@if(Auth::check())
	<h3 class="font-weight-bold p-3">
		My Post
	</h3>
	@else
	<h3 class="font-weight-bold">
		Posts
	</h3>
	@endif


	@if($data)
		@php 

		$col = 3;

		@endphp
		@foreach($data as $post)


		@if($col%3==0)
		<div class="row">
		@endif



			<div class="col-sm-4">
			@if(strlen($post->img) > 0 )
				@php
					$unserialized = unserialize( $post->img );
				@endphp
				<a href="/blog-view/{{$post->id}}" class="text-decoration-none">
				<div class="card border-0 mt-1 shadow-sm" style="background-image: url('{{asset($unserialized[0])}}'); background-size: cover; background-position: center; min-height: 250px;">
					<div class="rounded mask" style="background-color:rgba(0,0,0,0.6); min-height:250px;">
						<div class="card-body">
							<h3 class="text-white font-weight-bold"> {!! $post->title !!} </h3>
							@if($post->rp_version)
							<span class="badge bg-light text-dark"> RP Version <span class="badge bg-secondary"> {!! $post->rp_version !!}</span></span> 
							@endif
							@if($post->min_engine_version)
							<span class="badge bg-light text-dark">Min engine version<span class="badge bg-secondary"> {!!$post->min_engine_version !!}</span></span>
							@endif
						</div>
					</div>
				</div>
				</a>	
			@else
			<a href="/blog-view/{{$post->id}}" class="text-decoration-none">
				<div class="card border-0 mt-1 shadow-sm" style="min-height: 250px;">
					<div class="card-body">
							<h3 class="font-weight-bold"> {!! $post->title !!}</h3> 
							@if($post->rp_version)
							<span class="badge bg-light text-dark"> RP Version <span class="badge bg-secondary"> {!! $post->rp_version !!}</span> </span> 
							@endif
							@if($post->min_engine_version)
							<span class="badge bg-light text-dark"> Min engine version <span class="badge bg-secondary"> {!! $post->min_engine_version !!} </span></span>
							@endif
					</div>
				</div>
			</a>
			@endif
			</div>

		@php 
		$col++;
		@endphp	
		@if($col%3==0)
		</div>
		@endif
		@endforeach
	@endif

@endsection
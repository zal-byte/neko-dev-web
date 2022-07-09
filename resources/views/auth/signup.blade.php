@extends('../authentication')

@section('auth-body')

	<style type="text/css">
		.divider:after,
		.divider:before{
			content: "";
			flex: 1;
			height: 1px;
			background: #eee;
		}
	</style>

	<div class="card border-0 shadow-sm">
		<div class="card-body">
          <div class="divider d-flex align-items-center my-4">
            <h3 class="text-center fw-bold mx-3 mb-0">NEKO Project</h3>
          </div>
			<form method="post" action="{{route('signup_post')}}" enctype="multipart/form-data">
				@csrf
				<div class="form-group mb-3">
					<input type="text" name="name" class="form-control @error('name') is-invalid @enderror form-control-lg" placeholder="Fullname" required>
					@error('name')
					<span class="invalid-feedback" role="alert">
						{{ $message }}
					</span>
					@enderror
				</div>
				<div class="form-group">

					<input type="email" name="email" class="form-control @if(session()->has('user_error')) is-invalid @endif @if(session()->has('email_error')) is-invalid @endif form-control-lg" placeholder="Email address" required>
					@if(session()->has('user_error'))
						<span class="invalid-feedback" role="alert">
							{{ session()->get('user_error') }}
						</span>
					@elseif(session()->has('email_error'))
						<span class="invalid-feedback" role="alert">
							{{ session()->get('email_error') }}
						</span>
					@endif
				</div>
				<div class="form-group mt-3">
					<input type="email" name="confirm-email" class="form-control form-control-lg @if(session()->has('email_error')) is-invalid @endif" placeholder="Confirm email address" required>
					@if(session()->has('email_error'))
						<span class="invalid-feedback" role="alert">
							{{ session()->get('email_error') }}
						</span>
					@endif
				</div>
				<div class="form-group mt-3">
					<input type="password" name="password" class="form-control @error('password') is-invalid @enderror form-control-lg" placeholder="Password" required>
					@error('password')
					<span class="invalid-feedback" role="alert">
						{{ $message }}
					</span>
					@enderror
				</div>

				@if(session()->has('error'))
				<div class="bg-danger text-white p-2 rounded mt-2">
					{{ session()->get('error') }}
				</div> 
				@elseif(session()->has('success'))
				<div class="bg-success text-white p-2 rounded mt-2">
					{{ session()->get('success') }}
				</div>
				@endif

				<div class="form-group mt-3">
					<button class="btn w-100 btn-primary text-white" type="submit"> Signup </button>
					<p class="text-center mt-2">
						Already have an account ? <a class="text-decoration-none" href="{{route('login')}}"> Login </a>.
					</p>
				</div>
			</form>
		</div>
	</div>

@endsection
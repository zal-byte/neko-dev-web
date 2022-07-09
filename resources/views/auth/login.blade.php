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
			<form method="post" action="{{route('login_post')}}" enctype="multipart/form-data">
				@csrf
				<div class="form-group">
					<input type="text" name="email" class="form-control @error('log_err') is-invalid @enderror form-control-lg" placeholder="Email address" required>
				</div>
				<div class="form-group mt-3">
					<input type="password" name="password" class="form-control @error('log_err') is-invalid @enderror form-control-lg" placeholder="Password" required>
				</div>

				@error('log_err')
				<div class="bg-danger mt-2 text-white p-2 rounded">
					{{ $message }}
				</div>
				@enderror

				<div class="form-check form-switch mt-2">
				  <input class="form-check-input" type="checkbox" name="remember" id="flexSwitchCheckDefault">
				  <label class="form-check-label" for="flexSwitchCheckDefault"> Remember me </label>
				</div>

				<div class="form-group mt-3">
					<button class="btn w-100 btn-primary text-white"> Login </button>
					<p class="text-center mt-2">
						Doesn't have any account ? <a class="text-decoration-none" href="{{route('signup')}}"> Signup </a>.
					</p>
				</div>
			</form>
		</div>
	</div>

@endsection

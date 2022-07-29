@php
use Illuminate\Support\Facades\Auth;
@endphp
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title> Neko Dev </title>
</head>
<style type="text/css">
	@media screen and (max-width: 762px){
		#sidebar{
			display: none;
		}
	}

	@media screen and (min-width:  762px){
		#myNav{
			display: none;
		}
	}
	hr {
  border: 0;
  clear:both;
  display:block;
  width: 96%;               
  background-color:#FFFF00;
  height: 1px;
}
</style>
<body>
<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>

	<div class="container-fluid">
		<div class="row">
			@if(Auth::check())

					

			<div class="col-sm-auto bg-dark sticky-top vh-100" id="sidebar">
				<div class="d-flex flex-sm-column flex-row flex-nowrap bg-dark align-items-center sticky-top">
					<a href="/home" class="d-block p-3 link-dark text-decoration-none" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Main Page">
						<span class="fa fa-solid fa-home text-white fa-2xl"></span>
					</a>
					<hr>
					<ul class="nav mt-1 nav-pills nav-flush flex-sm-column flex-row flex-nowrap mb-auto mx-auto text-center align-items-center">
						<li class="nav-item">
							<a href="{{route('new-blog')}}" class="nav-link py-3 px-2" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Create new post">
								<span class="fa fa-solid fa-add fa-2xl"></span>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{route('blog')}}" class="nav-link py-3 px-2" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="View Post">
								<span class="fa fa-solid fa-newspaper fa-2xl"></span>
							</a>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link py-3 px-2" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="View Feedback">
								<span class="fa fa-solid fa-book fa-2xl"></span>
							</a>
						</li>
					</ul>
					<hr>
					<a href="#" onclick="$('#modalLogout').modal('show');" class="d-block p-3 mt-1 link-dark text-decoration-none" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Logout">
						<span class="fa fa-solid fa-sign-out fa-2xl" style="color: red;"></span>
					</a>
				</div>
			</div>

			@else
			<div class="navbar navbar-expand-lg bg-dark sticky-top" >
				<div class="container-fluid">
					<a class="navbar-brand"> <b> NEKOProject </b> </a>
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		      			<span class="navbar-toggler-icon"></span>
		    		</button>
				    <div class="collapse navbar-collapse" id="navbarSupportedContent">
				      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
				      	<li class="nav-item">
				      		<a class="nav-link" href="#">
				      			<span class="fa fa-solid fa-book"></span> Request
				      		</a>
				      	</li>
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
				</div>
			</div>
			@endif

			<div class="col-sm p-2 min-vh-100">
				<div class="container">
					@yield('home-body')
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" tabindex="-1" id="modalLogout">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<span class="fa fa-solid fa-sign-out fa-2xl"></span>
					<b> Logout ? </b>
				</div>
				<div class="modal-body">
					<p>
						Are you sure want to logout ?
					</p>
				</div>
				<div class="modal-footer">
					<a href="{{route('logout')}}"><button class="btn btn-dark text-white"> Yes </button></a>
					<button onclick="$('#modalLogout').modal('hide');" class="btn btn-dark text-white"> No </button>
				</div>
			</div>
		</div>
	</div>

<script type="text/javascript" src="{{asset('js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/app.js')}}"></script>

<script type="text/javascript">
	$(function(){
		$("[data-bs-toggle='tooltip']").tooltip();
	});
</script>
</body>
</html>
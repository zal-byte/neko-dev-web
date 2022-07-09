<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
	<title> Login </title>
	<style type="text/css">
		body,html{
			height: 100% !important;
		}

		@media screen and (max-width: 762px){
			#co{
				display: none;
			}
		}

		@media screen and (min-width: 762px){
			#co{
				margin-right: 100px;
				width: 28%;
			}
		}

		@font-face{
			font-family: 'eudoxus';
			src: url("{{asset('eudoxus/Variable/EudoxusSansGX.ttf')}}") format('truetype');
			src: url("{{asset('eudoxus/Variable/EudoxusSansGX.woff')}}") format('woff');
		}
		body{
			overflow-x: hidden;
			font-family: 'eudoxus';
		}

	</style>
</head>
<body>
<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>

	<div class="container">
		<div class="row justify-content-center vh-100">
			<div class="col-md-4" id="co">
				<div class="d-flex justify-content-center align-items-center vh-100">
					<img src="{{asset('img/akari_box.png')}}" class="img-fluid">
				</div>
			</div>
			<div class="col-sm-5 pt-5">
				@yield('auth-body')
			</div>
		</div>
	</div>

<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
</body>
</html>
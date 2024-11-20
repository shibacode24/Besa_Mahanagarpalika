<!doctype html>
<html lang="en">


<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="{{asset('admin_asset/images/logo1.png')}}" type="image/png" />
	<!--plugins-->
	<link href="{{asset('admin_asset/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
	<link href="{{asset('admin_asset/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" />
	<link href="{{asset('admin_asset/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet" />
	<link href="{{asset('admin_asset/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />
	<link href="{{asset('admin_asset/plugins/select2/css/select2.min.css')}}" rel="stylesheet" />
	<link href="{{asset('admin_asset/plugins/select2/css/select2-bootstrap4.css')}}" rel="stylesheet" />
	<!-- loader-->
	<link href="{{asset('admin_asset/css/pace.min.css')}}" rel="stylesheet" />
	<script src="{{asset('admin_asset/js/pace.min.js')}}"></script>
	<!-- Bootstrap CSS -->
	<link href="{{asset('admin_asset/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('admin_asset/css/bootstrap-extended.css')}}" rel="stylesheet">
	<link href="{{asset('admin_asset/css/app.css')}}" rel="stylesheet">
	<link href="{{asset('admin_asset/css/icons.css')}}" rel="stylesheet">
	<title></title>
</head>

<body class="bg-login">
	<!--wrapper-->
	<div class="wrapper">
		<div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
			<div class="container-fluid">
				<div class="d-flex">
					<nav class="navbar navbar-expand" >
						<div class="top-menu ms-auto">
							<div>
								<img src="{{ asset('images/logo_MHMCTL.png') }}" class="logo-icon" alt="logo icon"
								style="height:auto;width:100%;">
							</div>
							
						</div>
					</nav>
				</div>
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3" style="margin-top: 2vh">
					<div class="col mx-auto">
						
						<div class="card">
							<div class="card-body">
								<div class="border p-4 rounded">
									<div class="text-center">
										<h3 class="">Login</h3>
									
									</div>
							
								
									<div class="form-body">
									
										<form class="form-signin" method="POST"  action="{{route('login_submit')}}">
											@csrf
											<div class="col-12">
												<label for="Username" class="form-label">Username</label>
												<input type="text" class="form-control" id="inputEmailAddress" placeholder="Username" name="username">
											</div>
											<div class="col-12" style="margin-top:1vh">
												<label for="inputChoosePassword" class="form-label">Enter Password</label>
												<div class="input-group" id="show_hide_password">
													<input type="password" class="form-control border-end-0" id="inputChoosePassword" placeholder="Enter Password" name="password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
												</div>
											</div>
											
											<div class="col-12" style="margin-top:2vh">
												<div class="d-grid">
												<button type="submit" class="btn btn-primary">Login</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end row-->
				<footer>
					<p style="text-align: center;font-weight:bold;color:red">Managed by SIMAKIT PVT LTD</p>
				</footer>
			</div>
		</div>
	</div>
	
	<!--end wrapper-->
	<!-- Bootstrap JS -->
	<script src="{{asset('admin_asset/js/bootstrap.bundle.min.js')}}"></script>
	<!--plugins-->
	<script src="{{asset('admin_asset/js/jquery.min.js')}}"></script>
	<script src="{{asset('admin_asset/plugins/simplebar/js/simplebar.min.js')}}"></script>
	<script src="{{asset('admin_asset/plugins/metismenu/js/metisMenu.min.js')}}"></script>
	<script src="{{asset('admin_asset/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
	<!--Password show & hide js -->
	<script>
		$(document).ready(function () {
			$("#show_hide_password a").on('click', function (event) {
				event.preventDefault();
				if ($('#show_hide_password input').attr("type") == "text") {
					$('#show_hide_password input').attr('type', 'password');
					$('#show_hide_password i').addClass("bx-hide");
					$('#show_hide_password i').removeClass("bx-show");
				} else if ($('#show_hide_password input').attr("type") == "password") {
					$('#show_hide_password input').attr('type', 'text');
					$('#show_hide_password i').removeClass("bx-hide");
					$('#show_hide_password i').addClass("bx-show");
				}
			});
		});
	</script>
	
	<!--app JS-->
	<script src="assets/js/app.js"></script>
</body>


</html>
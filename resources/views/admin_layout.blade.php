<!doctype html>
<html lang="en">


<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="{{ asset('admin_asset/images/logo1.png') }}" type="image/png" />
    <!--plugins-->
    <link href="{{ asset('admin_asset/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin_asset/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin_asset/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin_asset/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin_asset/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin_asset/plugins/select2/css/select2-bootstrap4.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin_asset/plugins/highcharts/css/highcharts.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin_asset/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin_asset/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin_asset/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />

    <!-- loader-->
    <link href="{{ asset('admin_asset/css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('admin_asset/js/pace.min.js') }}"></script>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('admin_asset/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin_asset/css/bootstrap-extended.css') }}" rel="stylesheet">
    <link href="{{ asset('admin_asset/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('admin_asset/css/icons.css') }}" rel="stylesheet">
    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="{{ asset('admin_asset/css/dark-theme.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin_asset/css/semi-dark.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin_asset/css/header-colors.css') }}" />
    <title>Dashboard</title>


    <!-- code by sharique sir -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        .navbar1 {
            overflow: hidden;
            background-color: #fff;
            max-height: 30px;
            box-shadow: 1px 1px 2px 1px;
        }

        .navbar1 a {
            float: left;
            font-size: 16px;
            color: black;
            text-align: center;
            padding: 5px 16px;
            text-decoration: none;
        }

        .dropdown1 {
            float: left;
            overflow: hidden;
        }

        .dropdown1 .dropbtn {
            font-size: 16px;
            border: none;
            outline: none;
            color: black;
            padding: 5px 16px;
            background-color: inherit;
            font-family: inherit;
            margin: 0;
        }

        .navbar1 a:hover,
        .dropdown1:hover .dropbtn {
            background-color: red;
        }

        .dropdown1-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown1-content a {
            float: none;
            color: black;
            padding: 5px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }

        .dropdown1-content a:hover {
            background-color: #ddd;
        }

        .dropdown1:hover .dropdown1-content {
            display: block;
        }
    </style>

    <!-- End here by sharique sir-->
</head>

<body>
    <!--wrapper-->
    <div class="wrapper">

        <!--sidebar wrapper -->
        <div class="" data-simplebar="true">
            {{-- <div class="sidebar-header">
				<div>
					<img src="{{asset('admin_asset/images/mc-logo.png')}}" class="logo-icon" alt="logo icon">
				</div>
				<div>
					<h6 class="logo-text">
                        NANDED WAGHALA CITY MUNICIPAL CORPORATION
					</h6>
				</div> 
                <div>
                    <p class="logo-text">
                        NANDED WAGHALA CITY MUNICIPAL CORPORATION
                    </p>
                </div>
				<div class="toggle-icon ms-auto">
				</div>
			</div> --}}
            <!--navigation-->
            {{-- <ul class="metismenu" id="menu">
				<li>
					<a href="{{route('admin_dashboard')}}">
						<div class="parent-icon"><i class='bx bx-home-circle' style="font-size: 17px;"></i>
						</div>
						<div class="menu-title">Dashboard</div>
					</a>

				</li>
				<li>
					<a href="{{route('dashboard1')}}">
						<div class="parent-icon"><i class='fadeIn animated bx bx-file' style="font-size: 17px;"></i>
						</div>
						<div class="menu-title">Notices</div>
					</a>

				</li>
				@if (Auth::user()->role == 0)
				
				<li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class="lni lni-list" style="font-size: 17px;"></i>
                        </div>
                        <div class="menu-title">Master</div>
                    </a>

                    <ul>
                        <li> <a href="{{ route('corporation') }}"><i class="bx bx-right-arrow-alt"></i>Corporation
                                Master </a>
                        </li>
                        <li> <a href="{{ route('city') }}"><i class="bx bx-right-arrow-alt"></i>City Master </a>
                        </li>

                        <li> <a href="{{ route('zone') }}"><i class="bx bx-right-arrow-alt"></i>Zone Master </a>
                        </li>
                        <li> <a href="{{ route('employee') }}"><i class="bx bx-right-arrow-alt"></i>Employee Master
                            </a>
                        </li>
                        <li> <a href="{{ route('operator') }}"><i class="bx bx-right-arrow-alt"></i>Operator Master
                            </a>
                        </li>


                        <li> <a href="{{ route('admin') }}"><i class="bx bx-right-arrow-alt"></i>Admin/Employee Master
                            </a>
                        </li>

                        <li> <a href="{{ route('typeofbussiness') }}"><i class="bx bx-right-arrow-alt"></i>Nature Of
                                Business </a>
                        </li>
                        <li> <a href="{{ route('bussiness') }}"><i class="bx bx-right-arrow-alt"></i>Business
                                Reg.Type</a>
                        </li>
                        <li> <a href="{{ route('new_bussiness') }}"><i class="bx bx-right-arrow-alt"></i> Business
                                Type</a>
                        </li>
						<li> <a href="{{ route('notice') }}"><i class="bx bx-right-arrow-alt"></i>Notice</a>
					</li>

                    </ul>

              

                </li>
			
				<li>
                    <a href="{{ route('data_from_app') }}">
                        <div class="parent-icon"><i class="fadeIn animated bx bx-file" style="font-size: 17px;"></i>
                        </div>
                        <div class="menu-title">Data From App</div>
                    </a>
                </li>
				@endif
                <li>
                    <a href="{{route('report1')}}"
					>
                        <div class="parent-icon"><i class="fadeIn animated bx bx-book-alt" style="font-size: 17px;"></i>
                        </div>
                        <div class="menu-title">Report</div>
                    </a>
                </li>
				<li>
                    <a href="#">
                        <div class="parent-icon"><i class="fadeIn animated bx bx-book-alt" style="font-size: 17px;"></i>
                        </div>
                        <div class="menu-title">Renewal</div>
                    </a>
                </li>
				
			</ul> --}}
            <!--end navigation-->
        </div>
        <!--end sidebar wrapper -->
        <!--start header -->
        <header>
            <div class="d-flex">
                <nav class="navbar navbar-expand">
                    <div class="top-menu ms-auto">
                        <div align="center">
                            <img src="{{ asset('images/logo_MHMCTL.png') }}" class="logo-icon" alt="logo icon"
                                style="height:auto;width:100%;">
                        </div>

                    </div>
                </nav>
            </div>
        </header>

        <div class="navbar1">
            <a href="{{ route('admin_dashboard') }}">
                <i class='bx bx-home-circle' style="font-size:17px; color:black;">
                </i> Dashboard
            </a>
			@if (auth()->user()->role == '0')
            <a href="{{ route('dashboard1') }}">
                <i class="fadeIn animated bx bx-book-alt"></i>
                License Approval

            </a>
			@endif
            <a href="{{ route('receipt') }}">
                <i class="fadeIn animated bx bx-book-alt"></i>
                Receipts
            </a>
            <a href="{{ route('license') }}">
                <i class="fadeIn animated bx bx-book-alt"></i>
                Licenses
            </a>
            {{-- <a href="{{route('fee_collected')}}">
				<i class="fadeIn animated bx bx-book-alt" ></i>
				Received Trade Fee
		
			</a> --}}
            <a href="{{ route('report1') }}">
                <i class="fadeIn animated bx bx-book-alt"></i>
                Reports

            </a>
            <a href="{{ route('data_from_app') }}">
                <i class="fadeIn animated bx bx-file"></i>
                Data From App

            </a>

            @if (auth()->user()->role == '0')
                <div class="dropdown1">
                    <button class="dropbtn"> <i class="lni lni-list"></i> Masters
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdown1-content">
                        <a href="{{ route('corporation') }}">Corporation Master</a>
                        <a href="{{ route('city') }}">City Master </a>
                        <a href="{{ route('zone') }}">Ward Master </a>
                        <a href="{{ route('employee') }}">Add Surveyor </a>
                        <a href="{{ route('operator') }}">Add Operator</a>
                        <a href="{{ route('admin') }}">Admin/Employee Master</a>
                        <a href="{{ route('typeofbussiness') }}">Nature of Business </a>
                        <a href="{{ route('bussiness') }}">Business Reg.Type</a>
                        <a href="{{ route('new_bussiness') }}"> Business Type</a>
                        <a href="{{ route('typeoflicence') }}"> Licence Type</a>
                        <a href="{{ route('notice') }}">Demand Notice</a>
                        <a href="{{ route('document') }}">Document Type Master</a>
                    </div>
                </div>
            @endif

            @php
                $role = Auth::user()->role;
                $zone_id = null;
                if ($role == '1') {
                    $zone_id = Auth::user()->zone_id;
                }

                $zone_id = DB::table('users')
                    ->where('zone_id', $zone_id)
                    ->join('zone', 'zone.id', '=', 'users.zone_id')
                    ->select('zone.zone')
                    ->get();

                $zone = Str::substr($zone_id, 10, 8);

            @endphp

            <div class="dropdown1" style="float: right;margin-top:-3px;">


                <img src="{{ asset('images/logo/admin.png') }}" alt="user avatar" style="width: 25px;height:25px;">
                <button class="dropbtn">
                    @if (Auth::user()->role == '1')
                        Admin:{{ $zone }}
                    @else
                        Super Admin
                    @endif
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown1-content">
                    <a href="{{ route('profile') }}"><i class="bx bx-user"> </i> <span>Profile</span></a>
                    <a href="{{ route('log_out') }}"> <i class='bx bx-log-out-circle'></i> <span>Logout</span></a>
                </div>
            </div>
        </div>


        <!--end header -->

        @yield('content')


        <div class="overlay toggle-icon"></div>
        <!--end overlay-->
        <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i
                class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->

    </div>
    <!--end wrapper-->
    <!--start switcher-->

    <!--end switcher-->
    <!-- Bootstrap JS -->
    <script src="{{ asset('admin_asset/js/bootstrap.bundle.min.js') }}"></script>
    <!--plugins-->
    <script src="{{ asset('admin_asset/js/jquery.min.js') }}"></script>
    <script src="{{ asset('admin_asset/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('admin_asset/plugins/metismenu/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('admin_asset/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('admin_asset/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin_asset/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('admin_asset/js/table-datatable.js') }}"></script>
    <script src="{{ asset('admin_asset/js/bootstrap-select.js') }}"></script>
    <script src="{{ asset('admin_asset/plugins/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('admin_asset/js/form-select2.js') }}"></script>


    <!-- highcharts js -->
    <script src="{{ asset('admin_asset/plugins/highcharts/js/highcharts.js') }}"></script>
    <script src="{{ asset('admin_asset/plugins/highcharts/js/highcharts-more.js') }}"></script>
    <script src="{{ asset('admin_asset/plugins/highcharts/js/variable-pie.js') }}"></script>
    <script src="{{ asset('admin_asset/plugins/highcharts/js/solid-gauge.js') }}"></script>
    <script src="{{ asset('admin_asset/plugins/highcharts/js/highcharts-3d.js') }}"></script>
    <script src="{{ asset('admin_asset/plugins/highcharts/js/cylinder.js') }}"></script>
    <script src="{{ asset('admin_asset/plugins/highcharts/js/funnel3d.js') }}"></script>
    <script src="{{ asset('admin_asset/plugins/highcharts/js/exporting.js') }}"></script>
    <script src="{{ asset('admin_asset/plugins/highcharts/js/export-data.js') }}"></script>
    <script src="{{ asset('admin_asset/plugins/highcharts/js/accessibility.js') }}"></script>
    <script src="{{ asset('admin_asset/plugins/highcharts/js/highcharts-custom.script.js') }}"></script>

    <!--app JS-->
    <script src="{{ asset('admin_asset/js/app.js') }}"></script>
    <script src="{{ asset('js/popover-tooltip.js') }} "></script>
    <script src="https://cdn.datatables.net/fixedcolumns/4.2.2/js/dataTables.fixedColumns.min.js"></script>
    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable({
                scrollCollapse: true,
                paging: true,
                fixedColumns: {
                    leftColumns: 0,
                    right: 1
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $("#show_hide_password a").on('click', function(event) {
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

        setTimeout(() => {
            $(".close-btn").trigger('click');
        }, 2200);
    </script>
    @yield('js')
</body>


</html>

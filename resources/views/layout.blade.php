<!doctype html>
<html lang="en">


<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="{{ asset('images/mc-logo.png') }}" type="image/png" />
    <!--plugins-->
    <link href="{{ asset('plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/select2/css/select2-bootstrap4.css') }}" rel="stylesheet" />
    <!-- loader-->
    <link href="{{ asset('css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('js/pace.min.js') }}"></script>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-extended.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/icons.css') }}" rel="stylesheet">
    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="{{ asset('css/dark-theme.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/semi-dark.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/header-colors.css') }}" />
    <title> BESA CITY MUNICIPAL CORPORATION</title>


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
      
         
        <div class="navbar1" style="padding-top:-5px;">
            <a href="{{ route('dashboard') }}">
                <i class='bx bx-home-circle' style="font-size:17px; color:black;">
                </i> Dashboard
            </a>
            <a href="{{ route('existingserve') }}">
                <i class='bx bx-file' style="font-size:17px; color:black;">
                </i> Application Entry
            </a>
            <a href="{{ route('showserve') }}">
                <i class='bx bx-detail' style="font-size:17px; color:black;">
                </i> All Application
            </a>
            <a href="{{ route('demand_notice') }}">
                <i class='bx bx-book-content' style="font-size:17px; color:black;">
                </i> Demand Notice
            </a>
            <a href="{{ route('generate_certificate') }}">
                <i class='bx bx-news' style="font-size:17px; color:black;">
                </i> Generated Certificate
            </a>
         
            @php
            $zone_id = DB::table('operator')
                ->where('zone_id', Auth::guard('operator')->user()->zone_id)
                ->join('zone', 'zone.id', '=', 'operator.zone_id')
                ->select('zone.zone')
                ->get();
            
            $zone = Str::substr($zone_id, 10, 6);
        @endphp

                <div class="dropdown1" style="float: right;margin-top:-3px;">
                 
                <img src="{{ asset('images/logo/operator.png') }}" alt="user avatar" style="width: 25px;height:25px;">
                    <button class="dropbtn">
                        {{ $zone }}
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdown1-content">
                        <a class="dropdown-item" href="{{ route('operator_log_out') }}"><i
                            class='bx bx-log-out-circle'></i> <span>Logout</span></a>
                    </div>
                </div>
                
        </div>


        <!--end sidebar wrapper -->
        <!--start header -->

        <!--end header -->
        @yield('content')



        <!--end page wrapper -->
        <!--start overlay-->
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
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <!--plugins-->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('plugins/metismenu/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('js/table-datatable.js') }}"></script>
    <script src="{{ asset('plugins/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('js/form-select2.js') }}"></script>
    <script src="https://cdn.datatables.net/fixedcolumns/4.2.2/js/dataTables.fixedColumns.min.js"></script>
    <script src="{{ asset('js/popover-tooltip.js') }} "></script>

    <!--app JS-->
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        $(document).ready(function() {


            $(document).ready(function() {
                var now = new Date();
                var month = (now.getMonth() + 1);
                var day = now.getDate();
                if (month < 10)
                    month = "0" + month;
                if (day < 10)
                    day = "0" + day;
                var today = now.getFullYear() + '-' + month + '-' + day;
                $('.datePicker').val(today);
            });


            var table = $('#example').DataTable({

                scrollCollapse: true,
                paging: true,
                fixedColumns: {
                    leftColumns: 0,
                    right: 1
                }
            });
        });

setTimeout(() => {
    $('.close-btn').trigger('click');
}, 2500);

    </script>
    @yield('js')

</body>


</html>

<!DOCTYPE html>
<html lang="en">


<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>@yield('title') | Porto Ecommerce
    </title>
    <!--favicon-->
    <link rel="icon" href="{{ asset('theme/backend/assets/images/favicon-32x32.png') }}" type="image/png" />
    <!-- Vector CSS -->
    <link href="{{ asset('theme/backend/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
    <link href="{{ asset('theme/backend/assets/plugins/bootstrap-datetimepicker/css/bootstrap-material-datetimepicker.min.css') }}" rel="stylesheet" />
    <!--Data Tables -->
	<link href="{{ asset('theme/backend/assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
    <!--plugins-->
    <link href="{{ asset('theme/backend/assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ asset('theme/backend/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
    <link href="{{ asset('theme/backend/assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
   <!-- <link href="{{ asset('theme/backend/assets/plugins/metismenu/css/toaster.css') }}" rel="stylesheet" />-->
    <!-- loader-->
    <link href="{{ asset('theme/backend/assets/css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('theme/backend/assets/js/pace.min.js') }}"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('theme/backend/assets/css/bootstrap.min.css') }}" />
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{ asset('theme/backend/assets/css/icons.css') }}" />
    <!-- App CSS -->
    <link rel="stylesheet" href="{{ asset('theme/backend/assets/css/sweetalert2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('theme/backend/assets/css/toastr.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('theme/backend/assets/css/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('theme/backend/assets/css/dark-sidebar.css') }}" />
    <link rel="stylesheet" href="{{ asset('theme/backend/assets/css/dark-theme.css') }}" />
</head>

<body>
    <!-- wrapper -->
    <div class="wrapper">
        <!--sidebar-wrapper-->
        @include('backend.components.sidebar')
        <!--end sidebar-wrapper-->
        <!--header-->
        @include('backend.components.header')
        <!--end header-->
        <!--page-wrapper-->
        <div class="page-wrapper">
            <!--page-content-wrapper-->
            <div class="page-content-wrapper">
                <div class="page-content">
                    @yield('content')
                </div>
            </div>
            <!--end page-content-wrapper-->
        </div>
        <!--end page-wrapper-->
        <!--start overlay-->
        <div class="overlay toggle-btn-mobile"></div>
        <!--end overlay-->
        <!--Start Back To Top Button--> <a href="javascript:;" class="back-to-top"><i
                class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->

        <!--footer -->

        @include('backend.components.footer')

        <!-- end footer -->

    </div>
    <!--start switcher-->
    <div class="switcher-wrapper">
        <div class="switcher-btn"> <i class='bx bx-cog bx-spin'></i>
        </div>
        <div class="switcher-body">
            <h5 class="mb-0 text-uppercase">Theme Customizer</h5>
            <hr />
            <h6 class="mb-0">Theme Styles</h6>
            <hr />
            <div class="d-flex align-items-center justify-content-between">
                <div class="custom-control custom-radio">
                    <input type="radio" id="darkmode" name="customRadio" class="custom-control-input">
                    <label class="custom-control-label" for="darkmode">Dark Mode</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" id="lightmode" name="customRadio" checked class="custom-control-input">
                    <label class="custom-control-label" for="lightmode">Light Mode</label>
                </div>
            </div>
            <hr />
            <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="DarkSidebar">
                <label class="custom-control-label" for="DarkSidebar">Dark Sidebar</label>
            </div>
            <hr />
            <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="ColorLessIcons">
                <label class="custom-control-label" for="ColorLessIcons">Color Less Icons</label>
            </div>
        </div>
    </div>


    <!--@csrf-->
    <!--end switcher-->
    <!-- JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('theme/backend/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('theme/backend/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('theme/backend/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('theme/backend/assets/js/tinymce/tinymce.min.js') }}"></script>

    <!--plugins-->
    <script src="{{ asset('theme/backend/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('theme/backend/assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('theme/backend/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('theme/backend/assets/js/index2.js') }}"></script>
    <!--Data Tables js-->
	<script src="{{ asset('theme/backend/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('theme/backend/assets/plugins/bootstrap-datetimepicker/js/bootstrap-material-datetimepicker.min.js') }}"></script>

    <!-- App JS -->
    <script src="{{ asset('theme/backend/assets/js/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('theme/backend/assets/js/toastr.min.js') }}"></script>
    <script src="{{ asset('theme/backend/assets/js/app.js') }}"></script>
    <script src="{{ asset('theme/backend/assets/js/custom.js') }}"></script>
</body>


</html>

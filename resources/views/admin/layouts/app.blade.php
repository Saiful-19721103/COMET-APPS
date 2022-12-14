<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:20 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Doccure - Dashboard</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('admin/assets/img/favicon.png') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap.min.css') }}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/font-awesome.min.css') }}">

    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/feathericon.min.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/assets/plugins/morris/morris.css') }}">

    <!-- Themify-icon CSS Link-->
    <link rel="stylesheet" href="{{ asset('admin/assets/icons/themify-icons.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
    <!--For Data Table-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.css" />

</head>

<body>

    <!-- Main Wrapper -->
    <div class="main-wrapper">
        <!-- Header -->
        @include('admin.layouts.header')
        <!-- Header -->

        <!-- Sidebar -->
        @include('admin.layouts.sidebar')
        <!-- Sidebar -->

        <!-- Page Wrapper -->
        <div class="page-wrapper">

            <div class="content container-fluid">

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Welcome {{ Auth::guard('admin')->user()->name }}</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <!-- Dashboard Row -->
                @section('main_section')
                @show
                <!-- Dashboard Row -->

            </div>
        </div>
        <!-- /Page Wrapper -->

    </div>
    <!-- /Main Wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('admin/assets/js/jquery-3.2.1.min.js') }}"></script>

    <!-- Bootstrap Core JS -->
    <script src="{{ asset('admin/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/bootstrap.min.js') }}"></script>

    <!-- Slimscroll JS -->
    <script src="{{ asset('admin/assets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

    <script src="{{ asset('admin/assets/plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/morris/morris.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/chart.morris.js') }}"></script>

    <!--For Data Table-->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.js"></script>

    <!-- CK Editor Basic JS  by download-->
    <script src="{{ asset('admin/assets/ckeditor/ckeditor.js') }}"></script>

    <!-- Custom JS -->
    <script src="{{ asset('admin/assets/js/script.js') }}"></script>

    <!--For Alert System-->
    <script src="{{ asset('custom/admin.js') }}"></script>

</body>

</html>

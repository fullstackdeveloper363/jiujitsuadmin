<!doctype html>
<html lang="en">


<head>

    <meta charset="utf-8"/>
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Jui Jitsu" name="description"/>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('assets/images/logo.png')}}">

    @include('admin.includes.style')
    @yield('custom-css')

</head>

<body data-sidebar="dark" data-layout-mode="light">


<!-- Begin page -->
<div id="layout-wrapper">


    @include('admin.includes.header')

    <!-- ========== Left Sidebar Start ========== -->
    @include('admin.includes.sidebar')
    <!-- Left Sidebar End -->


    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">
                @yield('content')
            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        @include('admin.includes.footer')
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

@include('admin.includes.right_bar')

<!-- JAVASCRIPT -->
@include('admin.includes.script')
@yield('custom-script')
</body>


</html>

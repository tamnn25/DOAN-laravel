<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="/end/image/png" sizes="16x16" href="/end/assets/images/favicon.png">
    @include('admin.layouts.css')
</head>

<body>
    <!-- <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div> -->
    <div id="main-wrapper">
      <header class="topbar" data-navbarbg="skin5">
        @include('admin.layouts.header')
       </header>
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
        @include('admin.layouts.sidebar')
        <!-- endsidebar -->
     <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            @yield('content')
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->    
        {{-- @include('admin.layouts.footer') --}}
        </div>
    </div>
     @include('admin.layouts.js')
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head><title>sol.ng - @yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- LIBRARY FONT-->
    <!-- <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:400,400italic,700,900,300"> -->
    <link rel="stylesheet" type="text/css" href="{{URL('admin/font-awesome/css/font-awesome.min.css')}}" />
    <!-- LIBRARY CSS-->
    <link rel="stylesheet" type="text/css" href="{{URL::asset('admin/bootstrap/css/bootstrap.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{URL('assets/css/color-1.css')}}">
    <link type="text/css" rel="stylesheet" href="{{URL('assets/css/style.css')}}">
</head>
<body>
<!-- HEADER-->
<header>
        @include('partial.user.header')
</header>
<!-- WRAPPER-->
<div id="wrapper-content"><!-- PAGE WRAPPER-->
    <div id="page-wrapper"><!-- MAIN CONTENT-->
        <div class="main-content"><!-- CONTENT-->
            <div class="content">

            @yield('content')

            </div>
        </div>
    </div>
    <!-- BUTTON BACK TO TOP-->
</div>

</body>
</html>
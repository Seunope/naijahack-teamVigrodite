<!DOCTYPE html>
<html lang="en">
<head><title>Sol.ng - @yield('title')</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="description" content="solution to past questions, university past questions, Nigeria tertiary past question ">
    <meta name="keywords" content="sol.ng,questions,solutions,answer,university,Nigeria,Africa,cbt,sol,solng">
    <meta name="author" content="sol.ng Academics">
    <meta name="msvalidate.01" content="EAE801DF63CD1345B9B74464D22E2A80" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- LIBRARY CSS-->
    <link rel="stylesheet" type="text/css" href="{{URL::asset('admin/bootstrap/css/bootstrap.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{URL::asset('assets/css/color-1.css')}}">
    <link type="text/css" rel="stylesheet" href="{{URL::asset('assets/css/style.css')}}">
    @yield('private-head')
</head>
<body>
<!-- HEADER-->

<!-- WRAPPER-->
<div id="wrapper-content"><!-- PAGE WRAPPER-->
    <div id="page-wrapper"><!-- MAIN CONTENT-->
        <div class="main-content"><!-- CONTENT-->
            <div class="content">
            @yield('content')
            </div>
        </div>
    </div>
</div>

<!-- FOOTER-->
</body>
</html>
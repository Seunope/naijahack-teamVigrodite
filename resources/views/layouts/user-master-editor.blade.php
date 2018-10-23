<!DOCTYPE html>
<html lang="en">
<head><title>sol.ng - @yield('title')</title>

    <!-- Google Tag Manager -->
    {{--<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':--}}
                {{--new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],--}}
                {{--j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=--}}
                {{--'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);--}}
        {{--})(window,document,'script','dataLayer','GTM-MJJSR5D');--}}
    {{--</script>--}}
    {{--<!-- End Google Tag Manager -->--}}
    {{--@include('analyticscript')--}}
    {{--<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">--}}
    {{--<meta name="description" content="@yield('description')">--}}
    {{--<meta name="keywords" content="@yield('keywords')">--}}
    {{----}}
    {{--<meta name="author" content="sol.ng Academics">--}}
    {{--<meta name="google-site-verification" content="FTPDZGgr_d9fultl3ovAvSrTSAuuBIb2BjFVomgoAtk" />--}}
    {{--<meta name="msvalidate.01" content="EAE801DF63CD1345B9B74464D22E2A80" />--}}
    {{--<meta name="viewport" content="width=device-width, initial-scale=1.0">--}}

    <!-- LIBRARY FONT-->
    {{--<link rel="stylesheet" type="text/css" href="{{url('admin/font-awesome/css/font-awesome.min.css')}}" />--}}
    <!-- LIBRARY CSS-->
    {{--<link rel="stylesheet" type="text/css" href="{{url('admin/bootstrap/css/bootstrap.min.css')}}" />--}}
    {{--<link type="text/css" rel="stylesheet" href="{{url('assets/css/color-1.css')}}">--}}
    {{--<link type="text/css" rel="stylesheet" href="{{url('assets/css/style.css')}}">--}}
    {{--<link type="text/css" rel="stylesheet" href="/assets/libs/selectbox/css/jquery.selectbox.css">--}}
    {{--for summernote--}}


    <link rel="stylesheet" type="text/css" href="{{URL::asset('admin/bootstrap/css/bootstrap.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{URL::asset('assets/css/color-1.css')}}">
    <link type="text/css" rel="stylesheet" href="{{URL::asset('assets/css/style.css')}}">
    <script type="text/javascript" src="{{url('admin/tinymce/js/tinymce/tinymce.min.js')}}"></script>
    <script type="text/javascript" src="{{url('admin/tinymce/js/tinymce/plugins/tiny_mce_wiris/integration/WIRISplugins.js')}}"></script>
    @yield('private-head')
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MJJSR5D"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<!-- HEADER-->
<header>
    @include('partial.user.header')
    @include('partial.user.nav')
</header>
<!-- WRAPPER-->
<div id="wrapper-content"><!-- PAGE WRAPPER-->
    <div id="page-wrapper"><!-- MAIN CONTENT-->
        <div class="main-content"><!-- CONTENT-->
            <div class="content">
                @include('partial.admin.error')
                @yield('content')
            </div>
        </div>
    </div>
    <!-- BUTTON BACK TO TOP-->
    <div id="back-top"><a href="#top"><i class="fa fa-angle-double-up"></i></a></div>
</div>

<!-- FOOTER-->
@include('partial.user.footer')
<script type="text/javascript" src="{{url('assets/js/jquery-2.1.4.min.js')}}"></script>

{{--<script type="text/javascript" src="{{url('admin/bootstrap/js/bootstrap.min.js')}}"></script>--}}


{{--<script src="assets/libs/wow-js/wow.min.js"></script>--}}
{{--<script src="assets/libs/selectbox/js/jquery.selectbox-0.2.min.js"></script>--}}
{{--<script src="assets/js/main.js"></script>--}}


</body>
</html>
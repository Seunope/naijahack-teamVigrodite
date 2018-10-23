
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="ut3f-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sol.ng - @yield('title')</title>
    <link rel="stylesheet" type="text/css" href="{{url('admin/bootstrap/css/bootstrap.min.css')}}" />
    {{--    <link rel="stylesheet" type="text/css" href="{{url('admin/font-awesome/css/font-awesome.min.css')}}" />--}}
    {{--    <link rel="stylesheet" type="text/css" href="{{url('admin/css/app/app.css')}}" />--}}
        <link rel="stylesheet" type="text/css" href="{{url('admin/css/local.css')}}"/>
        <link rel="stylesheet" type="text/css" href="{{url('admin/css/my.css')}}"/>
    <!-- you need to include the shieldui css and js assets in order for the charts to work -->
    {{--<link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light-bootstrap/all.min.css" />--}}
    {{--<script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>--}}
    {{--<script type="text/javascript" src="http://www.prepbootstrap.com/Content/js/gridData.js"></script>--}}
</head>
<body>

{{--Wreapper begins--}}
<div id="wrapper">
    @include('partial.admin.header')
    @include('partial.admin.message')
    @include('partial.admin.error')
    @yield('content')
    @include('partial.admin.footer')
</div>
<script type="text/javascript" src="{{url('admin/js/jquery-1.10.2.min.js')}}"></script>
<script type="text/javascript" src="{{url('admin/bootstrap/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{url('admin/js/vendor/all.js')}}"></script>
</body>
</html>
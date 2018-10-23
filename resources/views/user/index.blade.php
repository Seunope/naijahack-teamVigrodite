@extends('layouts.user-master')

@section('title', 'share past question and answer with friends')
@section('description', 'place where you can share your past questions and answers with friends')
@section('keywords', 'sol.ng,questions,question,question and answer,past question and answer,solutions,answer,university,university questions,university past questions,Nigeria,Africa,cbt,CBT,Computer Based Test,computer based test,COMPUTER BASED TEST,sol,solng')

@section('content')
    <!-- LIBRARY CSS-->
    <link type="text/css" rel="stylesheet" href="{{url('/assets/libs/owl-carousel-2.0/assets/owl.carousel.css')}}">
    <link type="text/css" rel="stylesheet" href="{{url('/assets/libs/selectbox/css/jquery.selectbox.css')}}">
    <link type="text/css" rel="stylesheet" href="{{url('/assets/libs/fancybox/css/jquery.fancybox.css')}}">
    <link type="text/css" rel="stylesheet" href="{{url('/assets/libs/fancybox/css/jquery.fancybox-buttons.css')}}">


    <!-- STYLE CSS    -->
    <script src="{{url('/assets/js/jquery-2.1.4.min.js')}}"></script>
    <script src="{{url('/assets/libs/js-cookie/js.cookie.js')}}"></script>
    <!-- Search index begin -->
    @if(Session::has('status'))
        <div style="text-align: center; font-size: 20px;" class="alert alert-success alert-dismissable" >
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>{{session('status')}}<span class="fa fa-check"></span>
        </div>
    @endif
    <!-- WRAPPER-->
    <div id="wrapper-content"><!-- PAGE WRAPPER-->
        <div id="page-wrapper"><!-- MAIN CONTENT-->
            <div class="main-content"><!-- CONTENT-->
                <!-- slide begin -->
                <div class="content"><!-- SLIDER BANNER-->
                    {{--<div class="image-sol">--}}
                    {{--<img src="{{ url('assets/images/cbt-twoguys.jpg') }}" alt="" class="img-responsive img-sole">--}}
                    {{--</div>--}}
                    {{--search index--}}

                    <div class="section">
                        <div class="search-input">
                            <div class="container">
                                <div class="search-input-wrapper small_search_panel">
                                    {!! Form::open(['method'=>'GET','role'=>'search','action'=>'SearchController@search']) !!}
                                    {!! Form::text('string', null,['class'=>'searchInput', 'required'=>'', 'placeholder'=>'Search your question...','style'=>'background-color: white']) !!}
                                    <button class="searchButton"><span class="fa fa-search visible-sm visible-xs hidden-lg hidden-md"></span><span class="hidden-xs hidden-sm">Search now</span></button>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--<div class="section slider-banner-03 background-opacity-2" style="height: 200px !important; background-size: cover;">--}}
                        {{--<div class="container">--}}
                            {{--<div class="slider-banner-wrapper">--}}

                                {{--<img src="/assets/images/logo-color-1.png" alt="">--}}

                                {{--<h3 data-wow-delay="0.5s" class="sub-title wow fadeInUp">This is a place to </h3>--}}

                                {{--<h1 data-wow-delay="0.5s" class="main-title wow fadeInUp">...test yourself on 100l cbt for free!</h1>--}}

                                {{--<div class="group-button">--}}
                                    {{--@if(Auth::check() && isset(Auth::user()->level))--}}
                                        {{--<button class="btn btn-green"  onclick="window.location.href='/select'"><span>Test Yourself Free!</span></button>--}}
                                        {{--<button data-wow-delay="1.3s" data-wow-duration="1s" onclick="window.location.href='/home/{{Auth::user()->level->slug}}'" class="btn btn-green-3 wow fadeInRight"><span>my courses</span></button>--}}
                                    {{--@elseif(Auth::check() && !isset(Auth::user()->level))--}}
                                        {{--<button class="btn btn-green"  onclick="window.location.href='/select'"><span>Test Yourself Now!</span></button>--}}
                                        {{--<button data-wow-delay="1.3s" data-wow-duration="1s" onclick="window.location.href='/login'" class="btn btn-green-3 wow fadeInRight"><span>Click here to complete your profile</span></button>--}}
                                    {{--@else--}}
                                        {{--<div class="row">--}}
                                            {{--<div class="col-md-4"></div>--}}
                                            {{--<div class="col-md-4">--}}
                                                {{--@if (session('warning'))--}}
                                                    {{--<div class="alert alert-warning">--}}
                                                        {{--{{ session('warning') }}--}}
                                                    {{--</div>--}}
                                                {{--@endif--}}
                                                {{--<form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">--}}
                                                    {{--{{ csrf_field() }}--}}
                                                    {{--<div class="login-title rlp-title">login to your sol.ng account</div>--}}
                                                    {{--<div class="login-form bg-w-form rlp-form" style="padding-top: 0">--}}
                                                        {{--<div class="row text-center">--}}
                                                            {{--<div class="col-md-12"><label for="regemail" class="control-label form-label">email </label>--}}
                                                                {{--<input id="regemail" type="email" placeholder="email" name="email" class="form-control form-input blue_border all-input" style="height: 36px"/>--}}
                                                                {{--@if ($errors->has('email'))--}}
                                                                    {{--<span class="help-block">--}}
                                                                    {{--<strong style="color: red;">{{ $errors->first('email') }}</strong>--}}
                                                                {{--</span>--}}
                                                            {{--@endif--}}
                                                            {{--<!--p.help-block Warning !-->--}}
                                                            {{--</div>--}}
                                                            {{--<div class="col-md-12"><label for="regpassword" class="control-label form-label">password </label>--}}
                                                                {{--<input id="regpassword" type="password" name="password" class="form-control form-input all-input" style="height: 36px"/>--}}
                                                                {{--@if ($errors->has('password'))--}}
                                                                    {{--<span class="help-block">--}}
                                                                    {{--<strong>{{ $errors->first('password') }}</strong>--}}
                                                                {{--</span>--}}
                                                            {{--@endif--}}
                                                            {{--<!-- p.help-block Warning !-->--}}
                                                            {{--</div>--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}
                                                    {{--<div class="checkbox">--}}
                                                        {{--<label>--}}
                                                            {{--<input type="checkbox" name="remember" checked> Remember Me--}}
                                                        {{--</label>--}}
                                                    {{--</div>--}}
                                                    {{--<div class="login-submit">--}}
                                                        {{--<button type="submit" class="loginButton"><span>sign in</span></button>--}}
                                                    {{--</div>--}}
                                                    {{--<a href="{{ url('/password/reset') }}">Forgot Your Password?</a>--}}
                                                    {{--<div class="login-title rlp-title">--}}
                                                        {{--Don't have account yet? Quickly <a href="/register">Register</a>--}}
                                                    {{--</div>--}}

                                                {{--</form>--}}
                                            {{--</div>--}}
                                            {{--<div class="col-md-4"></div>--}}
                                        {{--</div>--}}
                                    {{--@endif--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    <div class="section slider-banner-03 background-opacity-2">
                        <div class="container">
                            <div class="slider-banner-wrapper"><h3 data-wow-delay="0.5s" class="sub-title wow fadeInUp">This is a place to</h3>
                                <h1 data-wow-delay="0.5s" class="main-title wow fadeInUp">Test your yourself on your cbt exams.</h1>

                                <div class="group-button">
                                    <button data-wow-delay="1.3s" data-wow-duration="1s" class="btn btn-transition-3 wow fadeInLeft" onclick="window.location.href='/about'"><span> About sol ng </span></button>
                                    <button data-wow-delay="1.3s" data-wow-duration="1s" class="btn btn-green-3 wow fadeInRight" onclick="window.location.href='/select'"><span>start Test now</span></button>
                                </div>
                            </div>
                        </div>
                    </div>


                    {{--My urses begins--}}
                    @if(Auth::check())
                        <div class="section section-padding choose-course-2">
                            <div class="container">
                                <div class="group-title-index">
                                    <h2 class="center-title">My courses</h2>
                                </div>
                                <div class="choose-course-wrapper row">
                                    @foreach($courses as $course)
                                        <div class="col-md-4 col-xs-6">
                                            <div class="item-course">
                                                <a href="/course/{{$course->slug or ''}}">
                                                    <div class="info-course">
                                                        <div class="name-course">{{$course->code or ''}}</div>
                                                        <div class="info">{{count($course->questions)}} past questions</div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                    {{--My courses ends--}}


                    {{--Schools begins--}}
                    <div class="section section-padding choose-course-2">
                        <div class="container">
                            <div class="group-title-index"><h4 class="top-title">CHOOSE YOUR SCHOOL</h4>
                                <h2 class="center-title">SCHOOLS AVAILABLE ON SOL.NG</h2>
                                <div class="bottom-title">
                                    <i class="bottom-icon icon-a-1-01-01">
                                        @include('partial.user.title-brand')
                                    </i>
                                </div>
                            </div>
                            <div class="choose-course-wrapper row">
                                @foreach($schools as $school)
                                    @php $total = 0; $i=0; @endphp
                                    @foreach ($school->courses as $course)
                                        @php $i+=1;
                                        $cour[$i] = count(DB::table('questions')->where('course_id', $course->id)->get());
                                        $total+=$cour[$i];
                                        @endphp
                                    @endforeach
                                    <div class="col-md-4 col-xs-6">
                                        <div class="item-course">
                                            <div class="icon-course">
                                                @if(isset($school->path[15]))
                                                    <img src="{{$school->path or ''}}" id="school-image" alt="">
                                                @else
                                                    <label style="border: solid #242c42; width: 87px; color: #86bc42;" class="img-circle icons-img icon-globe">{{$school->name[0]}}</label>
                                                @endif
                                            </div>
                                            <a href="/general/schools/{{$school->slug or ''}}">
                                                <div class="info-course">
                                                    <div class="name-course">{{$school->name or ''}}</div>
                                                    <div class="info">Up to <b>{{$total or ''}}</b> past questions and answers.</div>
                                                </div>
                                            </a>
                                            <div class="hidden-xs hidden-sm hidden-md hover-text">
                                                <div class="wrapper-hover-text">
                                                    <div class="wrapper-hover-content"><a href="/general/schools/{{$school->slug or ''}}" class="title">{{$school->full_name or ''}}</a>
                                                        <div class="content"> There are up to {{$total or ''}} past questions and answers in {{$school->full_name or ''}} for you to access free of charge.</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    {{--Schools end--}}
                </div>
            </div>
            <div class="footer-top">
                <div class="container">
                    <div class="footer-top-wrapper">
                        <div class="footer-top-left"><p class="footer-top-focus">TAKE A CBT TEST</p>
                            <p class="footer-top-text">Join a turns of student improving their performance by taking a CBT test!</p></div>
                        <div class="footer-top-right">
                            <button onclick="window.location.href='/select'" class="btn btn-blue btn-bold"><span>TAKE A CBT TEST NOW</span></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section section-padding edu-ab">
                <div class="container">
                    <div class="edu-ab">
                        <div class="group-title-index edu-ab-title"><h2 class="center-title">WITH <b>sol.ng</b> YOU CAN</h2>
                            <h4 class="top-title">Get solution to all your past questions anytime anywhere, All for free</h4></div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="edu-ab-content">
                                    <ul class="list-unstyled list-inline">
                                        <li>
                                            <div class="circle-icon"><i class="fa fa-user fa-2x"></i></div>
                                            <span>Access solution to past questions</span>
                                        </li>
                                        <li>
                                            <div class="circle-icon fa-2x"><i class="fa fa-search"></i></div>
                                            <span>Solve past questions</span>
                                        </li>
                                        <li>
                                            <div class="circle-icon fa-2x"><i class="fa fa-thumbs-up"></i></div>
                                            <span>Take a CBT test based on past questions.</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <!-- to question solvers begin -->
        <div class="section section-padding background-opacity best-staff">
            <div class="container">
                <div class="group-title-index"><h4 class="top-title">touch them if you want</h4>
                    <h2 class="center-title">Random users</h2>
                    <div class="bottom-title"><i class="bottom-icon icon-icon-05">sol.ng users</i></div>
                </div>
                <div class="best-staff-wrapper">
                    <div class="best-staff-content">
                        @foreach($users as $user)
                            <div class="staff-item">
                                <div class="staff-item-wrapper">
                                    <div class="staff-info">
                                        <a href="#" class="staff-avatar">
                                            @if(isset($user->path[15]))
                                                <img src="{{$user->path}}" alt="" class="img-responsive"/></a>
                                        @else
                                            <img src="{{url('/User_images/avatar3.jpg')}}" alt="" class="img-responsive"/>
                                        @endif
                                        <a href="#" class="staff-name">{{$user->name}}</a>
                                        <div class="staff-job">{{$user->school->name or ''}}</div>
                                        <div class="staff-desctiption" style="font-size: 11px;">A student of {{$user->school->full_name or ''}}. @if(isset($user->department)) Department of {{$user->department->full_name or ''}} @else No department yet @endif</div>
                                    </div>
                                </div>
                                <div class="staff-socials" style="margin-top: 10px;">
                                    @if(isset($user->email))
                                        {{--<a href="#" style="width: 100%; background-color: #242c42;"><i class="fa fa-envelope ">{{$user->email or ''}}</i></a>--}}
                                        <a href="/profile/{{$user->name or ''}}/{{$user->slug or ''}}" style="width: 100%; background-color: #242c42;"><i class="fa fa-user "> View more</i></a>
                                    @endif
                                    {{--<a href="#" class="facebook"><i class="fa fa-facebook"></i></a><a href="#" class="google"><i class="fa fa-google-plus"></i></a><a href="#" class="twitter"><i class="fa fa-twitter"></i></a>--}}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="group-btn-slider">
                <div class="btn-prev"><i class="fa fa-angle-left"></i></div>
                <div class="btn-next"><i class="fa fa-angle-right"></i></div>
            </div>
        </div>
        <!-- to question solvers ends -->
        <!-- footerz and java scripts -->

        {{--<!-- LOADING-->--}}
        {{--<div class="body-2 loading">--}}
        {{--<div class="dots-loader"></div>--}}
        {{--</div>--}}
    </div>
    <!-- JAVASCRIPT LIBS-->
    <script src="{{url('assets/libs/owl-carousel-2.0/owl.carousel.min.js')}}"></script>
    <!-- MAIN JS-->
    <script src="{{url('assets/js/main.js')}}"></script>
    <!-- LOADING SCRIPTS FOR PAGE-->

@endsection





@extends('layouts.user-master')

@section('title', 'About sol.ng')

@section('description', 'share past question and answer with friends')
@section('keywords', 'About sol.ng, sol, solng ,past, past question and answer')

@section('content')

    <div class="content">
        <div class="section background-opacity page-title set-height-top">
            <div class="container">
                <div class="page-title-wrapper"><!--.page-title-content--><h2 class="captions">about us</h2>
                    <ol class="breadcrumb">
                        <li><a href="/">SOL.NG</a></li>
                        <li class="active"><a>About</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <!--INTRO sol.ng-->
        <div class="section intro-edu">
            <div class="container">
                <div class="intro-edu-wrapper">
                    <div class="row">
                        <div class="col-md-5">
                            <img src="{{url('assets/images/solng/four.jpg')}}" alt="" class="intro-image fadeInLeft animated wow"/>
                            <img src="{{url('assets/images/solng/eleven.jpg')}}" alt="" class="intro-image fadeInLeft animated wow"/>
                        </div>
                        <div class="col-md-7">
                            <div class="intro-title">About <b>sol.ng</b> ?</div>
                            <div class="intro-content">
                                {{--<p>sol.ng is a platform made by student for student to get all our past questions solved by fellow students.<br/>--}}
                                {{--Is just a abunch of student helping one another to solve questions.</p>--}}
                                <u><div class="intro-title"><b>FOREWORD</b></div></u>
                                <p>Lack of solution to past question is a major challenge that we student
                                    have been facing for a long time is now high time we provided a platform to tackle this problem.
                                    <br><br>
                                    &nbsp;That's why we create sol.ng.
                                    <br>
                                    &nbsp;Thank God people have been uploading turns of question and answers and to your surprise it is there for free.
                                    <br>
                                    So that you all can now solve questions and put it online for everyone to see free of charge.
                                    <br>
                                    pick a course of your choice today in your department or in your school, mail it to info@sol.ng we will assign the course to you and you
                                    start uploading the solutions today.
                                    <br><br>
                                    &nbsp;This is a opportunity for you to help students if you ever feel like making impact.
                                    REMEMBER you are putting a smile to someones face by solving all this questions.
                                    and we all will never forget you. EVER!
                                    <br>
                                    Don't feel shy to help just do it.
                                </p>
                                <u><div class="intro-title"><b>MISSION</b></div></u>
                                <p>
                                    Our mission is to provide a means where students will be able to help one another for better performance all free of charge.
                                    <br>
                                    And thank God it is working out.
                                </p>
                                {{--<p>Is a website where you get solution to past questions which a fellow student has solved and also solve past questions for students too.<br>--}}
                                {{--If we keep solving for one another with time all past question will got solved.<br>--}}
                                {{--Which will be of help to all of us in preparing for our examinations, tests, assignments and even outside the school.--}}
                                {{--</p></div>--}}
                            </div>
                            <div class="group-button">
                                <button class="btn btn-transition-2" onclick="window.location.href='/register'"><span>Join us today</span></button>
                                <!-- <button class="btn btn-green"><span>start learn now</span></button> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section section-padding edu-feature">
            <div class="container">
                <div class="edu-feature-wrapper">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="group-title-index edu-feature-text"><h2 class="center-title"> friendly features at sol.ng</h2>

                                        <p class="top-title">All solution to past questions here are free of charge. </p></div>
                                </div>
                                <div class="col-md-8">
                                    <ul id="accordion" role="tablist" class="panel-group list-unstyled edu-feature-list">
                                        <li class="panel">
                                            <div role="tab" id="item-4" class="col-item-1"><i class="fa fa-check-circle"></i><a href="#capability1" data-toggle="collapse" data-parent="#accordion" role="button" aria-expanded="true" aria-controls="lesson"><span>Very simple</span> registration form</a></div>
                                        </li>
                                        <li class="panel">
                                            <div role="tab" id="item-1" class="col-item-1"><i class="fa fa-check-circle"></i><a href="#lesson" data-toggle="collapse" data-parent="#accordion" role="button" aria-expanded="true" aria-controls="lesson"><span>You have 20 free coins <img src="assets/images/coins2.png" class="coinImage"> </span> on registration</a></div>
                                        </li>
                                        <li class="panel">
                                            <div role="tab" id="item-2" class="col-item-1"><i class="fa fa-check-circle"></i><a href="#display" data-toggle="collapse" data-parent="#accordion" role="button" aria-expanded="true" aria-controls="lesson"><span>Get more sol credit </span>when you solve a question</a></div>
                                        </li>
                                        <li class="panel">
                                            <div role="tab" id="item-3" class="col-item-1"><i class="fa fa-check-circle"></i><a href="#discuss" data-toggle="collapse" data-parent="#accordion" role="button" aria-expanded="true" aria-controls="lesson"><span>Easy pay</span> with MTN credit and the rest</a></div>
                                        </li>
                                        <li class="panel">
                                            <div role="tab" id="item-5" class="col-item-1"><i class="fa fa-check-circle"></i><a href="#capability2" data-toggle="collapse" data-parent="#accordion" role="button" aria-expanded="true" aria-controls="lesson"><span>Very light</span> website</a></div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <img src="/assets/images/picture-8.png" alt="" class="computer-image"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- PROGRESS BARS-->
        <div class="section progress-bars section-padding">
            <div class="container">
                <div class="progress-bars-content">
                    <div class="progress-bar-wrapper"><h2 class="title-2">Some important facts about sol.ng</h2>

                        <div class="row">
                            <div class="content">
                                <div class="col-sm-3">
                                    <div class="progress-bar-number">
                                        <div data-from="0" data-to="{{$AllSchools or '' }}" data-speed="1000" class="num">0</div>
                                        <p class="name-inner">schools</p>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="progress-bar-number">
                                        <div data-from="0" data-to="{{$AllCourses or '' }}" data-speed="1000" class="num">0</div>
                                        <p class="name-inner">courses</p>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="progress-bar-number">
                                        <div data-from="0" data-to="{{$AllUsers or '' }}" data-speed="1000" class="num">{{$AllUsers or '' }}</div>
                                        <p class="name-inner">members</p>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="progress-bar-number">
                                        <div data-from="0" data-to="{{$AllDepartments or '' }}" data-speed="1000" class="num">0</div>
                                        <p class="name-inner">Departments</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="group-button">
                            <!-- <button onclick="window.location.href='categories.html'" class="btn btn-transition-3"><span>Purchase theme</span></button> -->
                            <button onclick="window.location.href='about-us.html'" class="btn btn-green-3"><span>register</span></button>
                        </div>
                        <div class="group-btn-slider">
                            <div class="btn-prev"><i class="fa fa-angle-left"></i></div>
                            <div class="btn-next"><i class="fa fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- SLIDER TALK ABOUT US-->
        <div class="section background-opacity slider-talk-about-us">
            <div class="container">
                <div id="people-talk" data-ride="carousel" data-interval="5000" class="slider-talk-about-us-wrapper carousel slide">
                    <div role="listbox" class="slider-talk-about-us-content carousel-inner">
                        @foreach($testimonies as $testimony)
                            <div class="peopel-item item @if(($num++)==2) active  @endif" ><p class="peopel-comment">"{{$testimony->body or '' }}"</p>
                                <div class="group-peole-info">
                                    <div class="peopel-avatar">
                                    <img src="@if(isset($testimony->path[15])) {{$testimony->path or '' }} @else /User_images/avatar3.jpg @endif" alt="{{$testimony->name or '' }}" class="img-responsive" style="width: 120px; height: 120px; max-width: 120%;" /></div>
                                    <div class="peopel-name">{{$testimony->name or '' }}</div>
                                    <div class="people-job">{{$testimony->email or '' }}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="group-btn-slider"><a href="#people-talk" role="button" data-slide="prev">
                    <div class="btn-prev carousel-control left"><i class="fa fa-angle-left"></i></div>
                </a><a href="#people-talk" role="button" data-slide="next">
                    <div class="btn-next carousel-control right"><i class="fa fa-angle-right"></i></div>
                </a></div>
        </div>
        <!-- SLIDER LOGO-->
        <!--  <div class="section slider-logo">
             <div class="container">
                 <div class="slider-logo-wrapper">
                     <div class="slider-logo-content">
                         <div class="carousel-logos owl-carousel">
                             <div class="logo-iteam item"><a href="#"><img src="assets/images/logo/logo-carousel-1.png" alt="" class="img-responsive"/></a></div>
                             <div class="logo-iteam item"><a href="#"><img src="assets/images/logo/logo-carousel-2.png" alt="" class="img-responsive"/></a></div>
                             <div class="logo-iteam item"><a href="#"><img src="assets/images/logo/logo-carousel-3.png" alt="" class="img-responsive"/></a></div>
                             <div class="logo-iteam item"><a href="#"><img src="assets/images/logo/logo-carousel-4.png" alt="" class="img-responsive"/></a></div>
                             <div class="logo-iteam item"><a href="#"><img src="assets/images/logo/logo-carousel-5.png" alt="" class="img-responsive"/></a></div>
                             <div class="logo-iteam item"><a href="#"><img src="assets/images/logo/logo-carousel-6.png" alt="" class="img-responsive"/></a></div>
                             <div class="logo-iteam item"><a href="#"><img src="assets/images/logo/logo-carousel-1.png" alt="" class="img-responsive"/></a></div>
                             <div class="logo-iteam item"><a href="#"><img src="assets/images/logo/logo-carousel-2.png" alt="" class="img-responsive"/></a></div>
                             <div class="logo-iteam item"><a href="#"><img src="assets/images/logo/logo-carousel-3.png" alt="" class="img-responsive"/></a></div>
                             <div class="logo-iteam item"><a href="#"><img src="assets/images/logo/logo-carousel-4.png" alt="" class="img-responsive"/></a></div>
                             <div class="logo-iteam item"><a href="#"><img src="assets/images/logo/logo-carousel-5.png" alt="" class="img-responsive"/></a></div>
                             <div class="logo-iteam item"><a href="#"><img src="assets/images/logo/logo-carousel-6.png" alt="" class="img-responsive"/></a></div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
          -->

        <!-- LOADING-->
        <!-- <div class="body-2 loading">
            <div class="dots-loader"></div>
        </div> -->
        <!-- JAVASCRIPT LIBS-->
        <script type="text/javascript" src="{{URL('/assets/js/jquery-2.1.4.min.js')}}"></script>
        <script type="text/javascript" src="{{URL('/assets/libs/wow-js/wow.min.js')}}"></script>
        <script src="/assets/libs/appear/jquery.appear.js"></script>
        <script src="/assets/libs/count-to/jquery.countTo.js"></script>
        <script src="/assets/js/pages/homepage.js"></script>
        <script>if ((Cookies.get('color-skin') != undefined) && (Cookies.get('color-skin') != 'color-1')) {
                $('.logo .header-logo img').attr('src', 'assets/images/logo-' + Cookies.get('color-skin') + '.png');
            } else if ((Cookies.get('color-skin') == undefined) || (Cookies.get('color-skin') == 'color-1')) {
                $('.logo .header-logo img').attr('src', 'assets/images/logo-color-1.png');
            }</script>
        <script src="/assets/libs/bootstrap-3.3.5/js/bootstrap.min.js"></script>
        <script src="/assets/libs/smooth-scroll/jquery-smoothscroll.js"></script>
        <script src="/assets/libs/owl-carousel-2.0/owl.carousel.min.js"></script>
        <script src="/assets/libs/appear/jquery.appear.js"></script>
        <script src="/assets/libs/count-to/jquery.countTo.js"></script>
        <script src="/assets/libs/wow-js/wow.min.js"></script>
        <script src="/assets/libs/selectbox/js/jquery.selectbox-0.2.min.js"></script>
        <script src="/assets/libs/fancybox/js/jquery.fancybox.js"></script>
        <script src="/assets/libs/fancybox/js/jquery.fancybox-buttons.js"></script>
        <!-- MAIN JS-->
        <script src="/assets/js/main.js"></script>
        <!-- LOADING SCRIPTS FOR PAGE-->
        <script src="/assets/libs/isotope/isotope.pkgd.min.js"></script>
        <script src="/assets/libs/isotope/fit-columns.js"></script>
        <script src="/assets/js/pages/homepage.js"></script>

    </div>
@endsection
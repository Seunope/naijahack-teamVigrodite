<?php $__env->startSection('title', 'share past question and answer with friends'); ?>
<?php $__env->startSection('description', 'place where you can share your past questions and answers with friends'); ?>
<?php $__env->startSection('keywords', 'sol.ng,questions,question,question and answer,past question and answer,solutions,answer,university,university questions,university past questions,Nigeria,Africa,cbt,CBT,Computer Based Test,computer based test,COMPUTER BASED TEST,sol,solng'); ?>

<?php $__env->startSection('content'); ?>
    <!-- LIBRARY CSS-->
    <link type="text/css" rel="stylesheet" href="<?php echo e(url('/assets/libs/owl-carousel-2.0/assets/owl.carousel.css')); ?>">
    <link type="text/css" rel="stylesheet" href="<?php echo e(url('/assets/libs/selectbox/css/jquery.selectbox.css')); ?>">
    <link type="text/css" rel="stylesheet" href="<?php echo e(url('/assets/libs/fancybox/css/jquery.fancybox.css')); ?>">
    <link type="text/css" rel="stylesheet" href="<?php echo e(url('/assets/libs/fancybox/css/jquery.fancybox-buttons.css')); ?>">


    <!-- STYLE CSS    -->
    <script src="<?php echo e(url('/assets/js/jquery-2.1.4.min.js')); ?>"></script>
    <script src="<?php echo e(url('/assets/libs/js-cookie/js.cookie.js')); ?>"></script>
    <!-- Search index begin -->
    <?php if(Session::has('status')): ?>
        <div style="text-align: center; font-size: 20px;" class="alert alert-success alert-dismissable" >
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><?php echo e(session('status')); ?><span class="fa fa-check"></span>
        </div>
    <?php endif; ?>
    <!-- WRAPPER-->
    <div id="wrapper-content"><!-- PAGE WRAPPER-->
        <div id="page-wrapper"><!-- MAIN CONTENT-->
            <div class="main-content"><!-- CONTENT-->
                <!-- slide begin -->
                <div class="content"><!-- SLIDER BANNER-->
                    <?php /*<div class="image-sol">*/ ?>
                    <?php /*<img src="<?php echo e(url('assets/images/cbt-twoguys.jpg')); ?>" alt="" class="img-responsive img-sole">*/ ?>
                    <?php /*</div>*/ ?>
                    <?php /*search index*/ ?>

                    <div class="section">
                        <div class="search-input">
                            <div class="container">
                                <div class="search-input-wrapper small_search_panel">
                                    <?php echo Form::open(['method'=>'GET','role'=>'search','action'=>'SearchController@search']); ?>

                                    <?php echo Form::text('string', null,['class'=>'searchInput', 'required'=>'', 'placeholder'=>'Search your question...','style'=>'background-color: white']); ?>

                                    <button class="searchButton"><span class="fa fa-search visible-sm visible-xs hidden-lg hidden-md"></span><span class="hidden-xs hidden-sm">Search now</span></button>
                                    <?php echo Form::close(); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                    <?php /*<div class="section slider-banner-03 background-opacity-2" style="height: 200px !important; background-size: cover;">*/ ?>
                        <?php /*<div class="container">*/ ?>
                            <?php /*<div class="slider-banner-wrapper">*/ ?>

                                <?php /*<img src="/assets/images/logo-color-1.png" alt="">*/ ?>

                                <?php /*<h3 data-wow-delay="0.5s" class="sub-title wow fadeInUp">This is a place to </h3>*/ ?>

                                <?php /*<h1 data-wow-delay="0.5s" class="main-title wow fadeInUp">...test yourself on 100l cbt for free!</h1>*/ ?>

                                <?php /*<div class="group-button">*/ ?>
                                    <?php /*<?php if(Auth::check() && isset(Auth::user()->level)): ?>*/ ?>
                                        <?php /*<button class="btn btn-green"  onclick="window.location.href='/select'"><span>Test Yourself Free!</span></button>*/ ?>
                                        <?php /*<button data-wow-delay="1.3s" data-wow-duration="1s" onclick="window.location.href='/home/<?php echo e(Auth::user()->level->slug); ?>'" class="btn btn-green-3 wow fadeInRight"><span>my courses</span></button>*/ ?>
                                    <?php /*<?php elseif(Auth::check() && !isset(Auth::user()->level)): ?>*/ ?>
                                        <?php /*<button class="btn btn-green"  onclick="window.location.href='/select'"><span>Test Yourself Now!</span></button>*/ ?>
                                        <?php /*<button data-wow-delay="1.3s" data-wow-duration="1s" onclick="window.location.href='/login'" class="btn btn-green-3 wow fadeInRight"><span>Click here to complete your profile</span></button>*/ ?>
                                    <?php /*<?php else: ?>*/ ?>
                                        <?php /*<div class="row">*/ ?>
                                            <?php /*<div class="col-md-4"></div>*/ ?>
                                            <?php /*<div class="col-md-4">*/ ?>
                                                <?php /*<?php if(session('warning')): ?>*/ ?>
                                                    <?php /*<div class="alert alert-warning">*/ ?>
                                                        <?php /*<?php echo e(session('warning')); ?>*/ ?>
                                                    <?php /*</div>*/ ?>
                                                <?php /*<?php endif; ?>*/ ?>
                                                <?php /*<form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/login')); ?>">*/ ?>
                                                    <?php /*<?php echo e(csrf_field()); ?>*/ ?>
                                                    <?php /*<div class="login-title rlp-title">login to your sol.ng account</div>*/ ?>
                                                    <?php /*<div class="login-form bg-w-form rlp-form" style="padding-top: 0">*/ ?>
                                                        <?php /*<div class="row text-center">*/ ?>
                                                            <?php /*<div class="col-md-12"><label for="regemail" class="control-label form-label">email </label>*/ ?>
                                                                <?php /*<input id="regemail" type="email" placeholder="email" name="email" class="form-control form-input blue_border all-input" style="height: 36px"/>*/ ?>
                                                                <?php /*<?php if($errors->has('email')): ?>*/ ?>
                                                                    <?php /*<span class="help-block">*/ ?>
                                                                    <?php /*<strong style="color: red;"><?php echo e($errors->first('email')); ?></strong>*/ ?>
                                                                <?php /*</span>*/ ?>
                                                            <?php /*<?php endif; ?>*/ ?>
                                                            <?php /*<!--p.help-block Warning !-->*/ ?>
                                                            <?php /*</div>*/ ?>
                                                            <?php /*<div class="col-md-12"><label for="regpassword" class="control-label form-label">password </label>*/ ?>
                                                                <?php /*<input id="regpassword" type="password" name="password" class="form-control form-input all-input" style="height: 36px"/>*/ ?>
                                                                <?php /*<?php if($errors->has('password')): ?>*/ ?>
                                                                    <?php /*<span class="help-block">*/ ?>
                                                                    <?php /*<strong><?php echo e($errors->first('password')); ?></strong>*/ ?>
                                                                <?php /*</span>*/ ?>
                                                            <?php /*<?php endif; ?>*/ ?>
                                                            <?php /*<!-- p.help-block Warning !-->*/ ?>
                                                            <?php /*</div>*/ ?>
                                                        <?php /*</div>*/ ?>
                                                    <?php /*</div>*/ ?>
                                                    <?php /*<div class="checkbox">*/ ?>
                                                        <?php /*<label>*/ ?>
                                                            <?php /*<input type="checkbox" name="remember" checked> Remember Me*/ ?>
                                                        <?php /*</label>*/ ?>
                                                    <?php /*</div>*/ ?>
                                                    <?php /*<div class="login-submit">*/ ?>
                                                        <?php /*<button type="submit" class="loginButton"><span>sign in</span></button>*/ ?>
                                                    <?php /*</div>*/ ?>
                                                    <?php /*<a href="<?php echo e(url('/password/reset')); ?>">Forgot Your Password?</a>*/ ?>
                                                    <?php /*<div class="login-title rlp-title">*/ ?>
                                                        <?php /*Don't have account yet? Quickly <a href="/register">Register</a>*/ ?>
                                                    <?php /*</div>*/ ?>

                                                <?php /*</form>*/ ?>
                                            <?php /*</div>*/ ?>
                                            <?php /*<div class="col-md-4"></div>*/ ?>
                                        <?php /*</div>*/ ?>
                                    <?php /*<?php endif; ?>*/ ?>
                                <?php /*</div>*/ ?>
                            <?php /*</div>*/ ?>
                        <?php /*</div>*/ ?>
                    <?php /*</div>*/ ?>
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


                    <?php /*My urses begins*/ ?>
                    <?php if(Auth::check()): ?>
                        <div class="section section-padding choose-course-2">
                            <div class="container">
                                <div class="group-title-index">
                                    <h2 class="center-title">My courses</h2>
                                </div>
                                <div class="choose-course-wrapper row">
                                    <?php foreach($courses as $course): ?>
                                        <div class="col-md-4 col-xs-6">
                                            <div class="item-course">
                                                <a href="/course/<?php echo e(isset($course->slug) ? $course->slug : ''); ?>">
                                                    <div class="info-course">
                                                        <div class="name-course"><?php echo e(isset($course->code) ? $course->code : ''); ?></div>
                                                        <div class="info"><?php echo e(count($course->questions)); ?> past questions</div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php /*My courses ends*/ ?>


                    <?php /*Schools begins*/ ?>
                    <div class="section section-padding choose-course-2">
                        <div class="container">
                            <div class="group-title-index"><h4 class="top-title">CHOOSE YOUR SCHOOL</h4>
                                <h2 class="center-title">SCHOOLS AVAILABLE ON SOL.NG</h2>
                                <div class="bottom-title">
                                    <i class="bottom-icon icon-a-1-01-01">
                                        <?php echo $__env->make('partial.user.title-brand', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                    </i>
                                </div>
                            </div>
                            <div class="choose-course-wrapper row">
                                <?php foreach($schools as $school): ?>
                                    <?php  $total = 0; $i=0;  ?>
                                    <?php foreach($school->courses as $course): ?>
                                        <?php  $i+=1;
                                        $cour[$i] = count(DB::table('questions')->where('course_id', $course->id)->get());
                                        $total+=$cour[$i];
                                         ?>
                                    <?php endforeach; ?>
                                    <div class="col-md-4 col-xs-6">
                                        <div class="item-course">
                                            <div class="icon-course">
                                                <?php if(isset($school->path[15])): ?>
                                                    <img src="<?php echo e(isset($school->path) ? $school->path : ''); ?>" id="school-image" alt="">
                                                <?php else: ?>
                                                    <label style="border: solid #242c42; width: 87px; color: #86bc42;" class="img-circle icons-img icon-globe"><?php echo e($school->name[0]); ?></label>
                                                <?php endif; ?>
                                            </div>
                                            <a href="/general/schools/<?php echo e(isset($school->slug) ? $school->slug : ''); ?>">
                                                <div class="info-course">
                                                    <div class="name-course"><?php echo e(isset($school->name) ? $school->name : ''); ?></div>
                                                    <div class="info">Up to <b><?php echo e(isset($total) ? $total : ''); ?></b> past questions and answers.</div>
                                                </div>
                                            </a>
                                            <div class="hidden-xs hidden-sm hidden-md hover-text">
                                                <div class="wrapper-hover-text">
                                                    <div class="wrapper-hover-content"><a href="/general/schools/<?php echo e(isset($school->slug) ? $school->slug : ''); ?>" class="title"><?php echo e(isset($school->full_name) ? $school->full_name : ''); ?></a>
                                                        <div class="content"> There are up to <?php echo e(isset($total) ? $total : ''); ?> past questions and answers in <?php echo e(isset($school->full_name) ? $school->full_name : ''); ?> for you to access free of charge.</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <?php /*Schools end*/ ?>
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
                        <?php foreach($users as $user): ?>
                            <div class="staff-item">
                                <div class="staff-item-wrapper">
                                    <div class="staff-info">
                                        <a href="#" class="staff-avatar">
                                            <?php if(isset($user->path[15])): ?>
                                                <img src="<?php echo e($user->path); ?>" alt="" class="img-responsive"/></a>
                                        <?php else: ?>
                                            <img src="<?php echo e(url('/User_images/avatar3.jpg')); ?>" alt="" class="img-responsive"/>
                                        <?php endif; ?>
                                        <a href="#" class="staff-name"><?php echo e($user->name); ?></a>
                                        <div class="staff-job"><?php echo e(isset($user->school->name) ? $user->school->name : ''); ?></div>
                                        <div class="staff-desctiption" style="font-size: 11px;">A student of <?php echo e(isset($user->school->full_name) ? $user->school->full_name : ''); ?>. <?php if(isset($user->department)): ?> Department of <?php echo e(isset($user->department->full_name) ? $user->department->full_name : ''); ?> <?php else: ?> No department yet <?php endif; ?></div>
                                    </div>
                                </div>
                                <div class="staff-socials" style="margin-top: 10px;">
                                    <?php if(isset($user->email)): ?>
                                        <?php /*<a href="#" style="width: 100%; background-color: #242c42;"><i class="fa fa-envelope "><?php echo e(isset($user->email) ? $user->email : ''); ?></i></a>*/ ?>
                                        <a href="/profile/<?php echo e(isset($user->name) ? $user->name : ''); ?>/<?php echo e(isset($user->slug) ? $user->slug : ''); ?>" style="width: 100%; background-color: #242c42;"><i class="fa fa-user "> View more</i></a>
                                    <?php endif; ?>
                                    <?php /*<a href="#" class="facebook"><i class="fa fa-facebook"></i></a><a href="#" class="google"><i class="fa fa-google-plus"></i></a><a href="#" class="twitter"><i class="fa fa-twitter"></i></a>*/ ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
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

        <?php /*<!-- LOADING-->*/ ?>
        <?php /*<div class="body-2 loading">*/ ?>
        <?php /*<div class="dots-loader"></div>*/ ?>
        <?php /*</div>*/ ?>
    </div>
    <!-- JAVASCRIPT LIBS-->
    <script src="<?php echo e(url('assets/libs/owl-carousel-2.0/owl.carousel.min.js')); ?>"></script>
    <!-- MAIN JS-->
    <script src="<?php echo e(url('assets/js/main.js')); ?>"></script>
    <!-- LOADING SCRIPTS FOR PAGE-->

<?php $__env->stopSection(); ?>





<?php echo $__env->make('layouts.user-master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
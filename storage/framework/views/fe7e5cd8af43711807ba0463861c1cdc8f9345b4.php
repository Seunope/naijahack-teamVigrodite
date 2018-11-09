<!DOCTYPE html>
<html lang="en">
<head><title>sol.ng - <?php echo $__env->yieldContent('title'); ?></title>

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
                j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
                'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-MJJSR5D');
    </script>
    <!-- End Google Tag Manager -->
    <?php echo $__env->make('analyticscript', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="description" content="<?php echo $__env->yieldContent('description'); ?>">
    <meta name="keywords" content="<?php echo $__env->yieldContent('keywords'); ?>">
    <?php /*<meta name="description" content="Sol.ng: solve and upload past question and answer for all higher institution in Nigeria, CBT practice based on past questions of your school, Interactive session for students to ask questions and get answered by more brilliant students. Join us today!">*/ ?>
    <?php /*<meta name="keywords" content="sol.ng,questions,solutions,answer,university,Nigeria,Africa,cbt,sol,solng">*/ ?>
    <meta name="author" content="sol.ng Academics">
    <meta name="google-site-verification" content="FTPDZGgr_d9fultl3ovAvSrTSAuuBIb2BjFVomgoAtk" />
    <meta name="msvalidate.01" content="EAE801DF63CD1345B9B74464D22E2A80" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- LIBRARY FONT-->
    <!-- <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:400,400italic,700,900,300"> -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(url('admin/font-awesome/css/font-awesome.min.css')); ?>" />
    <!-- LIBRARY CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(url('admin/bootstrap/css/bootstrap.min.css')); ?>" />
    <link type="text/css" rel="stylesheet" href="<?php echo e(url('assets/css/color-1.css')); ?>">
    <link type="text/css" rel="stylesheet" href="<?php echo e(url('assets/css/style.css')); ?>">
    <link type="text/css" rel="stylesheet" href="/assets/libs/selectbox/css/jquery.selectbox.css">
    <?php /*for summernote*/ ?>
    <?php echo $__env->yieldContent('private-head'); ?>
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MJJSR5D"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<!-- HEADER-->
<header>
    <?php echo $__env->make('partial.user.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('partial.user.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</header>
<div class="">
    <!-- WRAPPER-->
    <div id="wrapper-content"><!-- PAGE WRAPPER-->
        <div id="page-wrapper"><!-- MAIN CONTENT-->
            <div class="main-content"><!-- CONTENT-->
                <div class="content">
                    <?php echo $__env->make('partial.admin.error', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo $__env->yieldContent('content'); ?>
                </div>
            </div>
        </div>
        <!-- BUTTON BACK TO TOP-->
        <div id="back-top"><a href="#top"><i class="fa fa-angle-double-up"></i></a></div>
    </div>
</div>
<!-- FOOTER-->
<?php echo $__env->make('partial.user.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<script type="text/javascript" src="<?php echo e(url('assets/js/jquery-2.1.4.min.js')); ?>"></script>

<script type="text/javascript" src="<?php echo e(url('admin/bootstrap/js/bootstrap.min.js')); ?>"></script>


<script src="assets/libs/wow-js/wow.min.js"></script>
<script src="assets/libs/selectbox/js/jquery.selectbox-0.2.min.js"></script>
<script src="assets/js/main.js"></script>


</body>
</html>
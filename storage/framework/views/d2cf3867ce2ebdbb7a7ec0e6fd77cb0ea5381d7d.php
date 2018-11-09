<?php $__env->startSection('title', ' login page'); ?>

<?php $__env->startSection('content'); ?>

<div class="page-login rlp">
    <div class="container">
        <div class="login-wrapper rlp-wrapper center-text">
            <div class="login-table rlp-table"><a href="/"><img src="assets/images/logo-color-1.png" alt="" class="login"/></a>

                <?php if(session('status')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session('status')); ?>

                    </div>
                <?php endif; ?>
                <?php if(session('warning')): ?>
                    <div class="alert alert-warning">
                        <?php echo e(session('warning')); ?>

                    </div>
                <?php endif; ?>
                <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/login')); ?>">
                    <?php echo e(csrf_field()); ?>

                    <div class="login-title rlp-title">login to your sol.ng account</div>
                    <!-- <?php if(Session::has('status')): ?>
                        <div class="alert alert-warning"><?php echo e(Session('status')); ?><span class="fa fa-user"></span></div>
                    <?php endif; ?> -->
                    <div class="login-form bg-w-form rlp-form">
                        <div class="row text-center">
                            <div class="col-md-12"><label for="regemail" class="control-label form-label">email </label><input id="regemail" type="email" placeholder="email" name="email" class="form-control form-input blue_border all-input"/>
                                <?php if($errors->has('email')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('email')); ?></strong>
                                </span>
                                <?php endif; ?>
                                <!--p.help-block Warning !-->
                            </div>
                            <div class="col-md-12"><label for="regpassword" class="control-label form-label">password </label><input id="regpassword" type="password" name="password" class="form-control form-input all-input"/>
                                <?php if($errors->has('password')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('password')); ?></strong>
                                </span>
                                <?php endif; ?>
                                <!-- p.help-block Warning !-->
                            </div>
                        </div>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember"> Remember Me
                        </label>
                    </div>
                    <div class="login-submit">
                        <button type="submit" class="loginButton"><span>sign in</span></button>
                    </div>
                    <a href="/register">Register</a>
                    <span> or </span>
                    <a href="<?php echo e(url('/password/reset')); ?>">Forgot Your Password?</a>
                    
                </form>
            </div>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user-master-no-nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
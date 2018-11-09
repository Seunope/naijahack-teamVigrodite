<div class="header-topbar">
    <div class="container">
        <div class="topbar-left pull-left">
            <div class="email"><a><i class="topbar-icon fa fa-envelope-o"></i><span>info@sol.tech</span></a></div>
        </div>
        <div class="topbar-right pull-right">
            <div class="socials"><a href="https://facebook.com/sol4ng" class="facebook" target="_blank"><i class="fa fa-facebook"></i></a>
                <a href="https://plus.google.com/communities/115896551858053813824" class="google" target="_blank"><i class="fa fa-google-plus"></i></a>
                <?php /*<a class="twitter"><i class="fa fa-twitter"></i></a>*/ ?>
                <?php /*<a href="/contact" class="whatsapp"><i class="fa fa-whatsapp"></i></a>*/ ?>
                <?php /*<a href="#" class="pinterest"><i class="fa fa-pinterest"></i>*/ ?>
                <?php /*</a><a href="#" class="blog"><i class="fa fa-rss"></i></a>*/ ?>
                <?php /*<a href="#" class="dribbble"><i class="fa fa-dribbble"></i></a>*/ ?>
            </div>
            <?php if(Auth::check()): ?>
                <div class="group-sign-in"><a href="/profile" class="login"><?php echo e(Auth::user()->name); ?>&nbsp;&nbsp;&nbsp</a></div>
                <div class="hotline"><span class="hidden-sm hidden-xs visible-md visible-lg"><a>Beep <i class="fa fa-phone"></i>+2348064978778</span></a></div>
            <?php else: ?>
                <div class="group-sign-in"><a href="/login" class="login">login</a><a href="/register" class="register">register&nbsp;&nbsp; </a></div>
                <div class="hotline "><span class="hidden-sm hidden-xs visible-md visible-lg"><a> <i class="topbar-icon fa fa-phone"></i><span>+2348064978778</span></a></span></div>
            <?php endif; ?>
        </div>
    </div>
</div>
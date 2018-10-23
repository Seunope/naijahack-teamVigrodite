<footer>
    <div class="footer-main">
        <div class="container">
            <div class="footer-main-wrapper">
                <div class="row">
                    <div class="col-2">
                        <div class="col-md-4 col-sm-6 col-xs-6 sd380">
                            <div class="edugate-widget widget">
                                <div class="title-widget">Sol.ng</div>
                                <div class="content-widget"><p>Sol.ng is solve and upload past question platform.
                                        <br>
                                        More so where you can attempt a past question based CBT TEST to improve your performance.
                                    </p>

                                    <div class="info-list">
                                        <ul class="list-unstyled">
                                            <li><i class="fa fa-envelope-o"></i><a href="#">info@sol.ng</a></li>
                                            <li><i class="fa fa-phone"></i><a href="#">+2348064978778</a></li>
                                            {{--<li><i class="fa fa-map-marker"></i><a href="#"><p>Adenike Ogb.</p>--}}
                                                    {{--<p>Nigeria</p></a></li>--}}
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-6 sd380">
                            <div class="useful-link-widget widget">
                                <div class="title-widget">USEFUL LINKS</div>
                                <div class="content-widget">
                                    <div class="useful-link-list">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-6">
                                                <ul class="list-unstyled">
                                                    <li><i class="fa fa-angle-right"></i><a href="/">Home</a></li>
                                                    <li><i class="fa fa-angle-right"></i><a href="/about">About</a></li>
                                                    <li><i class="fa fa-angle-right"></i><a href="/contact">Contact</a></li>
                                                    <li><i class="fa fa-angle-right"></i><a href="/select">Attempt CBT Test</a></li>
                                                    {{--<li><i class="fa fa-angle-right"></i><a href="#">Why Edugate</a></li>--}}
                                                    {{--<li><i class="fa fa-angle-right"></i><a href="#">Social Media</a></li>--}}
                                                    {{--<li><i class="fa fa-angle-right"></i><a href="#">Site Map</a></li>--}}
                                                </ul>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6">
                                                <ul class="list-unstyled">
                                                    <li><i class="fa fa-angle-right"></i><a href="/testimony">Share Your Testimony here</a></li>
                                                    <li><i class="fa fa-angle-right"></i><a href="/suggestion">Submit A Suggestion</a></li>
                                                    <li><i class="fa fa-angle-right"></i><a href="/faq">FAQ</a></li>
                                                    {{--<li><i class="fa fa-angle-right"></i><a href="#">Blog Post</a></li>--}}
                                                    {{--<li><i class="fa fa-angle-right"></i><a href="#">Help Topic</a></li>--}}
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        {{--<div class="col-md-3 col-sm-6 col-xs-6 sd380">--}}
                            {{--<div class="gallery-widget widget">--}}
                                {{--<div class="title-widget">GALLERY</div>--}}
                                {{--<div class="content-widget">--}}
                                    {{--<div class="gallery-list"><a href="#" class="thumb"><img src="assets/images/gallery/gallery-01.jpg" alt="" class="img-responsive"/></a><a href="#" class="thumb"><img src="assets/images/gallery/gallery-02.jpg" alt="" class="img-responsive"/></a><a href="#" class="thumb"><img src="assets/images/gallery/gallery-03.jpg" alt="" class="img-responsive"/></a><a href="#" class="thumb"><img src="assets/images/gallery/gallery-04.jpg" alt="" class="img-responsive"/></a><a href="#" class="thumb"><img src="assets/images/gallery/gallery-05.jpg" alt="" class="img-responsive"/></a><a href="#" class="thumb"><img src="assets/images/gallery/gallery-06.jpg" alt="" class="img-responsive"/></a><a href="#" class="thumb"><img src="assets/images/gallery/gallery-07.jpg" alt="" class="img-responsive"/></a><a href="#" class="thumb"><img src="assets/images/gallery/gallery-08.jpg" alt="" class="img-responsive"/></a></div>--}}
                                    {{--<div class="clearfix"></div>--}}
                                    {{--<a href="#" class="view-more">View more&nbsp;<i class="fa fa-angle-double-right mls"></i></a></div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        <div class="col-md-4 col-sm-6 col-xs-6 sd380">
                            <div class="mailing-widget widget">
                                <div class="title-widget">MAILING</div>
                                @if(Session::has('mailing'))
                                    <div style="text-align: center; font-size: 14px;"
                                         class="alert alert-success alert-dismissable" ><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>{{Session('mailing')}}<span class="fa fa-check"></span></div>
                                @endif
                                @include('partial.admin.error')
                                <div class="content-wiget"><p>Sign up for our news letter.</p>

                                    {!! Form::open(['method'=>'POST','action'=>'MailingController@store']) !!}
                                    {{  csrf_field() }}
                                        <div class="input-group">
                                            <input type="text" name="email" placeholder="Email address" class="form-control form-email-widget"/><span class="input-group-btn"><input type="submit" value="✓" class="btn btn-email"/></span></div>
                                    {!! Form::close() !!}
                                    <p>We respect your privacy.</p>

                                    <div class="socials">
                                        <a href="https://facebook.com/sol4ng" target="_blank" class="facebook"><i class="fa fa-facebook"></i></a>
                                        <a href="/https://plus.google.com/communities/115896551858053813824" class="google" target="_blank"><i class="fa fa-google-plus"></i></a>
                                        <a href="https://mobile.twitter.com/solng_official" class="twitter" target="_blank"><i class="fa fa-twitter"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hyperlink">
                <div class="pull-left hyper-left">
                    <ul class="list-inline">
                        <li><a href="/">HOME</a></li>
                        {{--<li><a href="/contact">CONTACT</a></li>--}}
                        <li><a href="/about">ABOUT</a></li>
                        <li><a href="/testimony">TESTIMONY</a></li>
                        <li><a href="/suggestion">SUBMIT A SUGGESTION</a></li>
                        <li><a href="/contact">CONTACT</a></li>
                        <li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
                        @if(Auth::check())
                        <li><a href="/profile"> {{Auth::user()->name}}</a></li>
                        <li><a href="/logout">LOG OUT NOW</a></li>
                        @endif
                    </ul>
                </div>
                <div class="pull-right hyper-right">All Right Reserved &copy; sol.ng 2017</div>
            </div>
        </div>
    </div>
</footer>
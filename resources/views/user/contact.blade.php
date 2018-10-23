@extends('layouts.user-master')

@section('title', 'Get to us we will always respond')

@section('description', 'Get in torch with sol.ng')
@section('keywords', 'Contact sol.ng, sol, solng ,past, past question and answer')

@section('content')



    <div class="content">
        <div class="section background-opacity page-title set-height-top">
            <div class="container">
                <div class="page-title-wrapper"><!--.page-title-content--><h2 class="captions">Contact</h2>
                    <ol class="breadcrumb">
                        <li><a href="/">Home</a></li>
                        <li class="active"><a href="#">Contact</a></li>
                    </ol>
                </div>
            </div>
        </div>
        @if(Session::has('status'))
            <div style="text-align: center; font-size: 20px;"
                 class="alert alert-success alert-dismissable" ><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>{{Session('status')}}<span class="fa fa-check"></span></div>
    @endif
    <!-- <div class="section nav-subscribe">
        <div class="container">
            <div class="nav-subscribe-wrapper">
                <div class="nav-subscribe-left"><p class="subscribe-text">Subscribe <b class="focus">Edugate</b> to learn new creative skill</p></div>
                <div class="nav-subscribe-right">
                    <button class="btn btn-green btn-bold"><span>SUBSCRIBE NOW</span></button>
                </div>
            </div>
        </div>
    </div> -->
        <div class="section section-padding contact-main">
            <div class="container">
                <div class="contact-main-wrapper">
                    <div class="row contact-method">
                        <div class="col-md-4">
                            <div class="method-item"><i class="fa fa-map-marker"></i>

                                <p class="sub">COME TO</p>

                                <div class="detail"><p>Adenike, Ogbomosho</p>

                                    <p>Nigeria</p></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="method-item"><i class="fa fa-phone"></i>

                                <p class="sub">CALL TO</p>

                                <div class="detail"><p>Local:  +2348064978778 Ajani Opeyemi</p>

                                    <p>Mobile: +2348102111311-Adewale Hammed</p>

                                    <p>Mobile: +2347033125339-Ewuola Idris</p></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="method-item"><i class="fa fa-dribbble"></i>

                                <p class="sub">CONNECT TO</p>

                                <div class="detail">

                                    <p><h5>info@sol.ng</h5></p>
                                    <div class="row">
                                        <div class="col-md-4 col-sm-4"><a href="https://facebook.com/sol4ng" class="facebook" target="_blank"><i class="fa fa-facebook"></i></a></div>
                                        <div class="col-md-4 col-sm-4"><a href="https://plus.google.com/communities/115896551858053813824" class="google" target="_blank"> <i class="fa fa-google-plus"> </i> </a></div>
                                        <div class="col-md-4 col-sm-4"><a href="https://mobile.twitter.com/solng_official" class="twitter" target="_blank"> <i class="fa fa-twitter"> </i></a></div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    @include('partial.admin.error')
                    {{--<form class="bg-w-form contact-form">--}}
                    {!! Form::open(['method'=>'POST','action'=>'ContactController@store', 'class'=>'bg-w-form contact-form']) !!}
                    {{  csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group"><label class="control-label form-label">NAME <span class="highlight">*</span></label>
                                <input type="text" placeholder="" name="name" class="form-control form-input"/><!--label.control-label.form-label.warning-label(for="") Warning for the above !--></div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"><label class="control-label form-label">EMAIL <span class="highlight">*</span></label>
                                <input type="text" placeholder="" name="email" class="form-control form-input"/><!--label.control-label.form-label.warning-label(for="")--></div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"><label class="control-label form-label">PURPOSE</label>
                                <select name="purpose" class="form-control form-input">
                                    <option value="">Please Select</option>
                                    <option value="0">About Question And Answer</option>
                                    <option value="1">About CBT</option>
                                    <option value="2">About User Experience</option>
                                </select><!--label.control-label.form-label.warning-label(for="", hidden)--></div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"><label class="control-label form-label">SUBJECT</label>
                                <input type="text" placeholder="" name="subject" class="form-control form-input"/><!--label.control-label.form-label.warning-label(for="", hidden)--></div>
                        </div>
                        <div class="col-md-12">
                            <div class="contact-question form-group"><label class="control-label form-label">HOW CAN WE HELP? <span class="highlight">*</span></label>
                                <textarea class="form-control form-input" name="body"></textarea></div>
                        </div>
                    </div>
                    <div class="contact-submit">
                        <button type="submit" class="btn btn-contact btn-green"><span> CONTACT US</span></button>
                    </div>
                    {!! Form::close() !!}
                    {{--</form>--}}
                </div>
            </div>
        </div>
        <div id="map" class="section contact-map"></div>
    </div>
    <!-- BUTTON BACK TO TOP-->
    <div id="back-top"><a href="#top"><i class="fa fa-angle-double-up"></i></a></div>

    <!-- THEME SETTING-->
    <div class="theme-setting">
        <div class="theme-loading">
            <div class="theme-loading-content">
                <div class="dots-loader"></div>
            </div>
        </div>
        <a href="javascript:;" class="btn-theme-setting"><i class="fa fa-tint"></i></a>

        <div class="content-theme-setting"><h2 class="title">setting color</h2>
            <ul class="list-unstyled list-inline color-skins">
                <li data-color="color-1"></li>
                <li data-color="color-2"></li>
                <li data-color="color-3"></li>
                <li data-color="color-4"></li>
                <li data-color="color-5"></li>
                <li data-color="color-6"></li>
                <li data-color="color-7"></li>
                <li data-color="color-8"></li>
                <li data-color="color-9"></li>
                <li data-color="color-10"></li>
            </ul>
        </div>
    </div>
    <!-- LOADING--><!-- JAVASCRIPT LIBS-->
    <script>if ((Cookies.get('color-skin') != undefined) && (Cookies.get('color-skin') != 'color-1')) {
            $('.logo .header-logo img').attr('src', 'assets/images/logo-' + Cookies.get('color-skin') + '.png');
        } else if ((Cookies.get('color-skin') == undefined) || (Cookies.get('color-skin') == 'color-1')) {
            $('.logo .header-logo img').attr('src', 'assets/images/logo-color-1.png');
        }</script>
    <script src="assets/libs/bootstrap-3.3.5/js/bootstrap.min.js"></script>
    <script src="assets/libs/smooth-scroll/jquery-smoothscroll.js"></script>
    <script src="assets/libs/owl-carousel-2.0/owl.carousel.min.js"></script>
    <script src="assets/libs/appear/jquery.appear.js"></script>
    <script src="assets/libs/count-to/jquery.countTo.js"></script>
    <script src="assets/libs/wow-js/wow.min.js"></script>
    <script src="assets/libs/selectbox/js/jquery.selectbox-0.2.min.js"></script>
    <script src="assets/libs/fancybox/js/jquery.fancybox.js"></script>
    <script src="assets/libs/fancybox/js/jquery.fancybox-buttons.js"></script>
    <!-- MAIN JS-->
    <script src="assets/js/main.js"></script>
    <!-- LOADING SCRIPTS FOR PAGE-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAu6tm60TzeUo9rWpLnrQ7mrFn4JPMVje4&amp;amp;sensor=false"></script>
    <script src="assets/js/pages/contact.js"></script>

@endsection
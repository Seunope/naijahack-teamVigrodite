@extends('layouts.user-master')

@section('title', 'Share your testimony')

@section('content')



    <div class="content">
        <div class="section background-opacity page-title set-height-top">
            <div class="container">
                <div class="page-title-wrapper"><!--.page-title-content--><h2 class="captions">Testimony</h2>
                    <ol class="breadcrumb">
                        <li><a href="/">Home</a></li>
                        <li class="active"><a href="#">Testimony</a></li>
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
                    {{--<form class="bg-w-form contact-form">--}}
                    <h4 style="text-align: center">Share Your Testimony</h4>

                    @include('partial.admin.error')

                    {!! Form::open(['method'=>'POST','action'=>'TestimonyController@store', 'class'=>'bg-w-form contact-form', 'files'=>true]) !!}
                    {{  csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group"><label class="control-label form-label">NAME <span class="highlight">*</span></label>
                                <input type="text" placeholder="" name="name" class="form-control form-input"/><!--label.control-label.form-label.warning-label(for="") Warning for the above !-->
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"><label class="control-label form-label">EMAIL <span class="highlight">*</span></label>
                                <input type="text" placeholder="" name="email" class="form-control form-input"/><!--label.control-label.form-label.warning-label(for="")-->
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="contact-question form-group"><label class="control-label form-label">FEEL FREE TO SHARE YOUR TESTIMONY? <span class="highlight">*</span></label>
                                <textarea class="form-control form-input" name="body"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="contact-question form-group"><label class="control-label form-label">A photo of you <span class="highlight">*</span></label>
                                <input type="file" name="file"/>
                            </div>
                        </div>
                    </div>
                    <div class="contact-submit">
                        <button type="submit" class="btn btn-contact btn-green"><span>SUBMIT TESTIMONY</span></button>
                    </div>
                    {!! Form::close() !!}
                    {{--</form>--}}
                </div>
            </div>
        </div>
        <div id="map" class="section contact-map"></div>
    </div>

@endsection
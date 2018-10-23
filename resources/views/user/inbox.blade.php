@extends('layouts.user-master')

@section('title', 'Pick one or more course to solve past questions on')

@section('content')



    <div class="content">
        @if(Session::has('status'))
            <div style="text-align: center; font-size: 20px;"
                 class="alert alert-success alert-dismissable" >
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>{{Session('status')}}<span class="fa fa-check"></span></div>
    @endif
        <div class="section section-padding contact-main">
            <div class="container">
                <div class="contact-main-wrapper">
                    {{--<form class="bg-w-form contact-form">--}}
                    <h4 style="text-align: center">It doesn't mather the number of questions you can solve. Someone is going to appreciate it</h4>
                    @include('partial.admin.error')
                    {!! Form::open(['method'=>'POST','action'=>'SuggestionController@store', 'class'=>'bg-w-form contact-form']) !!}
                    {{  csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group"><label class="control-label form-label">NAME <span class="highlight">*</span></label>
                                <input type="text" placeholder="" name="" class="form-control form-input"/><!--label.control-label.form-label.warning-label(for="") Warning for the above !-->
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"><label class="control-label form-label">THE COURSE OR COURSES YOU WANTED TO HANDLE <span class="highlight">*</span></label>
                                <input type="text" placeholder="" name="course" class="form-control form-input"/><!--label.control-label.form-label.warning-label(for="")-->
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="contact-question form-group"><label class="control-label form-label">Message (optional)  </label>
                                <input type="text" placeholder="I Ajani Adewale, i want to handle GNS 208 and solve some questions i know on it.. My email is ajaniade@gmail.com" class="form-control form-input" name="body" required/>
                            </div>
                        </div>
                    </div>
                    <div class="contact-submit">
                        <button type="submit" class="btn btn-contact btn-green"><span class="fa fa-send">SEND MAIL</span></button>
                    </div>
                    {!! Form::close() !!}
                    {{--</form>--}}
                </div>
            </div>
        </div>
        <div id="map" class="section contact-map"></div>
    </div>


@endsection
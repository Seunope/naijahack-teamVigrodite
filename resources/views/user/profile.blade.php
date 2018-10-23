@extends('layouts.user-master-profile')

@section('title', 'My profile - '.Auth::user()->name)

@section('content')


    <link rel="stylesheet" type="text/css" href="{{URL('assets/css/bundle.core.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{URL('assets/css/bundle.thread.css')}}" />
    <div class="profile-bg">

    </div>
    <div class="row">
        <div class="col-md-3 col-xs-1"></div>
        <div class="col-md-6 col-xs-10" style="padding-left: 0; padding-right: 0">
            <div class="staff-item customize small-padding" style="background-color: #86bc42;cursor: default;text-align: center;color: white;">
                <div class="staff-item-wrapper">
                    <div class="row" style="padding-top: 20px;">
                        <div class="" >
                            @if(isset(Auth::user()->path[15]))
                                <img src="{{Auth::user()->path}}" alt="" class="img-responsive img-circle img-class"/>
                            @else
                                <img src="{{ url('User_images/avatar3.jpg') }}" alt="" class="img-responsive img-circle img-class"/>
                            @endif
                        </div>
                        <div class="">
                            <p class="staff-name">{{Auth::user()->name}}</p>
                            <p class="staff-job">{{Auth::user()->email}}</p>
                            <p class="staff-desctiption">
                                A student of {{Auth::user()->school->full_name}}. @if(isset(Auth::user()->department)) Department of {{Auth::user()->department->full_name}} @else No department yet @endif
                            </p>
                        </div>
                        <div class="profile-edit">
                            <a href="/"><span class="fa fa-home"></span>Home</a> |
                            <a href="/edit-profile"><span class="fa fa-pencil"></span> Edit profile</a>
                        </div>
                    </div>
                </div>
                {{--<div class="staff-socials"><a href="#" class="facebook"><i class="fa fa-facebook"></i></a><a href="#" class="google"><i class="fa fa-google-plus"></i></a><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></div>--}}
            </div>
        </div>
        <div class="col-md-3 col-xs-1"></div>
    </div>
    @if(Auth::check())
        <div class="row margin-top">
            <div class="col-md-3 col-xs-1 col-sm-2"></div>
            <div class="course-price-widget widget col-sm-5 col-md-3 col-xs-10 sd380 box-shadow">
                <div class="content-widget">
                    <div class="course-price-widget-wrapper">
                        <div class="row">
                            <div class="col-md-12 info-row col-sm-12 col-xs-12">
                                <div class="pull-left title">School:</div>
                                <div class="pull-right level">{{Auth::user()->school->name}}</div>
                            </div>
                            <div class="col-md-12 info-row col-sm-12 col-xs-12">
                                <div class="pull-left title">Level:</div>
                                <div class="pull-right level">{{Auth::user()->level->name}}</div>
                            </div>
                            @if(Auth::user()->role->id<5)
                                <div class="col-md-12 info-row col-sm-12 col-xs-12">
                                    <div class="pull-left title">Role:</div>
                                    <div class="pull-right level">{{Auth::user()->role->title}}</div>
                                </div>
                            @endif
                            <div class="col-md-12 info-row col-sm-12 col-xs-12">
                                <div class="pull-left title">Department:</div>
                                <div class="pull-right level">@if(isset(Auth::user()->department)){{Auth::user()->department->name}} @else None @endif</div>
                            </div>
                            <div class="col-md-12 info-row col-sm-12 col-xs-12">
                                <div class="pull-left title">Questions uploaded:</div>
                                <div class="pull-right level">{{count(Auth::user()->questions)}}</div>
                            </div>
                            <div class="col-md-12 info-row col-sm-12 col-xs-12">
                                <div class="pull-left title">Questions answered:</div>
                                <div class="pull-right level">{{count(Auth::user()->solutions)}}</div>
                            </div>
                            <div class="col-md-12 info-row col-sm-12 col-xs-12">
                                <div class="pull-left title">Comments made:</div>
                                <div class="pull-right level">{{count(Auth::user()->comments)}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-1 col-sm-2"></div>
            <div class="col-md-3 col-xs-1col-sm-2 "></div>
            <div class="course-price-widget widget col-sm-5 col-md-3 col-xs-10 sd380 box-shadow">
                <div class="content-widget">
                    <div class="course-price-widget-wrapper">
                        <div class="row">
                            <div class="col-md-12 info-row col-sm-12 col-xs-12">
                                <div class="pull-left title">Phone:</div>
                                <div class="pull-right level">{{Auth::user()->phone? Auth::user()->phone->number : "Nill"}}</div>
                            </div>
                            <div class="col-md-12 info-row col-sm-12 col-xs-12">
                                <div class="pull-left title">Active:</div>
                                <div class="pull-right level">{{Auth::user()->visibility ? 'Yes' : 'No'}}</div>
                            </div>
                            <div class="col-md-12 info-row col-sm-12 col-xs-12">
                                <div class="pull-left title">Remaining Coin:</div>
                                <div title="Rated 3.00 out of 5" class="pull-right level">{{Auth::user()->credit? Auth::user()->credit->value : "Nill"}}
                                    <img src="/assets/images/coins2.png" class="" width="30%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-1 col-sm-2"></div>
        </div>
    @endif
@endsection
@extends('layouts.user-master-profile')

@section('title', $user->name.'`s profile')

@section('description', 'See '.$user->name.'`s profile on sol.ng')
@section('keywords', $user->name)

@section('content')


    <link rel="stylesheet" type="text/css" href="{{URL('assets/css/bundle.core.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{URL('assets/css/bundle.thread.css')}}" />
    <div class="profile-bg">

    </div>
    <div class="row">
        <div class="col-md-3 col-xs-1"></div>
        <div class="col-md-6 col-xs-10">
            <div class="staff-item customize small-padding" style="background-color: #86bc42;cursor: default;text-align: center;color: white;">
                <div class="staff-item-wrapper">
                    <div class="row" style="padding-top: 20px;">
                        <div class="" >
                            @if(isset($user->path[15]))
                                <img src="{{$user->path}}" alt="" class="img-responsive img-circle img-class"/>
                            @else
                                <img src="{{ url('User_images/avatar3.jpg') }}" alt="" class="img-responsive img-circle img-class"/>
                            @endif
                        </div>
                        <div class="">
                            <p class="staff-name">{{$user->name}}</p>
                            <p class="staff-job">{{$user->email}}</p>
                            <p class="staff-desctiption">
                                A student of {{$user->school->full_name}}. @if(isset($user->department)) Department of {{$user->department->full_name}} @else No department yet @endif
                            </p>
                        </div>
                        <div class="profile-edit">
                            <a href="/"><span class="fa fa-home"></span>Home</a>
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
                                <div class="pull-right level">{{$user->school->name}}</div>
                            </div>
                            <div class="col-md-12 info-row col-sm-12 col-xs-12">
                                <div class="pull-left title">Level:</div>
                                <div class="pull-right level">{{$user->level->name}}</div>
                            </div>
                            <div class="col-md-12 info-row col-sm-12 col-xs-12">
                                <div class="pull-left title">No of Questions uploaded:</div>
                                <div class="pull-right level">{{count($user->questions)}}</div>
                            </div>
                            <div class="col-md-12 info-row col-sm-12 col-xs-12">
                                <div class="pull-left title">No of Questions answered:</div>
                                <div class="pull-right level">{{count($user->solutions)}}</div>
                            </div>
                            <div class="col-md-12 info-row col-sm-12 col-xs-12">
                                <div class="pull-left title">No of contributions made by comment:</div>
                                <div class="pull-right level">{{count($user->comments)}}</div>
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
                                <div class="pull-right level">{{"Hidden"}}</div>
                                {{--<div class="pull-right level">{{$user->phone? $user->phone->number : "Nill"}}</div>--}}
                            </div>
                            <div class="col-md-12 info-row col-sm-12 col-xs-12">
                                <div class="pull-left title">Department:</div>
                                <div class="pull-right level">@if(isset($user->department)){{$user->department->name}} @else None @endif</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-1 col-sm-2"></div>
        </div>
    @endif
@endsection
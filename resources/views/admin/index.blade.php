@extends('layouts.admin-master')

@section('title', 'Management')

@section('content')


    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1>Dashboard <small>Admin Dashboard</small></h1>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    Welcome to the admin dashboard! Feel free to upload question and answers.
                    <br />
                    If there is anything you don't understand feel free to inbox "info@sol.ng".
                </div>
            </div>
        </div>
        <div class="row">
            @if(Auth::user()->role_id<3)
            <div class="col-lg-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-clock-o"></i>Alerts</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row alert-success">
                            <div class="col-xs-5">
                                <i class="fa fa-thumbs-o-up fa-5x"></i>
                            </div>
                            <div class="col-xs-5 text-right">
                                <p class="alerts-heading">{{$nou or '-'}}</p>
                                <p class="alerts-text">Registrations</p>
                            </div>
                        </div>
                        <div class="row alert-success">
                            <div class="col-xs-5">
                                <i class="fa fa-thumbs-o-up fa-5x"></i>
                            </div>
                            <div class="col-xs-5 text-right">
                                <p class="alerts-heading">{{$noq or '-'}}</p>
                                <p class="alerts-text">Total question uploaded</p>
                            </div>
                        </div>
                        <div class="row alert-success">
                            <div class="col-xs-5">
                                <i class="fa fa-thumbs-o-up fa-5x"></i>
                            </div>
                            <div class="col-xs-5 text-right">
                                <p class="alerts-heading">{{$noq or '-'}}</p>
                                <p class="alerts-text">Total question solved</p>
                            </div>
                        </div>
                        {{--<div class="row alert-danger">--}}
                            {{--<div class="col-xs-5">--}}
                                {{--<i class="fa fa-thumbs-o-down fa-5x"></i>--}}
                            {{--</div>--}}
                            {{--<div class="col-xs-5 text-right">--}}
                                {{--<p class="alerts-heading">4</p>--}}
                                {{--<p class="alerts-text">Errors</p>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        <div class="row alert-success">
                            <div class="col-xs-5">
                                <i class="fa fa-thumbs-o-up fa-5x"></i>
                            </div>
                            <div class="col-xs-5 text-right">
                                <p class="alerts-heading">{{$noc or ''}}</p>
                                <p class="alerts-text">Total discussions made</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <div class="col-lg-9">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Admin Stats</h3>
                    </div>
                    <div class="panel-body">
                        <div id="shieldui-chart1">
                            <table class="table table-bordered table-striped">
                                <tbody>
                                    <tr>
                                        <th>No of Questions uploaded</th>
                                        <td>{{count(Auth::user()->questions)}}</td>
                                    </tr>
                                    <tr>
                                        <th>No of Question solved</th>
                                        <td>{{count(Auth::user()->questions)}}</td>
                                    </tr>
                                    <tr>
                                        <th>No of Discussion made</th>
                                        <td>{{count(Auth::user()->comments)}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
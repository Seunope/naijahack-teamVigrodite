@extends('layouts.admin-master')

@section('title', 'Admin users-'.$user->name)

@section('content')

    <div id="page-wrapper">
        <h3 class="panel-title text-center">
            @if(isset($user->path[4]))
                <img src="{{$user->path or ''}}" alt="" class="img-responsive" style="width: 180px; height: 180px;"/>
            @else
                <img src="/User_images/avatar3.jpg" alt="" class="img-responsive"/>
            @endif
            <i class="fa fa-star"></i> {{$user->name or 'N/A'}} </h3>
        <div class="panel panel-primary"></div>
        @if(Session::has('status'))
            <div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>{!! Session('status')!!} <span class="fa fa-check"></span></div>
        @endif
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h5>Student's name: <i>{{$user->name or 'N/A'}}</i></h5>
                <hr>
                <h5>School: <i>{{$user->school->name or 'N/A'}}</i></h5>
                <hr>
                <h5>Department: <i>{{$user->department->name or 'N/A'}}</i></h5>
                <hr>
                <h5>Cell number: <i>{{$user->phone->number or 'N/A'}}</i></h5>
                <hr>
                <h5>Role: <i>{{$user->role->title or 'N/A'}}</i></h5>
                <hr>
                <h5>Remaining Coin: <i>{{$user->credit->value or 'N/A'}} <img src="/assets/images/coins2.png" style="width: 20px"></i></h5>
                <hr>
                <h5>Visibility:
                    {!! Form::open(['method'=>'POST','action'=>'AdminUsersController@visibility']) !!}
                        {!! Form::hidden('slug', $user->slug ,null,['class'=>'form-control']) !!}
                        <button class="btn btn-link">
                            @if($user->visibility == 1)
                                <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                            @else
                                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                            @endif
                        </button>
                    {!! Form::close() !!}
                </h5>
                <hr>
                <h5>Joined: <i>{{$user->created_at->diffForHumans()}}</i></h5>
                <hr>

                <div class="panel panel-primary"></div>
            </div>
            <div class="col-md-3"></div>
            <div class="show-paginate">
            </div>
        </div>
        <div style="text-align: center;">
            @if(isset($user->credit))
                    {!! Form::open(['method'=>'POST','action'=>'AdminUsersController@credit']) !!}
                    {!! Form::hidden('slug', $user->credit->slug ,null,['class'=>'form-control']) !!}
                    {!! Form::hidden('value', 20 ,null,['class'=>'form-control']) !!}
                    <button class="btn btn-info">Recharge 20 coin <img src="/assets/images/coins2.png" style="width: 20px"></button>
                    {!! Form::close() !!}
                    <br>
                    {!! Form::open(['method'=>'POST','action'=>'AdminUsersController@credit']) !!}

                    {!! Form::hidden('slug', $user->credit->slug ,null,['class'=>'form-control']) !!}
                    {!! Form::hidden('value', 50 ,null,['class'=>'form-control']) !!}
                    <button class="btn btn-info">Recharge with 50 coin<img src="/assets/images/coins2.png" style="width: 20px"></button>
                    {!! Form::close() !!}
            @endif
                <br>
        </div>
    </div>




@endsection

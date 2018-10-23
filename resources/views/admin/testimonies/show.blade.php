@extends('layouts.admin-master')

@section('title', $testimony->name.'`s testimony')

@section('content')

    <div id="page-wrapper">
        <h3 class="panel-title text-center">
            @if(isset($testimony->path[4]))
                <img src="{{$testimony->path or ''}}" alt="" class="img-responsive" style="width: 180px; height: 180px;"/>
            @else
                <img src="/User_images/avatar3.jpg" alt="" class="img-responsive"/>
            @endif
            <i class="fa fa-star"></i> {{$testimony->name or 'N/A'}} </h3>
        <div class="panel panel-primary"></div>
        @if(Session::has('status'))
            <div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>{!! Session('status')!!} <span class="fa fa-check"></span></div>
        @endif
        <div class="row">
            <h5>Says:<br> <i>"{{$testimony->body or 'N/A'}}"</i></h5>
            <div class="panel panel-primary"></div>
            <h6>email: <i>{{$testimony->email or 'N/A'}}</i>
                {!! Form::open(['method'=>'PATCH','action'=>['TestimonyController@update',$testimony->slug]]) !!}
                Visibility:
                <button class="btn btn-link">
                    @if($testimony->visibility == 1)
                        <span class="glyphicon glyphicon-eye-open" aria-hidden="true"> Showing</span>
                    @else
                        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"> Hidden</span>
                    @endif
                </button>
                {!! Form::close() !!}
                Written: <i>{{$testimony->created_at->diffForHumans()}}</i></h6>
        </div>
    </div>




@endsection

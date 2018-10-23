@extends('layouts.admin-master')

@section('title', $suggestion->name.'`s suggestion')

@section('content')

    <div id="page-wrapper">
        <h3 class="panel-title text-center">
            <i class="fa fa-star"></i> {{$suggestion->name or 'N/A'}} </h3>
        <div class="panel panel-primary"></div>
        @if(Session::has('status'))
            <div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>{!! Session('status')!!} <span class="fa fa-check"></span></div>
        @endif
        <div class="row">
            <h5>Says:<br> <i>"{{$suggestion->body or 'N/A'}}"</i></h5>
            <div class="panel panel-primary"></div>
            <h6>email: <i>{{$suggestion->email or 'N/A'}}</i>
                Written: <i>{{$suggestion->created_at->diffForHumans()}}</i></h6>
        </div>
    </div>




@endsection

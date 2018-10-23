@extends('layouts.user-master')

@section('title', ' Review page')

@section('content')

    <div class="section">
        <div class="search-input">
            <div class="container">
                @if(Session::has('warning'))
                    <div class="alert alert-warning">{{Session('warning')}}<span class="fa fa-check"></span></div>
                @endif
                <div style="text-align: center;">
                    <h4>Your test has ended!</h4>
                    <h3>You scored {{$score}} over {{$overAll}}</h3>
                    <h4>Want Review?</h4>
                </div>
                <div class="search-input-wrapper">
                    {!! Form::open(['method'=>'get','action'=>'TestController@review']) !!}
                    <div class="form-group">
                        <button type="submit" class="form-submit btn btn-blue">Review</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>


@endsection
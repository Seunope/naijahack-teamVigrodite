@extends('layouts.user-master')

@section('title', ' select the course your want to offer')

@section('content')
    <style>
        label { color: white; }
        select { margin-bottom: 10px;  }
    </style>
    <div class="section">
        <div class="search-input">
            <div class="container">
                <br>
                @if(Session::has('warning'))
                    <div class="alert alert-warning">
                        {{Session('warning')}}<span class="fa fa-check"></span></div>
                @endif
                <div class="text-center">
                    <span style="color: white; font-weight: bold; font-size: 23px;">CHOOSE A COURSE (FREE TEST).</span>
                </div>
                <div class="">
                    {!! Form::open(['method'=>'POST','action'=>'TestController@test']) !!}
                    <div class="form-group">
                        {!! Form::label('courseSlug', 'Choose course') !!}
                        {!! Form::select('courseSlug', $courses ,null,['class'=>'form-select']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('yearSlug', 'Choose Year') !!}
                        {!! Form::select('yearSlug', $years ,0,['class'=>'form-select', 'disabled']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('number', 'Choose number of Questions') !!}
                        {!! Form::select('number', $numbers ,null,['class'=>'form-select']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('time', 'Choose duration') !!}
                        {!! Form::select('time', $time ,null,['class'=>'form-select']) !!}
                    </div>
                    <div class="form-group">
                        <div class="modal fade" id="startModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog smlr" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h4 class="modal-title pull-center" id="myModalLabel">The test is about to start. Are you ready?</h4>
                                    </div>
                                    <div class="modal-footer">
                                        {!! Form::submit('Yes' ,['class'=>'']) !!}
                                        {!! Form::button('No',['class'=>'btn btn-danger', 'data-dismiss'=>'modal']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="form-submit btn btn-blue" data-toggle="modal" data-target="#startModal" style="width: 100%">Start test</button>
                        <div class="alert alert-danger" style="margin-top: 20px"><span>Chrome browser is recommended for best performance. Esp. timing.</span></div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>


@endsection
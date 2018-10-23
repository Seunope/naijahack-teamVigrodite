@extends('layouts.admin-master')

@section('title', 'Admin question image edit')

@section('content')

    @if(isset($imageA))
        <div id="page-wrapper">
            <h3>Modify Image</h3>
            <div class="panel panel-primary"></div>
            @if(Session::has('status'))
                <div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>{{Session('status')}}<span class="fa fa-check"></span></div>
            @endif
            <h4 class="modal-title" id="myModalLabel">Edit image</h4>
            <br>
            <div class="row">
                <div class=" @if($imageA->size ==1) col-md-4 col-sm-4 col-xs-4 @elseif($imageA->size ==2) col-sm-6 col-md-6 col-xs-6 @else col-md-12 col-sm-12 col-xs-12 @endif">
                    <img src="{{$imageA->path or ''}}" alt="{{$imageA->label or ''}}" class="question_image"  title="{{$imageA->label or ''}}" >
                </div>
            </div>
        </div>
        <div class="modal-body">
            <div class="row">
                {!! Form::model($imageA,['method'=>'PATCH','action'=>['ImageAsController@update',$imageA->slug]]) !!}
                {{ csrf_field() }}
                <div class="form-group col-md-8">
                    {!! Form::label('label', 'Image Label') !!}
                    {!! Form::text('label',null,['class'=>'form-control', 'required'=>'required']) !!}
                </div>
                <div class="form-group col-md-2">
                    {!! Form::label('label', 'Choose size') !!}
                    {!! Form::select('size', ['1'=>'Small','2'=>'Medium','3'=>'Big'] ,null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group col-md-2">
                    {!! Form::label('visibility', 'Visibility ') !!}
                    {!! Form::select('visibility', ['0'=>'Hide','1'=>'Show'] ,null,['class'=>'form-control']) !!}
                </div>
            </div>
            {!! Form::submit('Save',['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}


            {!! Form::open(['method'=>'DELETE','action'=>['ImageAsController@destroy', $imageA->slug]]) !!}
            {{ csrf_field() }}
            <div class="">
                {!! Form::submit('Delete',['class'=>'btn btn-link btn-start']) !!}
            </div>
            {!! Form::close() !!}

        </div>

    @else
        <div class="red">Nothing to display the image has been deleted, go back one more time and refresh.</div>
    @endif
@endsection
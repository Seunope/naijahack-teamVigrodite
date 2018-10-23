@extends('layouts.admin-master')

@section('title', 'Admin question image edit')

@section('content')

@if(isset($qimage))
    <div id="page-wrapper">
        <h3>Edit Image</h3>
        <div class="panel panel-primary"></div>
        <img src="{{$qimage->path or ''}}" alt="{{$qimage->label or ''}}" class="question_image"  title="{{$qimage->label or ''}}" >
    </div>
    <div class="modal-body">


        {{--Page title--}}
        {!! Form::model($qimage,['method'=>'PATCH','action'=>['AdminQimagesController@update',$qimage->slug]]) !!}
        {{ csrf_field() }}

        <div class="form-group">
            {!! Form::label('label', 'Image Label') !!}
            {!! Form::text('label',null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('label', 'Choose size') !!}
            {!! Form::select('size', ['1'=>'Small','2'=>'Medium','3'=>'Big'] ,null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('visibility', 'Visibility ') !!}
            {!! Form::select('visibility', ['0'=>'Hide','1'=>'Show'] ,null,['class'=>'form-control']) !!}
        </div> 
        {!! Form::submit('Save changes',['class'=>'btn btn-primary pull-right']) !!}
        {{--                                                        {!! Form::button('<i></i>',array('type'=>'submit','class'=>'glyphicon glyphicon-remove')) !!}--}}
        {!! Form::close() !!}
        
        {!! Form::open(['method'=>'DELETE','action'=>['AdminQimagesController@destroy', $qimage->slug]]) !!}
        {{ csrf_field() }}
        {!! Form::hidden('question_slug' ,$qimage->question->slug) !!}
        <button type="button" class="btn btn-link btn-sm " data-toggle="modal" data-target="#deleteModal"><i class="fa fa-remove"></i> Delete image</button>
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog smlr" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title pull-center" id="myModalLabel">Are you sure you want to delete this image?</h4>
                    </div>
                    <div class="modal-footer">
                        {!! Form::button('No ',['class'=>'btn btn-success pull-left', 'data-dismiss'=>'modal']) !!}
                        {!! Form::submit('Delete' ,['class'=>'btn btn-danger']) !!}
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}  
    </div>

@else
 <div class="red">Nothing to display the image has been deleted, go back one more time and refresh.</div>
 @endif
@endsection
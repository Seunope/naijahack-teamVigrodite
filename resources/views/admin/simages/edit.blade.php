@extends('layouts.admin-master')
@section('title', 'Admin Solutions image edit')
@section('content')
    <div id="page-wrapper">
        {{--<div class="row">--}}
        <h3>Modify Image</h3>
        <div class="panel panel-primary"></div>
        @if(isset($sfig))
            <div class="row">
                <div class=" @if($sfig->size ==1) col-md-4 col-sm-4 col-xs-4 @elseif($sfig->size ==2) col-sm-6 col-md-6 col-xs-6 @else col-md-12 col-sm-12 col-xs-12 @endif">
                    <img src="{{$sfig->path or ''}}" alt="{{$sfig->label or ''}}" class="question_image"  title="{{$sfig->label or ''}}" >
                </div>
            </div>
            <div class="row">
                {!! Form::model($sfig,['method'=>'PATCH','action'=>['AdminSimagesController@update',$sfig->slug]]) !!}
                <div class="form-group col-md-8">
                    {{ csrf_field() }}
                    {!! Form::label('label', 'Image Label') !!}
                    {!! Form::text('label',null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group col-md-2">
                    {!! Form::label('label', 'Choose size') !!}
                    {!! Form::select('size', ['1'=>'Small','2'=>'Medium','3'=>'Big'] ,null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group col-md-2">
                    {!! Form::label('visibility', 'Visibility ') !!}
                    {!! Form::select('visibility', ['0'=>'Hide','1'=>'Show'] ,null,['class'=>'form-control']) !!}
                </div>
                {!! Form::hidden('question_slug', $sfig->solution->question->slug) !!}
            </div>
            <div class="modal-footer">

                {!! Form::submit('Save changes',['class'=>'btn btn-primary']) !!}
                {!! Form::close() !!}

                {!! Form::open(['method'=>'DELETE','action'=>['AdminSimagesController@destroy', $sfig->slug]]) !!}
                {!! Form::hidden('question_slug', $sfig->solution->question->slug) !!}
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

    </div>

    @else
        <div class="red">
            The image has been deleted, pls go back one more time and refresh..
        </div>
    @endif
@endsection
@extends('layouts.user-master')

@section('title', ' Edit Question Image')

@section('content')

    <!-- content inside wrapper begins -->
    <div class="section section-padding news-detail small-padding">
        <div class="container">
            <div class="news-detail-wrapper">
                <div class="row">
                    <div class="col-md-9 col-sm-12">

                        <div class="">Modify Question's Image </div>
                        <h4 class="modal-title" id="myModalLabel">Edit image</h4>
                        <br>
                        <img src="{{$cimage->path or ''}}" alt="{{$cimage->label or ''}}" class="question-image"  title="{{$cimage->label or ''}}" >



                        {{--Page title--}}
                        {!! Form::model($cimage,['method'=>'PATCH','action'=>['UsersCimagesController@update',$cimage->slug]]) !!}
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
                        {!! Form::hidden('question_slug', $cimage->comment->question->slug ,null,['class'=>'form-control']) !!}

                        {!! Form::submit('Save changes',['class'=>'btn btn-primary pull-right']) !!}
                        {{--                                                        {!! Form::button('<i></i>',array('type'=>'submit','class'=>'glyphicon glyphicon-remove')) !!}--}}
                        {!! Form::close() !!}

                        {!! Form::open(['method'=>'DELETE','action'=>['UsersCimagesController@destroy', $cimage->slug]]) !!}
                        {{ csrf_field() }}
                        {!! Form::hidden('question_slug', $cimage->comment->question->slug ,null,['class'=>'form-control']) !!}

                        <button type="button" class="btn btn-link btn-sm" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-remove"></i> Delete image</button>
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
                    @include('partial.user.sidebar')
                </div>
            </div>
        </div>
    </div>

@endsection
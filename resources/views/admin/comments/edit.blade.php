@extends('layouts.admin-master')

@section('title', 'Admin edit Comment')

@section('content')

@if(isset($comment))
    <div id="page-wrapper">
        <h3>Modify Comment</h3>
        <div class="panel panel-primary"></div>

        @include('partial.admin.error')
        <div class="row">
            <div class="show-head">
                {{$comment->question->course->code}}- {{$comment->question->year->name}}-Question ({{$comment->question->number}})
            </div>
            <div class="show-head">
                <h5>Question</h5>
            </div>
            <div class="show-text">
                <h6>{!!$comment->question->body!!}</h6>
            </div>
            {!! Form::model($comment,['method'=>'PATCH','action'=>['AdminCommentsController@update',$comment->slug]]) !!}
            {{ csrf_field() }}

            <div class="form-group">
                {!! Form::label('body', 'Edit Answer') !!}
                {!! Form::textarea('body',null,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Save changes',['class'=>'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}

            {!! Form::open(['method'=>'DELETE','action'=>['AdminCommentsController@destroy', $comment->slug]]) !!}
                {!! Form::hidden('slug', $comment->question->slug ,null,['class'=>'form-control']) !!}
            <button type="button" class="btn btn-link btn-sm" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-remove"></i> Delete comment</button>
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog smlr" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title pull-center" id="myModalLabel">Are you sure you want to delete this comment?</h4>
                        </div>
                        <div class="modal-footer">
                            {!! Form::button('No ',['class'=>'btn btn-success pull-left', 'data-dismiss'=>'modal']) !!}
                            {!! Form::submit('Delete' ,['class'=>'btn btn-danger']) !!}
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
            {{--<textarea name="ff" id="" class="summernote" cols="30" rows="10">{{$comment->body}}</textarea>            <div class="show-paginate">--}}
            </div>
            <!-- <a href="{{URL::to('/admin/comments')}}" class="btn btn-success btn-sm back-button"><i class="fa fa-arrow-left"></i> Back</a> -->
        </div>
    @else
    <div class="red">
        The Content has been deleted please, go back one more time.
    </div>
    @endif
@endsection
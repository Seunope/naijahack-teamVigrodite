@extends('layouts.admin-master-edit')

@section('title', 'Admin question edit-'.$question->number)

@section('private-head')
    <script>
        tinymce.init({
            selector:'#question_body',
            menubar : false,
            toolbar: 'undo redo tiny_mce_wiris_formulaEditor tiny_mce_wiris_formulaEditorChemistry table fontselect styleselect',
            plugins: "tiny_mce_wiris",
            height: "150",
            width: "700"
        });
        function create() {
            var question_text = $("iframe#question_body_ifr").contents().find("body").html();
            $("#question_text").html(question_text);
            $("#question_form").submit();
        }
    </script>
@endsection

@section('content')


    <div id="page-wrapper">

        <h3>Modify Question</h3>
        <div class="panel panel-primary"></div>

        @include('partial.admin.error')
        {!! Form::model($question,['method'=>'PATCH','id'=>'question_form','action'=>['AdminQuestionsController@update',$question->slug]]) !!}
        {{ csrf_field() }}

        <div class="form-group">
            {!! Form::label('number', 'Number') !!}
            {!! Form::text('number',null,['class'=>'form-control smlr']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('body', 'Question') !!}
            <textarea name="" id="question_body" required>{{$question->body or ''}}</textarea>
            <textarea name="body" id="question_text" hidden required></textarea>
        </div>

        <div class="form-group">
            {!! Form::label('topic', 'Topic') !!}
            {!! Form::text('topic' ,$question->topic,['class'=>'form-control smlr']) !!}
        </div>
        {!! Form::hidden('question_slug' ,$question->slug) !!}
        {!! Form::close() !!}

        <div class="form-group">
            <input type="button" class="btn btn-primary" value="Save changes" onclick="create();">
        </div>

        {!! Form::open(['method'=>'DELETE','action'=>['AdminQuestionsController@destroy', $question->slug]]) !!}
        {!! Form::hidden('question_slug' ,$question->slug) !!}
        <button type="button" class="btn btn-link btn-sm btn-start" data-toggle="modal" data-target="#deleteModal">Delete Question</button>
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog smlr" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title pull-center" id="myModalLabel">Are you sure you want to delete this question?</h4>
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


@endsection
@extends('layouts.user-master-editor')

@section('title', 'Add a new question')

@section('private-head')
    <script>
        function topicToggle(){
            $("#topicDiv").toggle();
            $("#topicExisting").toggle();
            $("#topicLabel").text('Click here if the topic is existing');
        }
        tinymce.init({
            selector:'#question_body',
            menubar : false,
            toolbar: 'undo redo hr tiny_mce_wiris_formulaEditor tiny_mce_wiris_formulaEditorChemistry styleselect',
            plugins: "tiny_mce_wiris ",
        });
        tinymce.init({
            selector:'#solution_body',
            menubar : false,
            toolbar: 'undo redo hr tiny_mce_wiris_formulaEditor tiny_mce_wiris_formulaEditorChemistry table fontselect styleselect',
            plugins: "tiny_mce_wiris",
            height: "150",
            width: "600"
        });

        function create() {
            var question_text = $("iframe#question_body_ifr").contents().find("body").html();
            $("#question_text").html(question_text);
            $("#question_form").submit();
        }
    </script>
@endsection


@section('content')
    <style>
        label { color: white; }
        select { margin-bottom: 10px;  }
    </style>
    @if(Session::has('status'))
        <div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>{{session('status')}}<span class="fa fa-check"></span></div>
    @endif
    <div class="section">
        <div class="search-input">
            <div class="container">
                <div style="width: 400px">
                    <br>
                    @if(Session::has('warning'))
                        <div class="alert alert-warning">
                            {{Session('warning')}}<span class="fa fa-check"></span></div>
                    @endif
                    <div class="text-center">
                        <span style="color: white; font-weight: bold; font-size: 23px;">Add new question</span>
                    </div>
                    <div class="">
                        {!! Form::open(['method'=>'POST','id'=>'question_form','action'=>'UsersQuestionsController@store']) !!}
                        {{ csrf_field() }}

                        <div class="form-group">
                            {!! Form::label('number', 'Number') !!}
                            {!! Form::text('number',null,['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            <textarea name="" id="question_body" required></textarea>
                            <textarea name="body" id="question_text" hidden required></textarea>
                        </div>

                        <div class="form-group">
                            {!! Form::hidden('user_id', Auth::user()->id) !!}
                            {!! Form::label('course_id', 'Select Course') !!}
                            {!! Form::select('course_id', $courses ,null,['class'=>'form-control']) !!}
                        </div>
                        {!! Form::hidden('user_id', Auth::user()->id ,null,['class'=>'form-control']) !!}
                        <div class="form-group">
                            {!! Form::label('year_id', 'Select Session') !!}
                            {!! Form::select('year_id', $years ,null,['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            <div id="topicExisting">
                                {!! Form::label('topic_id', 'Select from existing topic') !!}
                                {!! Form::select('topic_id', $topics ,null,['class'=>'form-control']) !!}
                            </div>
                            <input name="topicCheckBox" type="checkbox" id="topicCheckBox" onclick="topicToggle();">
                            <label for="topicCheckBox" id="topicLabel">Click here if the topic is not existing.</label>
                            <div id="topicDiv" hidden>
                                {!! Form::label('topic', 'New Topic') !!}
                                {!! Form::text('topic', null,['class'=>'form-control', 'id'=>'topicNew']) !!}
                            </div>
                        </div>

                        {!! Form::close() !!}
                        <button type="button" class="form-submit btn btn-blue" onclick="create();" style="width: 100%">Add</button>
                        <br><br>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@extends('layouts.admin-master-edit')

@section('title', 'Admin question list')

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
            toolbar: 'undo redo tiny_mce_wiris_formulaEditor tiny_mce_wiris_formulaEditorChemistry table fontselect styleselect',
            plugins: "tiny_mce_wiris",
            height: "150",
            width: "600"
        });
        tinymce.init({
            selector:'#option_a_body',
            menubar : false,
            toolbar: 'undo redo tiny_mce_wiris_formulaEditor tiny_mce_wiris_formulaEditorChemistry table fontselect styleselect',
            plugins: "tiny_mce_wiris",
            height: "100",
            width: "600"
        });
        tinymce.init({
            selector:'#option_b_body',
            menubar : false,
            toolbar: 'undo redo tiny_mce_wiris_formulaEditor tiny_mce_wiris_formulaEditorChemistry table fontselect styleselect',
            plugins: "tiny_mce_wiris",
            height: "100",
            width: "600"
        });
        tinymce.init({
            selector:'#option_c_body',
            menubar : false,
            toolbar: 'undo redo tiny_mce_wiris_formulaEditor tiny_mce_wiris_formulaEditorChemistry table fontselect styleselect',
            plugins: "tiny_mce_wiris",
            height: "100",
            width: "600"
        });
        tinymce.init({
            selector:'#option_d_body',
            menubar : false,
            toolbar: 'undo redo tiny_mce_wiris_formulaEditor tiny_mce_wiris_formulaEditorChemistry table fontselect styleselect',
            plugins: "tiny_mce_wiris",
            height: "100",
            width: "600"
        });

        function create() {
            var question_text = $("iframe#question_body_ifr").contents().find("body").html();
            var a_text = $("iframe#option_a_body_ifr").contents().find("body").html();
            var b_text = $("iframe#option_b_body_ifr").contents().find("body").html();
            var c_text = $("iframe#option_c_body_ifr").contents().find("body").html();
            var d_text = $("iframe#option_d_body_ifr").contents().find("body").html();

            $("#question_text").html(question_text);
            $("#option_a_text").html(a_text);
            $("#option_b_text").html(b_text);
            $("#option_c_text").html(c_text);
            $("#option_d_text").html(d_text);

            $("#question_form").submit();
        }
    </script>
@endsection

@section('content')
    <div id="page-wrapper">
        <div class="panel-body">
            <div class="bs-example">
                @if(Session::has('status'))
                    <div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>{{Session('status')}}<span class="fa fa-check"></span></div>
                @endif
                <div class="course_details">
                    <b>COURSE CODE:  </b>  {{$course->code or ''}} <br>
                    <b>COURSE TITLE: </b>  {{$course->title or ''}} <br>
                    <b>SESSION: </b>  {{$year->name or ''}}<br>
                    <b>SEMESTER: </b>  {{$course->semester->name or ''}}
                </div>
                <div class="big-space"></div>
                <!--A Questions -->
                @if(count($questions)>0)
                    @foreach($questions as $question)
                    <!--start-->
                        <div class="row">
                            <a href="/admin/questions/{{$question->slug or ''}}">
                                <div class="col-md-1 col-sm-1 col-xs-1 no-padding-right">
                                    <span class="question-num">{{$question->number or ''}})-</span>
                                </div>
                            </a>
                            <div class="col-md-11 col-sm-11 col-xs-11">
                                <div class="question">
                                    {!! $question->body or '' !!}
                                </div>
                                <div class="row">
                                    @foreach($question->qimages as $qimage)
                                        <div class="col-md-2 col-sm-6 col-xs-5">
                                            <img src="{{$qimage->path}}" class="image-responsive" style="width:100%;">
                                            {{$qimage->label or ''}}
                                        </div>
                                    @endforeach
                                </div>
                                <div class="litle-space"></div>
                                <div style="display: flex; color: grey">
                                    <small>
                                        {!! Form::open(['method'=>'POST','action'=>'ManagementController@questionVisibility']) !!}
                                        {!! Form::hidden('slug', $question->slug ) !!}
                                        <button class="btn-link" style="padding: 0; border-width: 0;">
                                            @if($question->visibility == 1)
                                                <span class="alert-success" title="Click to hide">Visible to all users </span>
                                            @else
                                                <span class="alert-danger" title="Click to make visible">Hidden from all users </span>
                                            @endif
                                        </button>
                                        {!! Form::close() !!}
                                    </small>

                                    <small> &nbsp; Topic: {{$question->topic->name or $question->topic}} </small>
                                    <small> &nbsp; Topic: {{$question->topic->name or $question->topic}} </small>
                                    <small> &nbsp;&nbsp;{{count($question->views)}} Views</small>&nbsp;&nbsp;&nbsp;
                                    <small> {{count($question->comments)}} Discussion(s)</small>&nbsp;&nbsp;&nbsp;
                                    @if(isset($question->solution))
                                        <small><span class="alert-success"> Solved</span></small>
                                    @else
                                        <small><span class="alert-danger"> Not Solved</span></small>
                                    @endif
                                    <small>&nbsp;&nbsp;<a href="/admin/questions/{{$question->slug or ''}}/edit"> Edit </a></small>
                                </div>
                                <div class="litle-space"></div>
                            </div>
                        </div>
                        <hr>
                    @endforeach
            </div>
            @else
                <div class="red">NO question has been uploaded for this course in this session</div>
            @endif
            <h3>New question</h3>
            <div class="panel panel-primary"></div>
            @if($course->type==1)
                @include('admin.questions.AllOptions')
            @else
                {!! Form::open(['method'=>'POST','id'=>'question_form','action'=>'AdminQuestionsController@store']) !!}
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-2">
                        {!! Form::label('number', 'Number') !!}
                        {!! Form::text('number',null,['class'=>'form-control']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('body', 'Question') !!}
                    <textarea name="" id="question_body" cols="30" rows="10" required></textarea>
                    <textarea name="body" id="question_text" hidden required></textarea>
                </div>

                {!! Form::hidden('course_id', $course->id ,null,['class'=>'form-control']) !!}
                {!! Form::hidden('year_id', $year->id ,null,['class'=>'form-control']) !!}

                <div class="row">
                    <div class="col-md-4 form-group">
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
                    <div class="col-md-3 form-group">
                        {!! Form::label('user_id', 'Posting as ') !!}
                        {!! Form::select('user_id', $users ,null,['class'=>'form-control']) !!}
                    </div>
                </div>

                {!! Form::close() !!}
                <input type="button" class="btn btn-primary" value="Upload" onclick="create();">
            @endif
        </div>
    </div>
@endsection

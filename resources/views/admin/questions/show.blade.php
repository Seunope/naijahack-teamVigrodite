@extends('layouts.admin-master-edit')

@section('title', 'Question management page')

@section('private-head')
    <script>
        tinymce.init({
            selector:'#solution_body',
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
            selector:'#edit_option_a_body',
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
            selector:'#edit_option_b_body',
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
            selector:'#edit_option_c_body',
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
        tinymce.init({
            selector:'#edit_option_d_body',
            menubar : false,
            toolbar: 'undo redo tiny_mce_wiris_formulaEditor tiny_mce_wiris_formulaEditorChemistry table fontselect styleselect',
            plugins: "tiny_mce_wiris",
            height: "100",
            width: "600"
        });

        function create_solution() {
            var solution_text = $("iframe#solution_body_ifr").contents().find("body").html();
            $("#solution_text").html(solution_text);
            $("#solution_form").submit();
        }

        function create_a() {
            var a_text = $("iframe#option_a_body_ifr").contents().find("body").html();
            $("#option_a_text").html(a_text);
            $("#option_a_form").submit();
        }
        function edit_a() {
            var a_text = $("iframe#edit_option_a_body_ifr").contents().find("body").html();
            $("#edit_option_a_text").html(a_text);
            $("#edit_option_a_form").submit();
        }

        function create_b() {
            var a_text = $("iframe#option_b_body_ifr").contents().find("body").html();
            $("#option_b_text").html(a_text);
            $("#option_b_form").submit();
        }
        function edit_b() {
            var a_text = $("iframe#edit_option_b_body_ifr").contents().find("body").html();
            $("#edit_option_b_text").html(a_text);
            $("#edit_option_b_form").submit();
        }

        function create_c() {
            var a_text = $("iframe#option_c_body_ifr").contents().find("body").html();
            $("#option_c_text").html(a_text);
            $("#option_c_form").submit();
        }
        function edit_c() {
            var a_text = $("iframe#edit_option_c_body_ifr").contents().find("body").html();
            $("#edit_option_c_text").html(a_text);
            $("#edit_option_c_form").submit();
        }

        function create_d() {
            var a_text = $("iframe#option_d_body_ifr").contents().find("body").html();
            $("#option_d_text").html(a_text);
            $("#option_d_form").submit();
        }
        function edit_d() {
            var a_text = $("iframe#edit_option_d_body_ifr").contents().find("body").html();
            $("#edit_option_d_text").html(a_text);
            $("#edit_option_d_form").submit();
        }
    </script>
@endsection

@section('content')

    <div id="page-wrapper">
        <div class="show-head">
            <h4>{{$question->course->code or ''}}- {{$question->year->name or ''}}-Question ({{$question->number or ''}})</h4>
        </div>

        @if(Session::has('status'))
            <div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>{{Session('status')}}<span class="fa fa-check"></span></div>
        @endif

        {{--Display Question begins--}}
        <div id="questioncontainer" class="contentWrapper positionLeft">
            <div class="message positionLeft">
                <div class="content-header">
                    <h3><b>Question</b></h3>
                    <div class="panel panel-primary"></div>
                </div>
                <span class="viewsCount">{{count($question->views)}} views</span>
                @if(isset($question->solution))
                    <small>By<a class="" href="#" title="{{$question->solution->user->name or ''}}"> {{$question->solution->user->name or ''}}</a>
                        uploaded {{$question->solution->created_at->diffForHumans()}}
                    </small>
                @endif
                <div class="msgBody wrapWord fullMessage">
                    <p>{!! $question->body or '' !!}</p>
                </div>
            </div>
            {{--Display all question image begins--}}
            @if(($question->qimages != null))
                <div class="row">
                    @foreach($question->qimages as $fig)
                        <div class=" @if($fig->size ==1) col-md-4 col-sm-4 col-xs-4 @elseif($fig->size ==2) col-sm-6 col-md-6 col-xs-6 @else col-md-12 col-sm-12 col-xs-12 @endif">
                            <img src="{{$fig->path or ''}}" alt="{{$fig->label or ''}}" class="question_image"  title="{{$fig->label or ''}}" >
                            <br>{{$fig->label}}
                            <a href="/admin/qimages/{{$fig->slug or ''}}/edit" class="btn btn-link btn-sm">Edit</a>
                        </div>
                    @endforeach
                </div>
            @else
                No image
            @endif
            {{--Display all question image ends--}}

            {{--Button to add image begins--}}

            <div style="display: flex">
                <a href="/admin/qimages/{{$question->slug or ''}}/create" class="btn btn-link btn-small btn-start">Add Image</a>
                <a href="/admin/questions/{{$question->slug or ''}}/edit" class="btn btn-link btn-small">Edit Question</a>
            </div>
            <br>
            <!-- Modal -->
            @if($question->type==1)
            <!-- Options begin -->
                <h3><b>Options</b></h3>
                <div class="panel panel-primary"></div>
                @include('admin.questions.optionA')
                @include('admin.questions.optionB')
                @include('admin.questions.optionC')
                @include('admin.questions.optionD')
                <h3><b>Correct Option</b></h3>
                <div class="panel panel-primary"></div>
                @include('management.correctOption.correctOption')
            @endif
        <!-- Options Ends -->
            {{--Display Question ends--}}






















            {{--Solutionn begins--}}
            <h3><b>Solution</b></h3>
            <div class="panel panel-primary"></div>
            <div class="contentWrapper positionLeft answerTagged" >
                <div class="message positionLeft">
                    @if(isset($question->solution))
                        <small>By<a class="" href="#" title="{{$question->solution->user->name or ''}}"> {{$question->solution->user->name or ''}}</a>
                            uploaded {{$question->solution->created_at->diffForHumans()}}
                        <!-- //$question->solution->created_at->diffForHumans() -->
                        </small>
                    @endif
                </div>
                @if(($question->solution != null))
                    <div class="msgContent positionLeft">
                        <div class="msgBody wrapWord fullMessage">
                            <p>{!! $question->solution->body or ''!!}</p>
                            {{--<pre>{!! $question->solution->body or ''!!}</pre>--}}
                        </div>
                        {{--Display all image for the answer begins--}}
                        @if(($question->solution->simages != null))
                            <div class="row">
                                @foreach($question->solution->simages as $sfig)
                                    <div class=" @if($sfig->size ==1) col-md-4 col-sm-4 col-xs-4 @elseif($sfig->size ==2) col-sm-6 col-md-6 col-xs-6 @else col-md-12 col-sm-12 col-xs-12 @endif">
                                        <img src="{{$sfig->path or ''}}" alt="{{$sfig->label or ''}}" class="question_image"  title="{{$sfig->label or ''}}" >
                                        <br>{{$sfig->label}}
                                        <a href="/admin/simages/{{$sfig->slug or ''}}/edit" class="btn btn-link btn-sm"><i class="fa fa-pencil"></i> Images</a>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            No image
                        @endif
                        {{--Display all image for the answer ends--}}

                        {{--Button to add image begins--}}
                        <div style="display: flex">
                            <a href="/admin/simages/{{$question->solution->slug or ''}}/create" class="btn btn-small btn-start btn-link"><i class="fa fa-paperclip"></i>Attach Image</a>
                            <a href="/admin/solutions/{{$question->solution->slug or ''}}/edit" class="btn btn-small btn-start btn-link">Edit Solution</a>
                        </div>
                    </div>
            </div>

            @else
                <div>Add solution to this question</div>
                {{--Page title--}}
                {{--Page title--}}
                {!! Form::open(['method'=>'POST','action'=>'AdminSolutionsController@store', 'id'=>'solution_form']) !!}
                {{  csrf_field() }}

                <div class="form-group">
                    {!! Form::label('body','Solution') !!}
                    <textarea name="" id="solution_body"></textarea>
                    <textarea name="body" id="solution_text" hidden></textarea>
                </div>

                <div class="form-group">
                    {!! Form::hidden('question_id', $question->id) !!}
                    {!! Form::hidden('slug', $question->slug) !!}
                </div>
                {!! Form::close() !!}
                <div class="form-group">
                    <input type="button" class="btn btn-primary" value="Add Solution" onclick="create_solution();">
                </div>
            @endif


















            {{--Comment beggins--}}

            <div class="contentWrapper positionLeft answerTagged" >
                <div class="message positionLeft">
                    <div class="messageType">
                        <span class="messageAnswer" title="This post answered the question">
                            Comments
                        </span>
                    </div>
                </div>
                @if(($question->comments != null))
                    @foreach($question->comments as $comment)
                        <div class="message positionLeft">
                            <div class="userInfo">
                                <div>
                                    <div class="profile-image-display">
                                        <a title="{{$comment->user->name or ''}}" class="message-user-image block-display circular-display avatar-size-small" href="http://answers.microsoft.com/en-us/profile/d981f1ab-c2dc-4de2-9d23-e3be2f4ad7d0">
                                            <div class="default-avatar-profile circular-display red1807 avatar-size-small" title="{{$comment->user->name or ''}}">{{$comment->user->name[0]  or ''}}</div>
                                        </a>
                                    </div>
                                    <a class="userNameShowWhiteSpace" href="" title="John Rubdy">{{$comment->user->name or ''}}</a>
                                    comment
                                    <small>
                                        {{$comment->created_at->diffForHumans()}}
                                    </small>
                                </div>
                            </div>
                            <div class="msgContent positionLeft">
                                <div class="msgBody wrapWord fullMessage">
                                    <p><span>
                                {!! $comment->body or '' !!}
                            </span></p>
                                </div>
                                {{--Display all image for the Comment begins--}}
                                @if(($comment->cimages != null))
                                    <div class="row">
                                        @foreach($comment->cimages as $cfig)
                                            <div class=" @if($cfig->size ==1) col-md-4 col-sm-4 col-xs-4 @elseif($cfig->size ==2) col-sm-6 col-md-6 col-xs-6 @else col-md-12 col-sm-12 col-xs-12 @endif">
                                                <img src="{{$cfig->path or ''}}" alt="{{$cfig->label or ''}}" class="question_image"  title="{{$cfig->label or ''}}" >
                                                <br>{{$cfig->label}}
                                                <a href="/admin/cimages/{{$cfig->slug or ''}}/edit" class="btn btn-link btn-sm"><i class="fa fa-pencil"></i> Images</a>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    No image
                                @endif
                                @if(Auth::user()->id==$comment->user->id)
                                    <div style="display: flex">
                                        <a href="/admin/cimages/{{$comment->slug}}/create" class="btn btn-link btn-small btn-start">Add Images</a>
                                        <a href="/admin/comments/{{$comment->slug}}/edit" class="btn btn-link btn-sm">Edit</a>
                                    </div>
                                @endif
                                {{--Display all image for the Comment ends--}}
                                <div class="vote-count-wrapper">
                                    <span class="subRatingCount ratingCount">{{count($comment->helpfuls)}} @if(count($comment->helpfuls)>1) people @else person @endif found this helpful </span>
                                </div>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                @else
                    <div class="text-danger">
                        No Comment for this question yet!
                    </div>
                    {{--Show solution ends--}}
                @endif

                <h4>Add a  comment</h4>
                {!! Form::open(['method'=>'POST','action'=>'AdminCommentsController@store']) !!}
                {{  csrf_field() }}

                <div class="form-group">
                    {!! Form::label('body', 'Comment') !!}
                    {!! Form::textarea('body',null,['class'=>'form-control surmmernote']) !!}
                </div>

                <div class="form-group">
                    {!! Form::hidden('question_id', $question->id ,null,['class'=>'form-control']) !!}
                    {!! Form::hidden('slug', $question->slug ,null,['class'=>'form-control']) !!}
                </div>
                {!! Form::hidden('user_id', Auth::user()->id ,null,['class'=>'form-control']) !!}
                {!! Form::submit('Add Comment',['class'=>'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection

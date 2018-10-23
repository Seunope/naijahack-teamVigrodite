@extends('layouts.admin-master-edit')

@section('title', 'Admin edit solution to-'.$solution->question->number)

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
        function create_solution() {
            var solution_text = $("iframe#solution_body_ifr").contents().find("body").html();
            $("#solution_text").html(solution_text);
            $("#solution_form").submit();
        }
    </script>
@endsection

@section('content')


    <div id="page-wrapper">
        <h3>Modify Answer</h3>
        <div class="panel panel-primary"></div>

        @include('partial.admin.error')
        <div class="row">
            <div class="show-head">
                {{$solution->question->course->code}}- {{$solution->question->year->name}}-Question ({{$solution->question->number}})
            </div>
            <div class="show-head">
                <h3>Question</h3>
                <div class="panel panel-primary"></div>
            </div>
            <div class="show-text">
                {!!$solution->question->body!!}
            </div>
            <h3>Solution Edit panel</h3>
            <div class="panel panel-primary"></div>
            {!! Form::model($solution,['method'=>'PATCH', 'id'=>'solution_form','action'=>['AdminSolutionsController@update',$solution->slug]]) !!}
            {{ csrf_field() }}
            <div class="form-group">
                {!! Form::label('body', 'Edit') !!}
                <textarea name="" id="solution_body">{!!$solution->body!!}</textarea>
                <textarea name="body" id="solution_text" hidden></textarea>
            </div>
            {!! Form::close() !!}
            <input type="button" class="btn btn-primary" value="Save" onclick="create_solution();">

            {!! Form::open(['method'=>'DELETE','action'=>['AdminSolutionsController@destroy', $solution->slug]]) !!}
            {!! Form::hidden('slug', $solution->question->slug ,null,['class'=>'form-control']) !!}
            <button type="button" class="btn btn-link btn-sm btn-start" data-toggle="modal" data-target="#deleteModal"> Delete solution</button>
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog smlr" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title pull-center" id="myModalLabel">Are you sure you want to delete this solution?</h4>
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
@endsection
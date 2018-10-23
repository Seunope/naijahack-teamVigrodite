@extends('layouts.admin-master')

@section('title', 'Admin course home')

@section('content')

    <div id="page-wrapper">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> All Courses</h3>
            </div>
            @if(Session::has('status'))
                <div class="alert alert-success alert-dismissable" ><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>{{Session('status')}}<span class="fa fa-check"></span></div>
            @endif
            <div class="panel-body">
                {{--Table begins--}}
                <div class="bs-example" >
                    @foreach($schools as $school)
                        <div style="text-align: center;">
                            <h4>{{$school->full_name or ''}}</h4>
                        </div>
                        @foreach($school->faculties as $faculty)
                            <div style="text-align: center;">
                                <h5>{{$faculty->full_name or ''}}</h5>
                            </div>
                            @foreach($faculty->departments as $department)
                                <div style="text-align: center;">
                                    <b>{{$department->full_name or ''}}</b>
                                </div>
                                @if(count($department->courses)>0)
                                <table class="table table-bordered table-striped">
                                    <thead class="table-head">
                                    <tr>
                                        <th>ID</th>
                                        <th>Course code</th>
                                        <th>Course title</th>
                                        <th>Level</th>
                                        <th>Admin</th>
                                        <th>No of Q</th>
                                        {{--<th>Unit</th>--}}
                                        <th>Created</th>
                                        <!-- <th>Edit</th> -->
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($department->courses as $course)
                                            <tr>
                                                <th scope="row">{{$num++}}</th>
                                                <td><a href="/admin/courses/{{$course->slug}}">{{$course->code or ''}}</a></td>
                                                <td>{{$course->title or ''}}</td>
{{--                                            <!-- <td>{{$course->semester->name or ''}}</td> -->--}}
                                                <td>{{$course->level->name or ''}}</td>
                                                <td>{{$course->user->name or 'Nill'}}</td>
                                                <td>{{count($course->questions)}}</td>
                                                <td>{{$course->created_at->diffForHumans()}}</td>
                                            <!-- <td><a href="/schoolAdmin/courses/{{$course->slug}}/edit">Edit</a></td> -->
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @else
                                    <div class="red">
                                        <div style="text-align: center;">
                                            No Course here yet.
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endforeach
                    @endforeach






                    {{--Paggination begins--}}
                    <div class="text-center pagination">123
                        {{--{!! $dept->render() !!}--}}
                    </div>
                    {{--Paggination ends--}}
                    {{--MODAL BEGIN--}}
                    <button type="button" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#myModal2"><i class="fa fa-plus"></i> Add a new Course</button>
                    <!-- Modal -->
                    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <h4 class="modal-title" id="myModalLabel">Add a new Course</h4>
                                </div>
                                <div class="modal-body">
                                    {{--Page title--}}
                                    {!! Form::open(['method'=>'POST','action'=>'AdminCoursesController@store']) !!}
                                    {{ csrf_field() }}

                                    <div class="form-group">
                                        {!! Form::label('code', 'Course code') !!}
                                        {!! Form::text('code',null,['class'=>'form-control']) !!}
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('title', 'Course title') !!}
                                        {!! Form::text('title',null,['class'=>'form-control']) !!}
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('department_id', 'Select Department') !!}
                                        {!! Form::select('department_id', $departments ,null,['class'=>'form-control']) !!}
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('semester_id', 'Select Semester') !!}
                                        {!! Form::select('semester_id', $semesters ,null,['class'=>'form-control']) !!}
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('level_id', 'Select level') !!}
                                        {!! Form::select('level_id', $levels ,null,['class'=>'form-control']) !!}
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('unit', 'Course unit') !!}
                                        {!! Form::text('unit',null,['class'=>'form-control']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('type', 'Choose type') !!}
                                        {!! Form::select('type', ['0'=>'ppt','1'=>'cbt'] ,null,['class'=>'form-control']) !!}
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    {!! Form::reset('Cancel',['class'=>'btn btn-secondary pull-left']) !!}
                                    {!! Form::button('Close <i class="fa fa-remove"></i>',['class'=>'btn btn-secondary', 'data-dismiss'=>'modal']) !!}
                                    {!! Form::submit('Add new Course' ,['class'=>'btn btn-primary']) !!}
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                    {{--MODAL ENDS--}}
                </div>
            </div>
            {{--Table ends--}}
        </div>
    </div>


@endsection

@extends('layouts.admin-master')

@section('title', 'Admin courses home')

@section('content')

    <div id="page-wrapper">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> All Courses</h3>
            </div>
            @if(Session::has('status'))
                <div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>{{Session('status')}}<span class="fa fa-check"></span></div>
            @endif
            <div class="panel-body">
                {{--Table begins--}}
                <div class="bs-example" >
                    <table class="table table-bordered table-striped">
                        <thead class="table-head">
                        <tr>
                            <th>ID</th>
                            <th>Course code</th>
                            <th>Course title</th>
                            <!-- <th>Semester</th> -->
                            <th>Level</th>
                            <!-- <th>Unit</th> -->
                            <th>Co-ordinator</th>
                            <th>Created</th>
                            <!-- <th>Edit</th> -->
                        </tr>
                        </thead>
                        <tbody>
                        @if($faculties!=null)
                            @foreach($faculties as $faculty)
                                @foreach($faculty->departments as $department)
                                    <tr class="sui-row">
                                        <td class="sui-cell" colspan="8">
                                            <div style="text-align: center;">
                                                <b>{{$department->full_name or ''}}</b>
                                            </div>
                                        </td>
                                    </tr>
                                    @foreach($department->courses as $course)
                                        <tr>
                                            <th scope="row">{{$num++}}</th>
                                            <td><a href="/schoolAdmin/courses/{{$course->slug}}">{{$course->code or ''}}</a></td>
                                            <td>{{$course->title or ''}}</td>
                                        <!-- <td>{{$course->semester->name or ''}}</td> -->
                                            <td>{{$course->level->name or ''}}</td>
                                        <!-- <td>{{$course->unit or ''}}</td> -->
                                            <td>{{$course->user->name or 'Nill'}}</td>
                                            <td>{{$course->created_at->diffForHumans()}}</td>
                                        <!-- <td><a href="/schoolAdmin/courses/{{$course->slug}}/edit">Edit</a></td> -->
                                        </tr>
                                    @endforeach
                                @endforeach
                            @endforeach
                        @endif
                        </tbody>
                    </table>





                    {{--Paggination begins--}}
                    <div class="text-center pagination">
                        {!! $faculties->render() !!}
                    </div>
                    {{--Paggination ends--}}
                    {{--MODAL BEGIN--}}
                    @if($faculties!=null)
                        <button type="button" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#myModal2">Add a new Course</button>
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
                                        {!! Form::open(['method'=>'POST','action'=>'SchoolAdminCoursesController@store']) !!}
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
                                            <select class="form-control" name="department_id">
                                                @foreach($faculties as $faculty)
                                                    @foreach($faculty->departments as $department)
                                                        <option class="form-control" value="{{$department->id or ''}}">{{$department->name or ''}}</option>
                                                    @endforeach
                                                @endforeach
                                            </select>
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
                                        {!! Form::submit('Add Course' ,['class'=>'btn btn-primary']) !!}
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    @endif
                    {{--MODAL ENDS--}}
                </div>
            </div>
            {{--Table ends--}}
        </div>
    </div>


@endsection

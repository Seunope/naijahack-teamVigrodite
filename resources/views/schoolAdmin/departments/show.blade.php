@extends('layouts.admin-master')

@section('title', 'Admin department-'.$department->name)

@section('content')

    <div id="page-wrapper">
        <!-- <div class="panel panel-primary"></div> -->
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">

                <h5><strong>Department</strong>: <i>{{$department->name or 'N/A'}} ({{$department->full_name or ''}})</i></h5>

                <h5><strong>Faculty</strong>: <i>{{$department->faculty->name}} -{{$department->faculty->school->name}}</i></h5>

                <h5><strong>No of Courses under this department</strong>: <i>{{count($department->courses)}}</i></h5>

                <h5><strong>Co-ordinator</strong>: <i>{{$department->user->name or 'N/A'}}</i></h5>

                <a href="/schoolAdmin/departments/{{$department->slug or ''}}/edit">Edit</a>

                <div class="panel panel-primary"></div>

            <!-- <a href="{{URL::to('/schoolAdmin/departments')}}" class="btn btn-success btn-sm back-button"><i class="fa fa-arrow-left"></i> Back</a> -->
                @if(count($department->courses)>0)
                    <div class="list-group">
                        <h4><strong>List of Courses under {{$department->name or ''}} Department</strong>.</h4>
                        @foreach($department->courses as $course)
                            <a href="/schoolAdmin/courses/{{$course->slug or ''}}" class="list-group-item">{{$num++}}). {{$course->code or ''}}-  {{$course->title or ''}}</a>
                        @endforeach
                    </div>
                @else
                    <div class="red">There are no courses under this department yet.</div>
                @endif
                <br>
                <button type="button" class="btn btn-sm " data-toggle="modal" data-target="#myModal2"><i class="fa fa-plus"></i> Add a new Course</button>
                <!-- Modal -->
                <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h4 class="modal-title" id="myModalLabel">Add a new Course to {{$department->name or ''}} department</h4>
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

                                {!! Form::hidden('department_id', $department->id ,null,['class'=>'form-control']) !!}

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
                {{--MODAL ENDS--}}
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>


@endsection

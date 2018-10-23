@extends('layouts.admin-master')

@section('title', 'Admin schools home')

@section('content')

<div id="page-wrapper">
    <!-- <div class="panel panel-primary"></div> -->
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="show-head">
                <h5><strong>Faculty</strong>: <i>{{$faculty->name or ''}} ({{$faculty->full_name or ''}})</i></h5>
       
                <h5><strong>School</strong>: <i>{{$faculty->school->name or ''}}</i></h5>

                <h5><strong>No of Departments under this faculty</strong>: <i>{{count($faculty->departments)}}</i></h5>
                 
                <a href="/schoolAdmin/faculties/{{$faculty->slug}}/edit">Edit</a>
                <br>
                <!-- <a href="{{URL::to('/schoolAdmin/faculties')}}" class="btn btn-success btn-sm back-button"><i class="fa fa-arrow-left"></i> Back</a> -->
            <div class="panel panel-primary"></div>
            @if(count($faculty->departments)>0)
                <strong>List of Departments under this Faculty</strong>
                <div class="list-group">
                    @foreach($faculty->departments as $department)
                    <a href="/schoolAdmin/departments/{{$department->slug}}" class="list-group-item">{{$num++}}). {{$department->name or ''}}-  {{$department->full_name or ''}}</a>
                    @endforeach
                </div>
            @else
                <div class="red">There are no departments under this faculty yet.</div>
            @endif

            <button type="button" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#myModal2"><i class="fa fa-plus"></i> Add a new Department</button>
            <!-- Modal -->
            <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel">Add a new Department under {{$faculty->full_name or ''}} - {{$faculty->school->name or ''}}</h4>
                        </div>
                        <div class="modal-body">
                            {{--Page title--}}
                            {!! Form::open(['method'=>'POST','action'=>'SchoolAdminDepartmentsController@store']) !!}
                            {{ csrf_field() }}

                            <div class="form-group">
                                {!! Form::label('name', 'Name') !!}
                                {!! Form::text('name',null,['class'=>'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::hidden('faculty_id', $faculty->id ,null) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('full_name', 'Full name of Department') !!}
                                {!! Form::text('full_name',null,['class'=>'form-control']) !!}
                            </div>
                            {{--<div class="form-group">--}}
                                {{--{!! Form::label('password', 'Admin password') !!}--}}
                                {{--{!! Form::password('password',['class'=>'form-control']) !!}--}}
                            {{--</div>--}}
                        </div>
                        <div class="modal-footer">
                            {!! Form::reset('Cancel',['class'=>'btn btn-secondary pull-left']) !!}
                            {!! Form::button('Close <i class="fa fa-remove"></i>',['class'=>'btn btn-secondary', 'data-dismiss'=>'modal']) !!}
                            {!! Form::submit('Add new Department' ,['class'=>'btn btn-primary']) !!}
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
</div>


@endsection

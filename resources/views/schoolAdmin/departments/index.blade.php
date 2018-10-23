@extends('layouts.admin-master')

@section('title', 'Admin departments home')

@section('content')

    <div id="page-wrapper">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> All Department in {{$school->full_name or ''}}</h3>
            </div>
            @if(Session::has('status'))
                <div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>{{Session('status')}}<span class="fa fa-check"></span></div>
            @endif
            <div class="panel-body">
                {{--Table begins--}}
                <div class="bs-example" >

                    <table class="table table-bordered table-striped sui-table sui-hover sui-selectable">
                        <thead class="table-head">
                        <tr>
                            <th>ID</th>
                            <th>Department name</th>
                            <th>Full Department Name</th>
                            <!-- <th>Faculty</th> -->
                            <th>Co-ordinator</th>
                            <!-- <th>Edit</th> -->
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($faculties as $faculty)
                            <tr class="sui-row">
                                <td class="sui-cell" colspan="5">
                                    <div style="text-align: center;">
                                        <b>{{$faculty->full_name or ''}}</b>
                                    </div>
                                </td>
                            </tr>
                            @foreach($faculty->departments as $department)
                                <tr>
                                    <th scope="row">{{$num++}}</th>
                                    <td class="sui-cell"><a href="/schoolAdmin/departments/{{$department->slug}}">{{$department->name}}</a></td>
                                    <td class="sui-cell">{{$department->full_name or 'N/A'}}</td>
                                    <td class="sui-cell">{{$department->user->name or 'N/A'}}</td>
                                </tr>
                            @endforeach
                        @endforeach
                        </tbody>
                    </table>





                    {{--Paggination begins--}}
                    <div class="text-center pagination">
                        {!! $faculties->render() !!}
                    </div>
                    {{--Paggination ends--}}
                    {{--MODAL BEGIN--}}
                    <button type="button" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#myModal2">Add a new Department</button>
                    <!-- Modal -->
                    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <h4 class="modal-title" id="myModalLabel">Add a new Department under {{$school->name or ''}}</h4>
                                </div>
                                <div class="modal-body">
                                    {{--Page title--}}
                                    {!! Form::open(['method'=>'POST','action'=>'SchoolAdminDepartmentsController@store']) !!}

                                    <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />


                                    <div class="form-group">
                                        {!! Form::label('name', 'Name') !!}
                                        {!! Form::text('name',null,['class'=>'form-control']) !!}
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('faculty_id', 'Select Faculty') !!}
                                        {!! Form::select('faculty_id', $facultiesToSelect ,null,['class'=>'form-control']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('full_name', 'Full name of Department') !!}
                                        {!! Form::text('full_name',null,['class'=>'form-control']) !!}
                                    </div>
                                <!-- <div class="form-group">
                                        {!! Form::label('password', 'Admin password') !!}
                                {!! Form::password('password',['class'=>'form-control']) !!}
                                        </div> -->
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
            </div>
            {{--Table ends--}}
        </div>
    </div>


@endsection

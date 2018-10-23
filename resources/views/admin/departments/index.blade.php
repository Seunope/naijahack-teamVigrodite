@extends('layouts.admin-master')

@section('title', 'Admin departments home')

@section('content')

    <div id="page-wrapper">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> All Department</h3>
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
                        @if(count($school->faculties)>0)
                            <table class="table table-bordered table-striped">
                                <thead class="table-head">
                                <tr>
                                    <th>ID</th>
                                    <th>Department name</th>
                                    <th>Full Department Name</th>
                                    {{--<th>Faculty</th>--}}
                                    <th>Co-ordinator</th>
                                    <!-- <th>Edit</th> -->
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($school->faculties as $faculty)
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
                                            <td class="sui-cell"><a href="/admin/departments/{{$department->slug}}">{{$department->name}}</a></td>
                                            <td class="sui-cell">{{$department->full_name or 'N/A'}}</td>
                                        <!-- <td class="sui-cell">{{$department->faculty->name or 'N/A'}}- <small>{{$department->faculty->school->name or ''}}</small></td> -->
                                            <td class="sui-cell">{{$department->user->name or 'N/A'}}</td>
                                        <!-- <td><a href="/schoolAdmin/departments/{{$department->slug}}/edit">Edit</a></td> -->
                                        </tr>
                                    @endforeach
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="red">
                                <div style="text-align: center;">
                                    No Faculties here yet.
                                </div>
                            </div>
                        @endif
                    @endforeach






                    {{--Paggination begins--}}
                    <div class="text-center pagination">123
                        {{--{!! $dept->render() !!}--}}
                    </div>
                    {{--Paggination ends--}}
                    {{--MODAL BEGIN--}}
                    <button type="button" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#myModal2"><i class="fa fa-plus"></i> Add a new Department</button>
                    <!-- Modal -->
                    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <h4 class="modal-title" id="myModalLabel">Add a new Department</h4>
                                </div>
                                <div class="modal-body">
                                    {{--Page title--}}
                                    {!! Form::open(['method'=>'POST','action'=>'AdminDepartmentsController@store']) !!}
                                    {{ csrf_field() }}

                                    <div class="form-group">
                                        {!! Form::label('name', 'Name') !!}
                                        {!! Form::text('name',null,['class'=>'form-control']) !!}
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('faculty_id', 'Select Faculty') !!}
                                        {!! Form::select('faculty_id', $faculties ,null,['class'=>'form-control']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('full_name', 'Full name of Department') !!}
                                        {!! Form::text('full_name',null,['class'=>'form-control']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('password', 'Admin password') !!}
                                        {!! Form::password('password',['class'=>'form-control']) !!}
                                    </div>
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
                    {{--MODAL ENDS--}}                </div>
            </div>
            {{--Table ends--}}
        </div>
    </div>


@endsection

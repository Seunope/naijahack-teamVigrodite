@extends('layouts.admin-master')

@section('title', 'Admin faculties home')

@section('content')

    <div id="page-wrapper">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> All Faculties in {{$school->full_name}}</h3>
            </div>
            @if(Session::has('status'))
                <div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>{{session('status')}}<span class="fa fa-check"></span></div>
            @endif
            <div class="panel-body">
                {{--Table begins--}}
                <div class="bs-example" >


                    <table class="table table-bordered table-striped">
                        <thead class="table-head">
                        <tr>
                            <th>ID</th>
                            <th>Faculty name</th>
                            <th>Full Faculty Name</th>
                            {{--<th>School</th>--}}
                            <th>No of departments</th>
                            <!-- <th>Edit</th> -->
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($faculties as $faculty)
                            <tr>
                                <th scope="row">{{$num++}}</th>
                                <td><a href="/schoolAdmin/faculties/{{$faculty->slug}}">{{$faculty->name or ''}}</a></td>
                                <td>{{$faculty->full_name or ''}}</td>
                                {{--<td>{{$faculty->school->name or ''}}</td>--}}
                                <td>{{count($faculty->departments)}} Departments</td>
                                <!-- <td><a href="/schoolAdmin/faculties/{{$faculty->slug}}/edit">Edit</a></td> -->
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    {{--Paggination begins--}}
                    <div class="text-center pagination">
                        {!! $faculties->render() !!}
                    </div>
                    {{--Paggination ends--}}
                    {{--MODAL BEGIN--}}
                    <button type="button" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#myModal2"><i class="fa fa-plus"></i> Add a new faculty</button>
                    <!-- Modal -->
                    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <h4 class="modal-title" id="myModalLabel">Add a new Faculty</h4>
                                </div>
                                <div class="modal-body">
                                    {{--Page title--}}
                                    {!! Form::open(['method'=>'POST','action'=>'SchoolAdminFacultiesController@store']) !!}
                                    <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

                                    <div class="form-group">
                                        {!! Form::label('name', 'Name') !!}
                                        {!! Form::text('name',null,['class'=>'form-control']) !!}
                                    </div>

                                        {!! Form::hidden('school_id', $school_id ,null,['class'=>'form-control']) !!}

                                    <div class="form-group">
                                        {!! Form::label('full_name', 'Full name of faculty') !!}
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
                                    {!! Form::submit('Add new Faculty' ,['class'=>'btn btn-primary']) !!}
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

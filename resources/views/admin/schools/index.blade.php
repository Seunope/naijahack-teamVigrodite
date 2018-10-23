@extends('layouts.admin-master')

@section('title', 'Admin schools home')

@section('content')

    <div id="page-wrapper">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-suitcase"></i> All Schools</h3>
            </div>
            @if(Session::has('status'))
                <div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>{{Session('status')}}<span class="fa fa-check"></span></div>
            @endif
            <div class="panel-body">
                {{--Table begins--}}
                <div class="bs-example" id="" >






                    <table class="table table-bordered table-striped">
                        <thead class="table-head">
                        <tr>
                            <th>ID</th>
                            <th>School name</th>
                            <th>Full Name</th>
                            <th>Co-ordinator</th>
                            <!-- <th>Edit</th> -->
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($schools as $school)
                        <tr>
                            <th scope="row">{{$num++}}</th>
                            <td><a href="/admin/schools/{{$school->slug}}">{{$school->name}}</a></td>
                            <td>{{$school->full_name}}</td>
                            <td>{{$school->user->name or 'N/A'}}</td>
                            <!-- <td><a href="/admin/schools/{{$school->slug}}/edit">Edit</a></td> -->
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{--<div id="ajaxContent">--}}
                        {{--{!! $sch->render() !!}--}}
                    {{--</div>--}}

                    {{--<script>--}}
                        {{--$('#ajaxContent').load('http://localhost:8000/admin/schools');--}}

                        {{--$('.pagination a').on('click', function (event) {--}}
                            {{--event.preventDefault();--}}
                            {{--if ( $(this).attr('href') != '#' ) {--}}
                                {{--$("html, body").animate({ scrollTop: 0 }, "fast");--}}
                                {{--$('#ajaxContent').load($(this).attr('href'));--}}
                            {{--}--}}
                        {{--});--}}
                    {{--</script>--}}





                    {{--Paggination begins--}}
                    <div class="text-center pagination">123
                        {{--{!! $dept->render() !!}--}}
                    </div>
                    {{--Paggination ends--}}



                    {{--MODAL BEGIN--}}
                    <button type="button" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#myModal2"><i class="fa fa-plus"></i> Add a new School</button>
                    <!-- Modal -->
                    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <h4 class="modal-title" id="myModalLabel">Add a new School</h4>
                                </div>
                                <div class="modal-body">
                                    {{--Page title--}}
                                    {!! Form::open(['method'=>'POST','action'=>'AdminSchoolsController@store']) !!}
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        {!! Form::label('name', 'School Name') !!}
                                        {!! Form::text('name',null,['class'=>'form-control']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::hidden('slug',null,['class'=>'form-control']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('full_name', 'Full name of school') !!}
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
                                        {!! Form::submit('Add new school' ,['class'=>'btn btn-primary']) !!}
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

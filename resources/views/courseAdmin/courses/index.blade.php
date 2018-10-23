@extends('layouts.admin-master')

@section('title', 'Admin courses home')

@section('content')

    <div id="page-wrapper">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i>Courses assigned for you</h3>
            </div>
            @if(Session::has('status'))
                <div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>{{Session('status')}}<span class="fa fa-check"></span></div>
            @endif

            <div class="panel-body">
                {{--Table begins--}}
                <div class="bs-example" >
                    @if(count($courses>1))
                    <table class="table table-bordered table-striped">
                        <thead class="table-head">
                        <tr>
                            <th>ID</th>
                            <th>Course code</th>
                            <th>Course title</th>
                            <th>Department</th>
                            <th>Semester</th>
                            <th>Level</th>
                            <th>Unit</th>
                            <th>Created</th>
                            <!-- <th>Edit</th> -->
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($courses as $course)
                            <tr>
                                <th scope="row">{{$num++}}</th>
                                <td><a href="/courseAdmin/courses/{{$course->slug}}">{{$course->code or ''}}</a></td>
                                <td>{{$course->title or ''}}</td>
                                <td>{{$course->department->name or ''}}</td>
                                <td>{{$course->semester->name or ''}}</td>
                                <td>{{$course->level->name or ''}}</td>
                                <td>{{$course->unit or ''}}</td>
                                <td>{{$course->created_at->diffForHumans()}}</td>
                                <!-- <td><a href="/departmentAdmin/courses/{{$course->slug}}/edit">Edit</a></td> -->
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @else
                        <div class="red">
                            No course yet
                        </div>
                    @endif





                    {{--Paggination begins--}}
                    <div class="text-center pagination">123
                        {{--{!! $dept->render() !!}--}}
                    </div>

                </div>
            </div>
            {{--Table ends--}}
        </div>
    </div>


@endsection

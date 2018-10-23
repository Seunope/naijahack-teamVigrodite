@extends('layouts.user-master')

@section('title', ' Courses of my school')

@if(Auth::check() && isset(Auth::user()->department))
    @section('title',   Auth::user()->department->name.' '.Auth::user()->level->name.' courses')
    @section('description', Auth::user()->school->name.' '.Auth::user()->department->name.' '.Auth::user()->level->name.' courses')
    @section('keywords', Auth::user()->school->name.' courses', Auth::user()->department->name,Auth::user()->level->name, Auth::user()->school->name.' '.Auth::user()->department->name.' '.Auth::user()->level->name.' courses')
@else
    @section('title',   'Courses in my department')
@endif

@section('content')

    <div class="content">
        <div class="section background-opacity page-title set-height-top">
            <div class="container">
                <div class="page-title-wrapper"><!--.page-title-content--><h2 class="captions">Courses</h2>
                    <ol class="breadcrumb">
                        <li><a href="/">Home</a></li>
                        <li class="active"><a href="#">courses</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="section teacher-course section-padding">
            <div class="container teacher-course-wrapper">
                <div class="underline">Courses</div>
                <div class="course-table">
                    <div class="outer-container" style="position: relative;">
                        <div class="inner-container" style="">
                            <div class="table-header">
                                <table class="edu-table-responsive">
                                    <thead>
                                    <tr class="heading-table">
                                        <th class="col-1">id</th>
                                        <th class="col-2">course code</th>
                                        <th class="col-2">course name</th>
                                        <th class="col-3">level</th>
                                        <th class="col-4">timeline</th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                            <div class="table-body">
                                <table class="edu-table-responsive table-hover">
                                    <tbody>
                                    @foreach($courses as $course)
                                        {{--@foreach($course->faculty as $faculty)--}}
                                        {{--<tr class="table-row">--}}
                                        {{--<td class="col-1" colspan="5"><strong><span>{{$faculty->name}}</span></strong></td>--}}
                                        {{--</tr>--}}
                                        {{--@endforeach--}}
                                        <tr class="table-row">
                                            <td class="col-1"><span>{{$num++}}</span></td>
                                            <td class="col-2"><a href="/course/{{$course->slug}}">{{$course->code or ''}}</a></td>
                                            <td class="col-2"><a href="/course/{{$course->slug}}">{{$course->title or ''}}</a></td>
                                            <td class="col-3"><span>{{$course->level->name or ''}}</span></td>
                                            <td class="col-4"><span>{{$course->created_at}}</span></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{ $courses->render() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
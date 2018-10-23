@extends('layouts.admin-master')

@section('title', 'Admin schools home')

@section('content')

<div id="page-wrapper">
        <!-- <div class="panel panel-primary">
        <div class="panel-heading"> -->
            <h3 class="panel-title text-center"><i class="fa fa-star"></i> {{$faculty->name or ''}} </h3>
            <div class="panel panel-primary"></div>
            <!-- </div>
        </div> -->
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">

                <h5>Faculty name: <i>{{$faculty->name or ''}} -({{$faculty->full_name or ''}})</i></h5>

                <h5>No of dept: <i>{{count($faculty->departments) or ''}} Departments</i></h5>

                <a href="/admin/faculties/{{$faculty->slug or ''}}/edit">Edit</a>
                
                <div class="panel panel-primary"></div>

                @if($faculty->departments == '')
                No Department
                @else

                <div class="list-group center">
                    @foreach($faculty->departments as $department)
                    <a href="/admin/departments/{{$department->slug or ''}}" class="list-group-item">{{$num++}}). {{$department->name or ''}}-  {{$department->full_name or ''}}</a>
                    @endforeach
                </div>
                @endif
            </div>
            <div class="col-md-3"></div>
            <div class="show-paginate">
            </div>
        </div>
        <center><a href="{{URL::to('/admin/faculties') or ''}}" class="btn btn-success btn-sm back-button"><i class="fa fa-arrow-left"></i> Back</a>  </center>
    </div>


    @endsection

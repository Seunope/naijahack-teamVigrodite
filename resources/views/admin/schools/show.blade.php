@extends('layouts.admin-master')

@section('title', 'Admin schools home')

@section('content')

    <div id="page-wrapper">
        <!-- <div class="panel panel-primary">
            <div class="panel-heading"> -->
                <h3 class="panel-title text-center"><i class="fa fa-star"></i> {{$school->name or ''}} </h3>
                <div class="panel panel-primary"></div>
           <!--  </div>
        </div> -->
            <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">

                    <h5>School name: <i>{{$school->name or ''}} -({{$school->full_name or ''}})</i></h5>

                    <h5>Co-ordinator: <i>{{$school->user->name or 'N/A'}}</i></h5>

                    <a href="/admin/schools/{{$school->slug or ''}}/edit">Edit</a>
                    
                    <div class="panel panel-primary"></div>
                        @if($school->faculties == '')
                            No Faculty
                        @else

                            <div class="list-group center">
                            @foreach($school->faculties as $faculty)
                                    {{--<th scope="row">{{$num++}}</th>--}}
                                    <a href="/admin/faculties/{{$faculty->slug or ''}}" class="list-group-item">{{$num++}}). {{$faculty->name or ''}}-  {{$faculty->full_name or ''}}</a>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="col-md-3"></div>
                    <div class="show-paginate">
                    </div>
            </div>
            <center><a href="{{URL::to('/admin/schools') or ''}}" class="btn btn-success btn-sm back-button"><i class="fa fa-arrow-left"></i> Back</a></center>
    </div>


@endsection

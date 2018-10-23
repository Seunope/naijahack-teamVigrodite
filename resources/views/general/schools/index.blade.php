@extends('layouts.user-master')

@section('title', 'List of university you can find their questions on sol.ng')
@section('description', 'List of universities schools you can find their past questions on sol.ng')
@section('keywords')@foreach($schools as $school){{$school->name or ''}},@endforeach @endsection
@section('content')
    {{--search index--}}
    <div class="row">
        <div class="col-md-9">
            <div class="section">
                {{--SEARCH PANEL BEGINS--}}
                <div class="search-input" style="margin-top: 10px">
                    <div class="search-input-wrapper small_search_panel">
                        {!! Form::open(['method'=>'GET','role'=>'search','action'=>'SearchController@search']) !!}
                        {!! Form::text('string', null,['class'=>'searchInput', 'required'=>'', 'placeholder'=>'Search your question...','style'=>'background-color: white']) !!}
                        <button class="searchButton"><span class="fa fa-search visible-sm visible-xs hidden-lg hidden-md"></span><span class="hidden-xs hidden-sm">Search now</span></button>
                        {!! Form::close() !!}
                    </div>
                </div>
                {{--SEARCH PANEL ENDS--}}
            </div>

            {{--Schools begins--}}
            <div class="section section-padding choose-course-2">
                <div class="group-title-index"><h4 class="top-title">CHOOSE YOUR SCHOOL</h4>
                    <h2 class="center-title">SCHOOLS AVAILABLE ON SOL.NG</h2>
                    <div class="bottom-title">
                        <i class="bottom-icon icon-a-1-01-01">
                            @include('partial.user.title-brand')
                        </i>
                    </div>
                </div>
                <div class="choose-course-wrapper row">
                    @foreach($schools as $school)
                        @php $total = 0; $i=0; @endphp
                        @foreach ($school->courses as $course)
                            @php $i+=1;
                                        $cour[$i] = count(DB::table('questions')->where('course_id', $course->id)->get());
                                        $total+=$cour[$i];
                            @endphp
                        @endforeach
                        <div class="col-md-4 col-xs-6">
                            <div class="item-course">
                                <div class="icon-course">
                                    @if(isset($school->path[15]))
                                        <img src="{{$school->path or ''}}" id="school-image" alt="">
                                    @else
                                        <label style="border: solid #242c42; width: 87px; color: #86bc42;" class="img-circle icons-img icon-globe">{{$school->name[0]}}</label>
                                    @endif
                                </div>
                                <a href="/general/schools/{{$school->slug or ''}}">
                                    <div class="info-course">
                                        <div class="name-course">{{$school->name or ''}}</div>
                                        <div class="info">Up to <b>{{$total or ''}}</b> past questions and answers.</div>
                                    </div>
                                </a>
                                <div class="hidden-xs hidden-sm hidden-md hover-text">
                                    <div class="wrapper-hover-text">
                                        <div class="wrapper-hover-content"><a href="/general/schools/{{$school->slug or ''}}" class="title">{{$school->full_name or ''}}</a>
                                            <div class="content"> There are up to {{$total or ''}} past questions and answers in {{$school->full_name or ''}} for you to access free of charge.</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            {{--Schools end--}}

        </div>
        @include('partial.user.sidebar')
    </div>
    {{--<!-- LOADING-->--}}
    {{--<div class="body-2 loading">--}}
    {{--<div class="dots-loader"></div>--}}
    {{--</div>--}}
    <!-- JAVASCRIPT LIBS-->
    <script src="{{url('assets/libs/owl-carousel-2.0/owl.carousel.min.js')}}"></script>
    <!-- MAIN JS-->
    <script src="{{url('assets/js/main.js')}}"></script>
    <!-- LOADING SCRIPTS FOR PAGE-->

@endsection






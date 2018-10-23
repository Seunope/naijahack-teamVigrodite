@extends('layouts.admin-master')

@section('title', 'Admin schools levels')

@section('content')

    <div id="page-wrapper">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-suitcase"></i> All levels</h3>
            </div>
            <div class="panel-body">
                {{--Table begins--}}
                <div class="bs-example" id="" >






                    <table class="table table-bordered table-striped">
                        <thead class="table-head">
                        <tr>
                            <th>ID</th>
                            <th>Level name</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($levels as $level)
                        <tr>
                            <th scope="row">{{$num++}}</th>
                            <td>{{$level->name}}</td>
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
                    {{--<a href="{{URL::to('/admin/levels/create')}}" class="btn btn-primary btn-sm pull-right"><i class="fa fa-plus"></i> Add a new level</a>--}}
                </div>
            </div>
            {{--Table ends--}}
        </div>
    </div>


@endsection

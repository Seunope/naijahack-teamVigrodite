@extends('layouts.admin-master')

@section('title', 'Testimonies')

@section('content')

    <div id="page-wrapper">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><span class="glyphicon glyphicon-testimony" aria-hidden="false"></span> All testimonys</h3>
            </div>
            <div class="panel-body">
                {{--Table begins--}}
                <div class="bs-example" >

                    <table class="table table-bordered table-striped sui-table sui-hover sui-selectable">
                        <caption>Testimonies.</caption>
                        <thead class="table-head">
                        <tr>
                            <th>ID</th>
                            <th>Pics</th>
                            <th>Name</th>
                            <th>Body </th>
                            <th>Email </th>
                            <th>Visibility</th>
                            <th>Posted on</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($testimonies)>0)
                            @foreach($testimonies as $testimony)
                                <tr class="sui-row">
                                    <th class="sui-cell" scope="row">{{$num++}}</th>
                                    <td class="sui-cell">
                                        @if(isset($testimony->path[4]))
                                            <img src="{{$testimony->path or ''}}" alt="" class="img-responsive" style="width: 80px; height: 80px;"/>
                                        @else
                                            <img src="/User_images/avatar3.jpg" alt="" class="img-responsive"/>
                                    @endif                                    <td class="sui-cell">{{$testimony->name}}</td>
                                    <td class="sui-cell">{{ str_limit($testimony->body, $limit = 80, $end = '...') }}
                                        <a href='/admin/testimonies/{{$testimony->slug}}'>more</a></td>
                                    <td class="sui-cell">{{$testimony->email}}</td>
                                    <td class="sui-cell">
                                        {!! Form::open(['method'=>'PATCH','action'=>['TestimonyController@update',$testimony->slug]]) !!}
                                        <button class="btn btn-link">
                                            @if($testimony->visibility == 1)
                                                <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                                            @else
                                                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                                            @endif
                                        </button>
                                        {!! Form::close() !!}
                                    </td>
                                    <td class="visible-lg visible-md hidden-xs hidden-sm sui-cell">{{$testimony->created_at->diffForHumans()}}</td>
                                </tr>
                            @endforeach
                        @else
                            No Testimonies
                        @endif

                        </tbody>
                    </table>







                    {{--Paggination begins--}}
                    <div class="text-center pagination">123
                        {{--{!! $dept->render() !!}--}}
                    </div>
                    {{--Paggination ends--}}
                    <a href="{{URL::to('/admin/testimonies/')}}" class="btn btn-primary btn-sm pull-right">
                        <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                    </a>
                </div>
            </div>
            {{--Table ends--}}
        </div>
    </div>


@endsection
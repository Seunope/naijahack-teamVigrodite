@extends('layouts.admin-master')

@section('title', 'Testimonies')

@section('content')

    <div id="page-wrapper">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><span class="glyphicon glyphicon-suggestion" aria-hidden="false"></span> All suggestions</h3>
            </div>
            <div class="panel-body">
                {{--Table begins--}}
                <div class="bs-example" >

                    <table class="table table-bordered table-striped sui-table sui-hover sui-selectable">
                        <caption>Suggestions.</caption>
                        <thead class="table-head">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Body </th>
                            <th>Email </th>
                            <th>Posted on</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($suggestions)>0)
                            @foreach($suggestions as $suggestion)
                                <tr class="sui-row">
                                    <th class="sui-cell" scope="row">{{$num++}}</th>
                                    <td class="sui-cell">{{$suggestion->name}}</td>
                                    <td class="sui-cell">{{ str_limit($suggestion->body, $limit = 80, $end = '...') }}
                                        <a href='/admin/testimonies/{{$suggestion->slug}}'>more</a></td>
                                    <td class="sui-cell">{{$suggestion->email}}</td>
                                    <td class="visible-lg visible-md hidden-xs hidden-sm sui-cell">{{$suggestion->created_at->diffForHumans()}}</td>
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
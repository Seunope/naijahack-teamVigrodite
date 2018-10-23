@extends('layouts.admin-master')

@section('title', 'Admin roles home')

@section('content')

    <div id="page-wrapper">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> All Roles</h3>
            </div>
            <div class="panel-body">
                {{--Table begins--}}
                <div class="bs-example" >






                    <table class="table table-bordered table-striped sui-table sui-hover sui-selectable">
                        <caption>Role.</caption>
                        <thead class="table-head">
                        <tr>
                            <th>ID</th>
                            <th>Role <span class="glyphicon glyphicon-user" aria-hidden="true"></span></th>
                            <th>Discription <span class="glyphicon glyphicon-home" aria-hidden="true"></span></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($roles as $role)
                            <tr class="sui-row">
                                <th class="sui-cell" scope="row">{{$num++}}</th>
                                <td class="sui-cell">{{$role->title or 'N/A'}}</td>
                                <td class="sui-cell">{{$role->description or 'N/A'}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>







                    {{--Paggination begins--}}
                    <div class="text-center pagination">123
                        {{--{!! $dept->render() !!}--}}
                    </div>
                    {{--Paggination ends--}}
                    <a href="{{URL::to('/admin/roles/create')}}" class="btn btn-primary btn-sm pull-right"> + Add a new Role</a>
                </div>
            </div>
            {{--Table ends--}}
        </div>
    </div>


@endsection

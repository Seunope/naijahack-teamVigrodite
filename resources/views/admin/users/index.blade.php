@extends('layouts.admin-master')

@section('title', 'Admin Users home')

@section('content')

    <div id="page-wrapper">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><span class="glyphicon glyphicon-user" aria-hidden="false"></span> All users</h3>
            </div>
            <div class="panel-body">
                    {{--Table begins--}}
                <div class="bs-example" >

                    <table class="table table-bordered table-striped sui-table sui-hover sui-selectable">
                        <caption>School.</caption>
                        <thead class="table-head">
                        <tr>
                            <th>ID</th>
                            <th>User name <span class="glyphicon glyphicon-user" aria-hidden="true"></span></th>
                            <th>School <span class="glyphicon glyphicon-home" aria-hidden="true"></span></th>
                            <th>Phone <span class="glyphicon glyphicon-phone" aria-hidden="true"></span></th>
                            <th>Email <span class="glyphicon glyphicon-send" aria-hidden="true"></span></th>
                            <th>Level <span class="glyphicon glyphicon-stats" aria-hidden="true"></span></th>
                            <th>Dept<span class="glyphicon glyphicon-book" aria-hidden="true"></span></th>
                            <th>Role<span class="glyphicon glyphicon-stats" aria-hidden="true"></span></th>
                            <th class="visible-lg visible-md hidden-xs hidden-sm">Coin<span class="glyphicon glyphicon-credit-card" aria-hidden="true"></span></th>
                            <th class="visible-lg visible-md hidden-xs hidden-sm">Joined</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr class="sui-row">
                                <th class="sui-cell" scope="row">{{$num++}}</th>
                                <td class="sui-cell"><a href="/admin/users/{{$user->slug}}">{{$user->name}}</a></td>
                                <td class="sui-cell">{{$user->school->name or 'no phone number yet'}}</td>
                                <td class="sui-cell">{{$user->phone->number or 'no phone number yet'}}</td>
                                <td class="sui-cell">{{$user->email}}</td>
                                <td class="sui-cell">{{$user->level->name or 'n/a'}}</td>
                                <td class="sui-cell">{{$user->department->name or 'n/a'}}</td>
                                <td class="sui-cell">{{$user->role->title or 'n/a'}}</td>
                                <td class="visible-lg visible-md hidden-xs hidden-sm sui-cell">{{$user->credit->value or 'n/a'}}<img src="/assets/images/coins2.png" style="width: 20px"></td>
                                <td class="visible-lg visible-md hidden-xs hidden-sm sui-cell">{{$user->created_at->diffForHumans()}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>







                    {{--Paggination begins--}}
                    <div class="text-center pagination">123
                        {{--{!! $dept->render() !!}--}}
                    </div>
                    {{--Paggination ends--}}
                    <a href="{{URL::to('/admin/users/')}}" class="btn btn-primary btn-sm pull-right">
                        <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                    </a>
                </div>
            </div>
                    {{--Table ends--}}
        </div>
    </div>


@endsection
@extends('layouts.admin-master')

@section('title', 'Admin faculties home')

@section('content')

    <div id="page-wrapper">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> All mails by me</h3>
            </div>
            @if(Session::has('status'))
                <div class="alert alert-success alert-dismissable" ><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>{{Session('status')}}<span class="fa fa-check"></span></div>
            @endif
            <div class="panel-body">
                {{--Table begins--}}
                <div class="bs-example" >

                    @if(count($mails)>0)
                    <table class="table table-bordered table-striped">
                        <thead class="table-head">
                        <tr>
                            <th>ID</th>
                            <th>Subject</th>
                            <th>Body of mail</th>
                            <th>To</th>
                            <th>Author</th>
                            {{--<th>From sol.ng</th>--}}
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($mails as $mail)
                            <tr>
                                <th scope="row">{{$num++}}</th>
                                <td><a href="/admin/faculties/{{$mail->slug}}">{{$mail->subject}}</a></td>
                                <td>{{$mail->body}}</td>
                                <td>{{$mail->to}}</td>
                                <td>{{$mail->user->name}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @else
                        <div class="red">No mails record</div>
                    @endif

                        <a href="mailToOne/create" class="pull-right">Compose <i class="fa fa-pencil"></i></a>
                    {{--Paggination begins--}}
                    <div class="text-center pagination">123
                        {{--{!! $dept->render() !!}--}}
                    </div>
                    {{--Paggination ends--}}
                </div>
            </div>
            {{--Table ends--}}
        </div>
    </div>


@endsection

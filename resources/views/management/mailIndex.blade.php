@extends('layouts.admin-master')

@section('title', 'Management')

@section('content')


    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1>Dashboard <small>Dashboard Home</small></h1>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    Welcome to the admin dashboard! Feel free to upload question and answers.
                    <br />
                    If there is anything you don't understand feel free to inbox "info@sol.ng" we reply you.
                </div>
            </div>
            <h3><i class="glyphicon glyphicon-send"></i><a href="/mailToOne">Send mail To one</a></h3>
            <h3><i class="glyphicon glyphicon-send"></i><a href="">Send mail To department</a></h3>
            <h3><i class="glyphicon glyphicon-send"></i><a href="">Send mail To Department level</a></h3>
            <h3><i class="glyphicon glyphicon-send"></i><a href="">Send mail To School</a></h3>
            <h3><i class="glyphicon glyphicon-send"></i><a href="">Send mail To All Students</a></h3>
        </div>

    </div>


@endsection
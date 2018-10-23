@extends('layouts.admin-master')

@section('title', 'Admin add new faculty')

@section('content')


    <div id="page-wrapper">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h3>Send a new Mail to a individual</h3>
                <div class="panel panel-primary"></div>
                {!! Form::open(['method'=>'POST','action'=>'MailToOneController@store']) !!}
                {{ csrf_field() }}

                <div class="form-group">
                    {!! Form::label('to_id', 'Recipient') !!}
                    {!! Form::select('to_id', $users ,null,['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('subject', 'Subject') !!}
                    {!! Form::text('subject',null,['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('body', 'Body') !!}
                    <textarea name="body" id="description" cols="30" rows="10" class="summernote"></textarea>
                </div>

                <button type="button" class="pull-right" data-toggle="modal" data-target="#sendMail"><i class="fa fa-send"></i>Send mail</button>
                <div class="modal fade" id="sendMail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog smlr" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h4 class="modal-title pull-center" id="myModalLabel">Are you sure you want to send this mail?</h4>
                            </div>
                            <div class="modal-footer">
                                {!! Form::submit('Yes' ,['class'=>'pull-left']) !!}
                                {!! Form::button('No ',['class'=>'', 'data-dismiss'=>'modal']) !!}
                            </div>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
    <!-- /.row -->
@endsection
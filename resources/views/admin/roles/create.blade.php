@extends('layouts.admin-master')

@section('title', 'Admin add new role')

@section('content')


    <div id="page-wrapper">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h3>Add new Role</h3>
                <div class="panel panel-primary"></div>

                {!! Form::open(['method'=>'POST','action'=>'AdminRolesController@store']) !!}
                {{ csrf_field() }}

                <div class="form-group">
                    {!! Form::label('title', 'Name') !!}
                    {!! Form::text('name',null,['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('title', 'Role Description') !!}
                    {!! Form::textarea('name',null,['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('Add new Role',['class'=>'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
                <a href="{{URL::to('/admin/roles')}}" class="btn btn-primary btn-sm pull-right">Home</a>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
    <!-- /.row -->
    </div>
    {{--</div>--}}
    <!-- /.row -->
    </div>


@endsection
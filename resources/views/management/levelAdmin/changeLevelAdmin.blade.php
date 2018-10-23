@extends('layouts.admin-master')

@section('title', 'Change Level Admin')

@section('content')


    @if(isset($users))
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                {!! Form::model($users,['method'=>'PATCH','action'=>['LevelAdminController@hundred_update', $hundredAdminSlug]]) !!}
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="user_id">Choose Co-rdinator for {{$department->name}} 100L</label><br>
                    <select name="user_id" id="" class="">
                        @foreach($users as $user)
                            <option value="{{$user->id}}">{{$user->name or ''}}</option>
                        @endforeach
                    </select>
                </div>
                {!! Form::hidden('department_slug',$department->slug) !!}
                {!! Form::submit('Save changes',['class'=>'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>
            <div class="col-md-3"></div>
        </div>
    @else
        <div class="red">something is wrong!</div>
    @endif
@endsection
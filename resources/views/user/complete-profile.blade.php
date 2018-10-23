@extends('layouts.user-master-no-nav')

@section('title', ' complete your profile')

@section('content')

    <div class="page-login rlp">
        <div class="container">
            <div class="login-wrapper rlp-wrapper">
                <div class="login-table rlp-table"><a href="/">
                        <img src="assets/images/logo-color-1.png" alt="" class="login"/></a>

                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>
                                        {{$error}}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    {{--<div class="login-title rlp-title">quickly complete your profile! And receive 20 coins <img src="assets/images/coins2.png" class="coinImage"> free for start</div>--}}
                    <div class="login-title rlp-title">Complete your profile by selecting your level and department for quicker access to your past questions and answers! </div>
                    {!! Form::model(Auth::user(),['method'=>'PATCH','action'=>['UserDetailsController@update',Auth::user()->slug]]) !!}
                    {{ csrf_field() }}
                    <div class="login-form bg-w-form rlp-form">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="department_id" class="control-label form-label white-bg">select your department in <span class="highlight">{{Auth::user()->school->name}} *</span></label>

                                <select name="department_id" class="form-control form-input all-input big_input_text">
                                    <option value="0">No department yet</option>
                                    @foreach($faculties as $faculty)
                                        @foreach($faculty->departments as $department)
                                            <option value="{{$department->id or '' }}">{{$department->name or '' }}</option>
                                        @endforeach
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12"><label for="regemail" class="control-label form-label white-bg">select your level <span class="highlight">*</span></label>
                            {!! Form::select('level_id', $levels ,null,['class'=>'form-control form-input all-input']) !!}
                            <!--p.help-block Warning !-->
                            </div>
                        </div>
                    {{--<div class="row">--}}
                    {{--<div class="col-md-12"><label for="number" class="control-label form-label white-bg">phone <span class="highlight">*</span></label>--}}
                    {{--<div class="col-md-12">--}}
                    {{--<label for="number" class="control-label form-label white-bg">phone (Optional)</label>--}}
                    {{--                            {!! Form::text('number',null,['class'=>'form-control form-input all-input', 'required'=>'']) !!}--}}
                    {!! Form::hidden('number',0) !!}                            <!--p.help-block Warning !-->
                        {{--</div>--}}
                        {{--</div>--}}
                        <div class="row">
                            {!! Form::hidden('user_id',Auth::user()->id) !!}
                            {{--                        {!! Form::submit('Complete registration',['class'=>'completeProfileButton']) !!}--}}
                            <input type="submit" value="Complete registration" class="completeProfileButton" style="width: 291px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection
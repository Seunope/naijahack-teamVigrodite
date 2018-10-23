@extends('layouts.user-master-no-nav')

@section('title', ' edit your profile')

@section('content')



<div class="page-login rlp">
    <div class="container">
        <div class="login-wrapper rlp-wrapper">
            <div class="login-table rlp-table"><a href="/"><img src="assets/images/logo-color-1.png" alt="" class="login"/></a>
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
                <div class="login-title rlp-title">edit your profile</div>
                {!! Form::model(Auth::user(),['method'=>'PATCH','action'=>['UserDetailsController@update_profile',Auth::user()->slug], 'files'=>true]) !!}
                {{ csrf_field() }}
                <div class="login-form bg-w-form rlp-form">
                    <div class="row">
                        <div class="col-md-12"><label for="Name" class="control-label form-label white-bg">name </label>
                            {!! Form::text('name',null,['class'=>'form-control form-input all-input', 'required'=>'']) !!}
                            {!! Form::hidden('user_id',Auth::user()->id,null,['class'=>'form-control form-input all-input']) !!}
                            <!--p.help-block Warning !-->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12"><label for="regemail" class="control-label form-label white-bg">select your level </label>
                            {!! Form::select('level_id', $levels ,null,['class'=>'form-control form-input all-input']) !!}
                            <!--p.help-block Warning !-->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="department_id" class="control-label form-label white-bg">Select Department</label>
                            <select name="department_id" class="form-control form-input all-input big_input_text">
                                <option value="0">No department yet</option>
                                @foreach($faculties as $faculty)
                                @foreach($faculty->departments as $department)
                                <option 
                                @if(isset(Auth::user()->department))
                                @if($department->id==Auth::user()->department->id)
                                selected=""
                                @endif
                                @endif
                                value="{{$department->id or '' }}">{{$department->name or '' }}</option>
                                @endforeach
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12"><label for="number" class="control-label form-label white-bg">phone </label>
                            {!! Form::text('number',$number,['class'=>'form-control form-input all-input', 'required'=>'']) !!}
                            <!--p.help-block Warning !-->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12"><label for="number" class="control-label form-label white-bg">Choose Dp(Optional) </label>
                            <input type="file" name="file">
                            <!--p.help-block Warning !-->
                        </div>
                    </div>
                    <div class="row">
                        {!! Form::submit('Save',['class'=>'completeProfileButton']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection
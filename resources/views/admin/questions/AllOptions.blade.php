{!! Form::open(['method'=>'POST','action'=>'AllOptionsController@store', 'id'=>'question_form']) !!}
{{  csrf_field() }}

<div class="row">
    {!! Form::label('number', 'Number:', ['class'=>'col-md-1']) !!}
    <div class="col-md-2">
        {!! Form::text('number',null,['class'=>'form-control']) !!}
    </div>
</div>
<div class="litle-space"></div>

<div class="row">
    {!! Form::label('body', 'Question:', ['class'=>'col-md-1']) !!}
    <div class="col-md-10">
        <textarea name="" id="question_body" cols="30" rows="10" required></textarea>
        <textarea name="body" id="question_text" hidden required></textarea>
    </div>
</div>
<div class="litle-space"></div>
{!! Form::hidden('course_id', $course->id ,null,['class'=>'form-control']) !!}
{!! Form::hidden('year_id', $year->id ,null,['class'=>'form-control']) !!}

<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-4 form-group">
        <div id="topicExisting">
            {!! Form::label('topic_id', 'Select topic from existing topics') !!}
            {!! Form::select('topic_id', $topics ,null,['class'=>'form-control']) !!}
        </div>
        <input name="topicCheckBox" type="checkbox" id="topicCheckBox" onclick="topicToggle();">
        <label for="topicCheckBox" id="topicLabel">Click here if the topic is not existing.</label>
        <div id="topicDiv" hidden>
            {!! Form::label('topic', 'New Topic') !!}
            {!! Form::text('topic', null,['class'=>'form-control', 'id'=>'topicNew']) !!}
        </div>
    </div>
    <div class="col-md-3 form-group">
        {!! Form::label('user_id', 'Posting as ') !!}
        {!! Form::select('user_id', $users ,null,['class'=>'form-control']) !!}
    </div>
</div>

{{--A--}}
<div class="row">
    <div class="col-md-1">
        {!! Form::label('bodyA', 'OptionA') !!}:
    </div>
    <div class="col-md-10">
        <textarea name="bodyA" id="option_a_text" hidden></textarea>
        {!! Form::textarea('',null,['class'=>'form-control options', 'id'=>'option_a_body', 'placeholder'=>'Option a here...', 'required'=>'required']) !!}
        {!! Form::hidden('user_id', Auth::user()->id ,null,['class'=>'form-control']) !!}
    </div>
</div>
<div class="litle-space"></div>

{{--B--}}
<div class="row">
    <div class="col-md-1">
        {!! Form::label('bodyB', 'OptionB') !!}:
    </div>
    <div class="col-md-10">
        <textarea name="bodyB" id="option_b_text" hidden></textarea>
        {!! Form::textarea('',null,['class'=>'form-control options', 'id'=>'option_b_body', 'placeholder'=>'Option b here...', 'required'=>'required']) !!}
    </div>
</div>
<div class="litle-space"></div>

{{--C--}}
<div class="row">
    <div class="col-md-1">
        {!! Form::label('bodyC', 'OptionC') !!}:
    </div>
    <div class="col-md-10">
        <textarea name="bodyC" id="option_c_text" hidden></textarea>
        {!! Form::textarea('',null,['class'=>'form-control options', 'id'=>'option_c_body', 'placeholder'=>'Option c here...', 'required'=>'required']) !!}
    </div>
</div>
<div class="litle-space"></div>

{{--D--}}
<div class="row">
    <div class="col-md-1">
        {!! Form::label('bodyD', 'OptionD') !!}:
    </div>
    <div class="col-md-10">
        <textarea name="bodyD" id="option_d_text" hidden></textarea>
        {!! Form::textarea('',null,['class'=>'form-control options', 'id'=>'option_d_body', 'placeholder'=>'Option d here...', 'required'=>'required']) !!}
    </div>
</div>
<div class="litle-space"></div>

{{--Correct Option--}}
<div class="row">
    <div class="col-md-1">
        {!! Form::label('correctOption', 'Select The Correct Option:') !!}
    </div>
    <div class="col-md-1">
        {!! Form::select('correctOption', [0=>'A',1=>'B',2=>'C',3=>'D'] ,null,['class'=>'form-control']) !!}
    </div>
</div>
<div class="litle-space"></div>


{!! Form::close() !!}
<div class="litle-space"></div>

<div class="row">
    <div class="col-md-1">
    </div>
    <div class="col-md-10">
        <input type="button" class="btn btn-primary pull-center" value="Upload All" onclick="create();">
    </div>
</div>



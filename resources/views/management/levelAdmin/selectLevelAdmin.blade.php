@if(isset($department->hundred))
    <h4>{{$department->hundred->slug or 'N/A'}} {{$department->name or 'N/A'}} 100L Co-ordinator: <i>{{$department->hundred->user->name or 'N/A'}}</i>
        <small><a href="/hundred_admin_edit/{{$department->hundred->slug or ''}}">Change</a></small></h4>
@else
    <div>
        {!! Form::open(['method'=>'POST','action'=>'LevelAdminController@hundred_store']) !!}
        Choose {{$department->name or 'N/A'}} 100L Co-ordinator:
        <select name="user_id" id="" class="">
            @foreach($department->users as $user)
                <option value="{{$user->id}}">{{$user->name or ''}}</option>
            @endforeach
        </select>
        {!! Form::hidden('department_id', $department->id ,null,['class'=>'form-control']) !!}
        {!! Form::submit('Save' ,null,['class'=>'']) !!}
        {!! Form::close() !!}
    </div>
@endif
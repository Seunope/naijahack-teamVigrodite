@if(isset($question->correctOption))
    <!-- Modal -->
    <div class="row">
        <div class="col-md-0">
            <div class="modal fade" id="EditCorrectOption" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel">Edit Correct option </h4>
                        </div>
                        <div class="modal-body">
                            {!! Form::model($question->correctOption,['method'=>'PATCH','action'=>['CorrectOptionsController@update',$question->correctOption->slug]]) !!}
                            {{ csrf_field() }}
                            <div class="form-group">
                                {!! Form::select('correctOption', [0=>'A',1=>'B',2=>'C',3=>'D'] ,null,['class'=>'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::submit('Change',['class'=>'btn btn-primary']) !!}
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <span>Correct Answer: </span>
            <strong>@if($question->correctOption->correctOption==0) A @elseif($question->correctOption->correctOption==1) B @elseif($question->correctOption->correctOption==2) C @else D @endif</strong>
            <button type="button" class="btn btn-sm btn-link" data-toggle="modal" data-target="#EditCorrectOption">Edit&nbsp;</button>
        </div>
    </div>

    <div class="litle-space"></div>
@else
    <div class="row">
        {!! Form::open(['method'=>'POST','action'=>'CorrectOptionsController@store']) !!}
        {{  csrf_field() }}
        <div class="col-md-1"></div>
        <div class="col-md-4">
            <span>Choose correct option</span>
            {!! Form::select('correctOption', [0=>'A',1=>'B',2=>'C',3=>'D'] ,null,['style'=>'width:50px']) !!}
            {!! Form::hidden('question_id', $question->id ,null) !!}
            {!! Form::submit('Add',['class'=>'btn btn-primary btn-sm']) !!}
        </div>
        {!! Form::close() !!}
    </div>
    <div class="litle-space"></div>
@endif
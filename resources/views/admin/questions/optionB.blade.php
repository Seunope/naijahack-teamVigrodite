@if(isset($optionB))
    <!-- Modal -->
    <div class="row">
        <div class="col-md-1">
            {!! Form::label('body', 'OptionB') !!}:
        </div>
        <div class="col-md-10">
            <div class="modal fade" id="EditOptionB" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel">Edit option B</h4>
                        </div>
                        <div class="modal-body">
                            {!! Form::model($optionB,['method'=>'PATCH','id'=>'edit_option_b_form','action'=>['OptionBsController@update',$optionB->slug]]) !!}
                            {{  csrf_field() }}
                            <div class="form-group">
                                <textarea name="" id="edit_option_b_body" required>{{$optionB->body or ''}}</textarea>
                                <textarea name="body" id="edit_option_b_text" hidden></textarea>
                                {!! Form::hidden('question_id', $question->id ,null,['class'=>'form-control']) !!}
                                {!! Form::hidden('user_id', Auth::user()->id ,null,['class'=>'form-control']) !!}
                            </div>
                            {!! Form::close() !!}
                            <div class="form-group">
                                <input type="button" class="btn btn-primary" value="Edit" onclick="edit_b();">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <p>{!!$optionB->body or ''!!}</p>


            @if(($optionB->imageB != null))
                <div class="row">
                    @foreach($optionB->imageB as $imageB)
                        <div class=" @if($imageB->size ==1) col-md-4 col-sm-4 col-xs-4 @elseif($imageB->size ==2) col-sm-6 col-md-6 col-xs-6 @else col-md-12 col-sm-12 col-xs-12 @endif">
                            <img src="{{$imageB->path or ''}}" alt="{{$imageB->label or ''}}" class="question_image"  title="{{$imageB->label or ''}}" >
                            <br>{{$imageB->label}}
                            <a href="/imageB/{{$imageB->slug or ''}}/edit" class="btn btn-link btn-sm">Edit</a>
                        </div>
                    @endforeach
                </div>
            @else
                No image
            @endif
            {{--Display all question image ends--}}

            {{--Button to add image begins--}}
            <button type="button" class="btn btn-link btn-sm btn-start" data-toggle="modal" data-target="#AddOptionBImage">Attach image</button>
            <!-- Modal -->
            <div class="modal fade" id="AddOptionBImage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel">Add image to optionB</h4>
                        </div>
                        <div class="modal-body">
                            {{--Page title--}}
                            {!! Form::open(['method'=>'POST','action'=>'ImageBsController@store', 'files'=>true]) !!}
                            {{  csrf_field()  }}

                            <div class="form-group">
                                {!! Form::label('label', 'Image Label') !!}
                                {!! Form::text('label',null,['class'=>'form-control']) !!}
                            </div>

                            {!! Form::hidden('option_b_id', $optionB->id ,null,['class'=>'form-control']) !!}
                            {!! Form::hidden('user_id', Auth::user()->id ,null,['class'=>'form-control']) !!}

                            <div class="form-group">
                                {!! Form::label('file', 'Choose Image') !!}
                                {!! Form::file('file' ,null,['class'=>'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('label', 'Choose size') !!}
                                {!! Form::select('size', ['1'=>'Small','2'=>'Medium','3'=>'Big'] ,null,['class'=>'form-control']) !!}
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            {!! Form::submit('Add Image',['class'=>'btn btn-primary']) !!}
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            {{--MODAL ENDS--}}



        </div>
        <div class="col-md-1">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#EditOptionB"> Edit&nbsp;</button>
        </div>
    </div>
    <div class="litle-space"></div>
@else
    <div class="row">
        {!! Form::open(['method'=>'POST','id'=>'option_b_form','action'=>'OptionBsController@store', 'id'=>'option_b_form']) !!}
        {{  csrf_field() }}
        <div class="col-md-1">
            {!! Form::label('body', 'OptionB') !!}:
        </div>
        <div class="col-md-10">
            <textarea name="" id="option_b_body" required></textarea>
            <textarea name="body" id="option_b_text" hidden></textarea>
            {!! Form::hidden('question_id', $question->id ,null,['class'=>'form-control']) !!}
            {!! Form::hidden('user_id', Auth::user()->id ,null,['class'=>'form-control']) !!}
        </div>
        {!! Form::close() !!}
        <div class="col-md-1">
            <input type="button" class="btn btn-primary" value="Add" onclick="create_b();">
        </div>
    </div>
    <div class="litle-space"></div>
@endif
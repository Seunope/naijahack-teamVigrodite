<div class="row">
    <div class="col-md-1 col-sm-1 col-xs-1"></div>
    <div class="col-md-1 col-sm-2 col-xs-2" style="vertical-align: baseline">
        <span class="options">
        <label for="optionb{{$num-1}}" class="radioButtonLabel">B.</label>
            @if(isset($review))
                <input type="radio" id="optionb{{$num-1}}" class="options" name="option{{$num-1}}"  disabled  @if($review->selectedOptions[$num-2]==1) checked @endif>
            @else
                <input class="options" type="radio" name="option{{$num-1}}" value="1">
            @endif
        </span>
    </div>
    <div class="col-md-9 col-sm-9 col-xs-9 option" style="padding-left: 0;">
        @if(($question->optionb != null))
            {!!$question->optionb->body or ''!!}
            @if(($question->optionb->imageB != null))
                <div class="row">
                    @foreach($question->optionb->imageB as $imageB)
                        <div class=" @if($imageB->size ==1) col-md-4 col-sm-4 col-xs-4 @elseif($imageB->size ==2) col-sm-6 col-md-6 col-xs-6 @else col-md-12 col-sm-12 col-xs-12 @endif">
                            <img src="{{$imageB->path or ''}}" alt="{{$imageB->label or ''}}" class="question_image"  title="{{$imageB->label or ''}}" >
                            <br>{{$imageB->label}}
                        </div>
                    @endforeach
                </div>
            @endif
        @endif
    </div>
</div>
<div class="row">
    <div class="col-md-1 col-sm-1 col-xs-1"></div>
    <div class="col-md-1 col-sm-2 col-xs-2">
        <span class="options">
        <label for="optionc{{$num-1}}" class="radioButton">C.</label>
            @if(isset($review))
                <input type="radio" id="optionc{{$num-1}}" name="option{{$num-1}}"  disabled  @if($review->selectedOptions[$num-2]==2) checked @endif>
            @else
                <input type="radio" name="option{{$num-1}}" value="2">
            @endif
        </span>
    </div>
    <div class="col-md-9 col-sm-9 col-xs-9 option" style="padding-left: 0;">
        @if(($question->optionc != null))
            {!!$question->optionc->body or ''!!}
            @if(($question->optionc->imageC != null))
                <div class="row">
                    @foreach($question->optionc->imageC as $imageC)
                        <div class=" @if($imageC->size ==1) col-md-4 col-sm-4 col-xs-4 @elseif($imageC->size ==2) col-sm-6 col-md-6 col-xs-6 @else col-md-12 col-sm-12 col-xs-12 @endif">
                            <img src="{{$imageC->path or ''}}" alt="{{$imageC->label or ''}}" class="question_image"  title="{{$imageC->label or ''}}" >
                            <br>{{$imageC->label}}
                        </div>
                    @endforeach
                </div>
            @endif
        @endif
    </div>
</div>
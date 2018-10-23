<div class="row">
    <div class="col-md-1 col-sm-1 col-xs-1"></div>
    <div class="col-md-1 col-sm-2 col-xs-2">
        <span class="options">
        <label for="optiond{{$num-1}}" class="radioButton">D.</label>
            @if(isset($review))
                <input type="radio" id="optiond{{$num-1}}" name="option{{$num-1}}"  disabled  @if($review->selectedOptions[$num-2]==3) checked @endif>
            @else
                <input type="radio" name="option{{$num-1}}" value="3">
            @endif
        </span>
    </div>
    <div class="col-md-9 col-sm-9 col-xs-9 option" style="padding-left: 0;">
        @if(($question->optiond != null))
            {!!$question->optiond->body or ''!!}
            @if(($question->optiond->imageD != null))
                <div class="row">
                    @foreach($question->optiond->imageD as $imageD)
                        <div class=" @if($imageD->size ==1) col-md-4 col-sm-4 col-xs-4 @elseif($imageD->size ==2) col-sm-6 col-md-6 col-xs-6 @else col-md-12 col-sm-12 col-xs-12 @endif">
                            <img src="{{$imageD->path or ''}}" alt="{{$imageD->label or ''}}" class="question_image"  title="{{$imageD->label or ''}}" >
                            <br>{{$imageD->label}}
                        </div>
                    @endforeach
                </div>
            @endif
        @endif
    </div>
</div>
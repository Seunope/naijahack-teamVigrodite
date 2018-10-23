<div class="row">
    <div class="col-md-1 col-sm-1 col-xs-1"></div>
    <div class="col-md-1 col-sm-2 col-xs-2">
        <span class="options">
        <label for="optiona{{$num-1}}" class="radioButton">A.</label>
            @if(isset($review))
                <input type="radio" id="optiona{{$num-1}}" name="option{{$num-1}}"  disabled  @if($review->selectedOptions[$num-2]!='-' && $review->selectedOptions[$num-2]==0) checked @endif>
            @else
                <input type="radio" name="option{{$num-1}}" value="0">
            @endif
        </span>
    </div>
    <div class="col-md-10 col-sm-9 col-xs-9 option" style="padding-left: 0;">
        @if(($question->optiona != null))
            {!!$question->optiona->body or ''!!}
            @if(($question->optiona->imageA != null))
                <div class="row">
                    @foreach($question->optiona->imageA as $imageA)
                        <div class=" @if($imageA->size ==1) col-md-4 col-sm-4 col-xs-4 @elseif($imageA->size ==2) col-sm-6 col-md-6 col-xs-6 @else col-md-12 col-sm-12 col-xs-12 @endif">
                            <img src="{{$imageA->path or ''}}" alt="{{$imageA->label or ''}}" class="question_image"  title="{{$imageA->label or ''}}" >
                            <br>{{$imageA->label}}
                        </div>
                    @endforeach
                </div>
            @endif
        @endif
    </div>
</div>
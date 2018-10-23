{{--Option a begins--}}
<div class="row">
    <div class="col-md-1 col-sm-1 col-xs-1">
        <label for="option">A:</label>
        <input type="radio" value="0">
    </div>
    <div class="col-md-10">
        @if(($question->optiona != null))
            <p>{!!$question->optiona->body or ''!!}</p>
            {{--<pre>{!!$question->optiona->body or ''!!}</pre>--}}
            @if(($question->optiona->imageA != null))
                @foreach($question->optiona->imageA as $imageA)
                    <div class="no-top-margin">
                        @if($imageA->size == 1)
                            <img src="{{$imageA->path or ''}}" alt="{{$imageA->label or ''}}" class="question_image"  title="{{$imageA->label or ''}}" >
                            <br>{{$imageA->label}}
                        @elseif($imageA->size == 2)
                            <img src="{{$imageA->path or ''}}" alt="{{$imageA->label or ''}}" class="question_image">
                        @endif
                    </div>
                @endforeach
            @endif
        @endif
    </div>
</div>
{{--Option a ends--}}

{{--Option b begins--}}
<div class="row">
    <div class="col-md-1 col-sm-1 col-xs-1">
        <label for="option">B:</label>
        <input type="radio" name="optionB" value="1">
    </div>
    <div class="col-md-10">
        @if(($question->optionb != null))
            <p>{!!$question->optionb->body or ''!!}</p>
            {{--<pre>{!!$question->optionb->body or ''!!}</pre>--}}
            @if(($question->optionb->imageB != null))
                @foreach($question->optionb->imageB as $imageB)
                    <div class="no-top-margin">
                        @if($imageB->size == 1)
                            <img src="{{$imageB->path or ''}}" alt="{{$imageB->label or ''}}" class="question_image"  title="{{$imageB->label or ''}}" >
                            <br>{{$imageB->label}}
                        @elseif($imageB->size == 2)
                            <img src="{{$imageB->path or ''}}" alt="{{$imageB->label or ''}}" class="question_image">
                        @endif
                    </div>
                @endforeach
            @endif
        @endif
    </div>
</div>
{{--Option b ends--}}

{{--Option a begins--}}
<div class="row">
    <div class="col-md-1 col-sm-1 col-xs-1">
        <label for="option">C:</label>
        <input type="radio" name="optionC" value="2">
    </div>
    <div class="col-md-10">
        @if(($question->optionc != null))
            <p>{!!$question->optionc->body or ''!!}</p>
            {{--<pre>{!!$question->optionc->body or ''!!}</pre>--}}
            @if(($question->optionc->imageC != null))
                @foreach($question->optionc->imageC as $imageC)
                    <div class="no-top-margin">
                        @if($imageC->size == 1)
                            <img src="{{$imageC->path or ''}}" alt="{{$imageC->label or ''}}" class="question_image"  title="{{$imageC->label or ''}}" >
                            <br>{{$imageC->label}}
                        @elseif($imageC->size == 2)
                            <img src="{{$imageC->path or ''}}" alt="{{$imageC->label or ''}}" class="question_image">
                        @endif
                    </div>
                @endforeach
            @endif
        @endif
    </div>
</div>
{{--Option a ends--}}

{{--Option a begins--}}
<div class="row">
    <div class="col-md-1 col-sm-1 col-xs-1">
        <label for="option">D:</label>
        <input type="radio" name="option0" value="3">
    </div>
    <div class="col-md-10">
        @if(($question->optiond != null))
            <p>{!!$question->optiond->body or ''!!}</p>
            {{--<pre>{!!$question->optiond->body or ''!!}</pre>--}}
            @if(($question->optiond->imageD != null))
                @foreach($question->optiond->imageD as $imageD)
                    <div class="no-top-margin">
                        @if($imageD->size == 1)
                            <img src="{{$imageD->path or ''}}" alt="{{$imageD->label or ''}}" class="question_image"  title="{{$imageD->label or ''}}" >
                            <br>{{$imageD->label}}
                        @elseif($imageD->size == 2)
                            <img src="{{$imageD->path or ''}}" alt="{{$imageD->label or ''}}" class="question_image">
                        @endif
                    </div>
                @endforeach
            @endif
        @endif
    </div>
</div>
{{--Option a ends--}}




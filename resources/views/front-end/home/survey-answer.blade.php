
<div class="row mt-5">
    <div class="col-md-5 text-left">
        <h5>{{$surveyQuestion->question}}</h5>
        <!-- Go to www.addthis.com/dashboard to customize your tools -->
        <div class="addthis_inline_share_toolbox my-3"></div>
    </div>

    @if($surveyQuestion->surveyAnswerOptions)
        <div class="col-md-7 text-left bg-light">
            @foreach ($surveyQuestion->surveyAnswerOptions as $surveyAnswerOption)

                <div class="progress my-3">
                    <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: {{ $surveyAnswerOption->hit_percent }}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <label for="{{$surveyQuestion->id}}">{{ $surveyAnswerOption->answer_option }} : {{ $surveyAnswerOption->hit_count ? $surveyAnswerOption->hit_count : 0 }}</label>     
            @endforeach 
        </div>
    @endif
</div>
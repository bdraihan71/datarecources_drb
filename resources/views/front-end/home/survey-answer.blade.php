
<div class="card">
    <div class="card-header">
        {{$surveyQuestion->question}}
    </div>
        <ul class="list-group list-group-flush">
            @if($surveyQuestion->surveyAnswerOptions)
                @foreach ($surveyQuestion->surveyAnswerOptions as $surveyAnswerOption)
                    <li class="list-group-item">
                        <div>
                            <div class="progress my-3">
                                <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: {{ $surveyAnswerOption->hit_percent }}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <label for="{{$surveyQuestion->id}}">{{ $surveyAnswerOption->answer_option }} : {{ $surveyAnswerOption->hit_count ? $surveyAnswerOption->hit_count : 0 }}</label>
                        </div>
                    </li>
                @endforeach 
            @endif
        </ul>
        <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <div class="addthis_inline_share_toolbox my-3"></div>
</div>
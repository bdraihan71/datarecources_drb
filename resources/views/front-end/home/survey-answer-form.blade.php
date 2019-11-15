<form action="{{route('save-response', $surveyQuestion->id)}}" method="POST">
    @csrf
    <div class="card" style="width: 18rem;">
        <div class="card-header">
            {{$surveyQuestion->question}}
        </div>
            <ul class="list-group list-group-flush">
                @if($surveyQuestion->surveyAnswerOptions)
                    @foreach ($surveyQuestion->surveyAnswerOptions as $surveyAnswerOption)
                        <li class="list-group-item">
                            <div>
                                <input type="radio" name="{{$surveyQuestion->id}}" value="{{$surveyAnswerOption->id}}">
                                <label for="{{$surveyQuestion->id}}">{{ $surveyAnswerOption->answer_option }}</label>
                            </div>
                        </li>
                    @endforeach 
                @endif
            </ul>
            @if(auth()->user())
                <button type="submit" class="btn btn-danger">Submit Response</button>
            @else
                <a href="/login" class="btn btn-primary">Please login to Submit Response</a>
            @endif
    </div>
</form>
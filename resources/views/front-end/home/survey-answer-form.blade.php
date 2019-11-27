<form action="{{route('save-response', $surveyQuestion->id)}}" method="POST">
    @csrf
    <div class="row my-3 text-left">
        <div class="col-md-12 mb-3">
            <h5>{{$surveyQuestion->question}}</h5>
        </div>


        @if($surveyQuestion->surveyAnswerOptions)
        <div class="col-md-12">
            @foreach ($surveyQuestion->surveyAnswerOptions as $surveyAnswerOption)
                
                <span class="py-2 px-3 radio-back-color main-text-color font-weight-bold rounded mr-2">
                    <input type="radio" name="{{$surveyQuestion->id}}" value="{{$surveyAnswerOption->id}}">
                    &nbsp;<label for="{{$surveyQuestion->id}}">{{ $surveyAnswerOption->answer_option }}</label>
                </span>
                
            @endforeach 
        </div>
        @endif
        

        <div class="col-md-12 mt-3">
            @if(auth()->user())
                <button type="submit" class="btn btn-warning">Submit</button>
            @else
                <span class="font-weight-bold">Please <a href="/login" class="btn btn-warning">Login</a> to Submit Response</span>
            @endif
        </div>
    </div>
</form>
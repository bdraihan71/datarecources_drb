<form action="{{route('save-response', $surveyQuestion->id)}}" method="POST">
    @csrf
    <div class="row my-5">
        <div class="col-md-12 text-left mb-3">
            <h5>{{$surveyQuestion->question}}</h5>
        </div>


        @if($surveyQuestion->surveyAnswerOptions)
        <div class="col-md-6 text-left">
            @foreach ($surveyQuestion->surveyAnswerOptions as $surveyAnswerOption)
                
                <span class="py-2 px-3 bg-secondary mr-2">
                    <input type="radio" name="{{$surveyQuestion->id}}" value="{{$surveyAnswerOption->id}}">
                    <label for="{{$surveyQuestion->id}}">{{ $surveyAnswerOption->answer_option }}</label>
                </span>
                
            @endforeach 
        </div>
        @endif
        

        <div class="col-md-6 text-right mt-n2">
            @if(auth()->user())
                <button type="submit" class="btn btn-danger w-100 rounded-0">Submit</button>
            @else
                <a href="/login" class="btn btn-primary w-100 rounded-0">Please login to Submit Response</a>
            @endif
        </div>
    </div>
</form>
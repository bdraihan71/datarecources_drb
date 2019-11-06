@extends('back-end.admin-layout')

@section('content')

<form  method="post" action="{{ route('surveyansweroption.update', $surveyansweroption->id) }}">
    @csrf
    @method('patch')
    <div class="row">
        <div class="col-md-4">
            <div class="form-group ">
                <label class="col-12 col-form-label">Survey Question:<span class="text-danger">*</span> </label>
                <div class="col-12">
                    <select class="form-control dropdown-custom" name="survey_question_id" require>
                        @foreach($surveyquestions as $surveyquestion)
                            @if (($surveyansweroption->surveyQuestion->id) == $surveyquestion->id))
                                <option value="{{$surveyquestion->id}}" selected>{{$surveyquestion->question}}</option>
                            @else
                                <option value="{{$surveyquestion->id}}">{{$surveyquestion->question}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
            <label>Answer</label>
            <input class="form-control" name="answer_option"  value="{{ $surveyansweroption->answer_option }}" type="text" placeholder="Enter Answer">
            </div>
        </div>


        <div class="col-md-2">
            <label>.</label>
            <button type="submit" class="btn btn-outline-primary w-100">Update</button>
        </div>
    </div>
</form>

@endsection

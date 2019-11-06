@extends('back-end.admin-layout')

@section('content')

<form  method="post" action="{{ route('surveyansweroption.store') }}">
    @csrf
    <div class="row">

        <div class="col-md-4">
            <div class="form-group ">
                <label class="col-12 col-form-label">Survey Question:<span class="text-danger">*</span> </label>
                <div class="col-12">
                    <select class="form-control dropdown-custom" name="survey_question_id" require>
                    <option value="">Choose Question</option>
                    @foreach($surveyquestions as $surveyquestion)
                        <option value="{{$surveyquestion->id}}"  {{ (old("survey_question_id") == $surveyquestion->id ? "selected":"") }}>{{$surveyquestion->question}}</option>
                    @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
            <label>Answer</label>
            <input class="form-control" name="answer_option"  value="{{ old('answer_option') }}" type="text" placeholder="Enter Answer">
            </div>
        </div>

        <div class="col-md-2">
            <label>.</label>
            <button type="submit" class="btn btn-outline-primary w-100">Submit</button>
        </div>
    </div>
</form>
@include('back-end.survey-answer-option.datatable')

@endsection

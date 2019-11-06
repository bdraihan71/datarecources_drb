@extends('back-end.admin-layout')

@section('content')

<form  method="post" action="{{ route('surveyquestion.store') }}">
    @csrf
    <div class="row bg-white my-4 mx-1 p-3 shadow-sm">

        <div class="col-md-5">
            <label>Survey:<span class="text-danger">*</span> </label>
            <select class="form-control dropdown-custom" name="survey_id" require>
            <option value="">Choose Survey</option>
            @foreach($surveys as $survey)
                <option value="{{$survey->id}}"  {{ (old("survey_id") == $survey->id ? "selected":"") }}>{{$survey->title}}</option>
            @endforeach
            </select>
        </div>

        <div class="col-md-5">
            <div class="form-group">
                <label>Question</label>
                <input class="form-control" name="question"  value="{{ old('question') }}" type="text" placeholder="Enter question">
            </div>
        </div>

        <div class="col-md-2">
            <label></label>
            <button type="submit" class="btn btn-outline-primary w-100 mt-md-2">Submit</button>
        </div>
    </div>
</form>
@include('back-end.survey-question.datatable')

@endsection

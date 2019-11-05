@extends('back-end.admin-layout')

@section('content')

<form  method="post" action="{{ route('surveyquestion.store') }}">
    @csrf
    <div class="row">

            <div class="col-md-4">
                <div class="form-group ">
                    <label class="col-12 col-form-label">Survey:<span class="text-danger">*</span> </label>
                    <div class="col-12">
                        <select class="form-control dropdown-custom" name="survey_id" require>
                        <option value="">Choose Survey</option>
                        @foreach($surveys as $survey)
                            <option value="{{$survey->id}}"  {{ (old("survey_id") == $survey->id ? "selected":"") }}>{{$survey->title}}</option>
                        @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                <label>Question</label>
                <input class="form-control" name="question"  value="{{ old('question') }}" type="text" placeholder="Enter question">
                </div>
            </div>

        <div class="col-md-2">
            <label>.</label>
            <button type="submit" class="btn btn-outline-primary w-100">Submit</button>
        </div>
    </div>
</form>
@include('back-end.survey-question.datatable')

@endsection

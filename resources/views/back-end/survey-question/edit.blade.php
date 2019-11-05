@extends('back-end.admin-layout')

@section('content')

<form  method="post" action="{{ route('surveyquestion.update', $surveyquestion->id) }}">
    @csrf
    @method('patch')
    <div class="row bg-white my-4 mx-1 p-3 shadow-sm">
        <div class="col-md-5">
            <label>Survey:<span class="text-danger">*</span> </label>
            <select class="form-control dropdown-custom" name="survey_id" require>
                @foreach($surveys as $survey)
                    @if (($surveyquestion->survey->id) == $survey->id))
                        <option value="{{$survey->id}}" selected>{{$survey->title}}</option>
                    @else
                        <option value="{{$survey->id}}">{{$survey->title}}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <div class="col-md-5">
            <div class="form-group">
                <label>Question</label>
                <input class="form-control" name="question"  value="{{ $surveyquestion->question }}" type="text" placeholder="Enter question">
            </div>
        </div>

        <div class="col-md-2">
            <label></label>
            <button type="submit" class="btn btn-outline-primary w-100 mt-md-2">Update</button>
        </div>
    </div>
</form>

@endsection

@extends('back-end.admin-layout')

@section('content')

<form  method="post" action="{{ route('surveyquestion.update', $surveyquestion->id) }}">
    @csrf
    @method('patch')
    <div class="row">
        <div class="col-md-4">
            <div class="form-group ">
                <label class="col-12 col-form-label">Survey:<span class="text-danger">*</span> </label>
                <div class="col-12">
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
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
            <label>Question</label>
            <input class="form-control" name="question"  value="{{ $surveyquestion->question }}" type="text" placeholder="Enter question">
            </div>
        </div>

        <div class="col-md-2">
            <label>.</label>
            <button type="submit" class="btn btn-outline-primary w-100">Update</button>
        </div>
    </div>
</form>

@endsection

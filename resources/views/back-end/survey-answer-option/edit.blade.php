@extends('back-end.admin-layout')

@section('content')

<form  method="post" action="{{ route('surveyansweroption.update', $surveyansweroption->id) }}">
    @csrf
    @method('patch')
    <div class="row">

        <div class="col-md-5">
            <h5>Survey Question:</h5> <h6>{{$surveyansweroption->surveyQuestion->question}}</h6>
            <input type="hidden" name="survey_question_id" value="{{$surveyansweroption->surveyQuestion->id}}">
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

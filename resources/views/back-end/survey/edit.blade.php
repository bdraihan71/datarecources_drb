@extends('back-end.admin-layout')

@section('content')

<form  method="post" action="{{ route('survey.update', $survey->id) }}">
    @csrf
    @method('patch')
    <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                <label>Survey Name</label>
                <input class="form-control" name="title"  value="{{ $survey->title }}" type="text" placeholder="Enter Survey Name">
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                <label>Survey Description</label>
                <textarea class="form-control" rows="3" name="description" placeholder="Enter page description">{{ $survey->description }}</textarea>
                </div>
            </div>

            <div class="col-md-4">
                <input class="form-check-input" type="checkbox" name="is_published" value=1 id="defaultCheck2" {{$survey->is_published == 1 ?'checked':''}}>
                <label class="form-check-label" for="defaultCheck2">
                    Publish
                </label>
            </div>

            <div class="col-md-4">
                <input class="form-check-input" type="checkbox" name="is_accepting_answer" value=1 id="defaultCheck1" {{$survey->is_accepting_answer == 1 ?'checked':''}}>
                <label class="form-check-label" for="defaultCheck1">
                    Accepting Answer
                </label>
            </div>

        <div class="col-md-2">
            <label>.</label>
            <button type="submit" class="btn btn-outline-primary w-100">Update</button>
        </div>
    </div>
</form>

@endsection

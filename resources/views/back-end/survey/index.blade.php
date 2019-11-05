@extends('back-end.admin-layout')

@section('content')

<form  method="post" action="{{ route('survey.store') }}">
    @csrf
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
            <label>Survey Name</label>
            <input class="form-control" name="title"  value="{{ old('title') }}" type="text" placeholder="Enter Survey Name">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
            <label>Survey Description</label>
            <textarea class="form-control" rows="3" name="description" placeholder="Enter page description">{{ old('description') }}</textarea>
            </div>
        </div>

        <div class="col-md-4">
            <input class="form-check-input" type="checkbox" name="is_published" value=1 id="defaultCheck2">
            <label class="form-check-label" for="defaultCheck2">
                Publish
            </label>
        </div>

        <div class="col-md-4">
            <input class="form-check-input" type="checkbox" name="is_accepting_answer" value=1 id="defaultCheck1">
            <label class="form-check-label" for="defaultCheck1">
                Accepting Answer
            </label>
        </div>

        <div class="col-md-2">
            <label>.</label>
            <button type="submit" class="btn btn-outline-primary w-100">Submit</button>
        </div>
    </div>
</form>
@include('back-end.survey.datatable')

@endsection

@extends('back-end.admin-layout')

@section('content')

<form  method="post" action="{{ route('announcment.store') }}">
    @csrf
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
            <label>Announcment</label>
            <textarea class="form-control" rows="3" name="text" placeholder="Enter your announcment">{{ old('text') }}</textarea>
            </div>
        </div>

        <div class="col-md-4">
            <input class="form-check-input" type="checkbox" name="is_published" value=1 id="defaultCheck1">
            <label class="form-check-label" for="defaultCheck1">
                Publish
            </label>
        </div>


        <div class="col-md-2">
            <label>.</label>
            <button type="submit" class="btn btn-outline-primary w-100">Submit</button>
        </div>
    </div>
</form>
@include('back-end.announcment.datatable')

@endsection

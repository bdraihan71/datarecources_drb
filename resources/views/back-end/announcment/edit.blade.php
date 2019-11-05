@extends('back-end.admin-layout')

@section('content')

<form  method="post" action="{{ route('announcment.update', $announcment->id) }}">
    @csrf
    @method('patch')
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
            <label>Announcment</label>
            <input class="form-control" name="text"  value="{{ $announcment->text}}" type="text" placeholder="Enter Announcment Name">
            </div>
        </div>

        <div class="col-md-4">
            <input class="form-check-input" type="checkbox" name="is_published"  value=1 id="defaultCheck1" {{$announcment->is_published == 1 ?'checked':''}}>
            <label class="form-check-label" for="defaultCheck1">
                Publish
            </label>
        </div>

        <div class="col-md-2">
            <label>.</label>
            <button type="submit" class="btn btn-outline-primary w-100">Update</button>
        </div>
    </div>
</form>

@endsection

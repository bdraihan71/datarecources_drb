@extends('back-end.admin-layout')

@section('content')

<form  method="post" action="{{ route('sector.update', $sector->id) }}">
    @csrf
    @method('patch')
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
            <label>Sector Name</label>
            <input class="form-control" name="name"  value="{{ $sector->name }}" type="text" placeholder="Enter Sector Name">
            </div>
        </div>
        <div class="col-md-2">
            <label>.</label>
            <button type="submit" class="btn btn-outline-primary w-100">Update</button>
        </div>
    </div>
</form>

@endsection

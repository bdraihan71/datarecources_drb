@extends('back-end.admin-layout')

@section('content')

<form  method="post" action="{{ route('configuration.update', $keyvaluepair->id) }}">
    @csrf
    @method('patch')
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
            <label>{{ $keyvaluepair->key }}</label>
            <input class="form-control" name="value"  value="{{ $keyvaluepair->value }}" type="text" placeholder="Enter value">
            </div>
        </div>
        <div class="col-md-2">
            <label>.</label>
            <button type="submit" class="btn btn-outline-primary w-100">Update</button>
        </div>
    </div>
</form>

@endsection

@extends('back-end.admin-layout')

@section('content')

<form  method="post" action="{{ route('subscriptionplan.store') }}">
    @csrf
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
            <label>Plan Name</label>
            <input class="form-control" name="name"  value="{{ old('name') }}" type="text" placeholder="Enter Plan Name">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
            <label>Price </label>
            <input class="form-control" name="price"  value="{{ old('price') }}" type="number" placeholder="Enter Price">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
            <label>Duration</label>
            <input class="form-control" name="duration_in_days"  value="{{ old('duration_in_days') }}" type="number" placeholder="Enter Duration">
            </div>
        </div>

        <div class="col-md-4">
            <input class="form-check-input" type="checkbox" name="is_visible" value=1 id="defaultCheck1">
            <label class="form-check-label" for="defaultCheck1">
                Visible
            </label>
        </div>

        <div class="col-md-2">
            <label>.</label>
            <button type="submit" class="btn btn-outline-primary w-100">Submit</button>
        </div>
    </div>
</form>
@include('back-end.subscription-plan.datatable')

@endsection

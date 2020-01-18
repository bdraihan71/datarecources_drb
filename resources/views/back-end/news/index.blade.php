@extends('back-end.admin-layout')

@section('content')

<form  method="" action="">
    @csrf
    <div class="row bg-white my-4 mx-1 p-3 shadow-sm">
        <div class="col-md-6">
            <div class="form-group">
                <label>Image</label>
                <input class="form-control" name="image"  type="file">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
            <label>Source </label>
            <textarea class="form-control" rows="1" name="description" placeholder="Enter news source"></textarea>
            </div>
        </div>

        <div class="col-md-10">
            <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" rows="5" name="description" placeholder="Enter news description"></textarea>
            </div>
        </div>

        <div class="col-md-2">
            <label></label>
            <button type="submit" class="btn btn-outline-primary w-100 mt-md-2">Submit</button>
        </div>
    </div>
</form>

@include('back-end.news.datatable')

@endsection
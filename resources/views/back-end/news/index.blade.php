@extends('back-end.admin-layout')

@section('content')

<form  method="" action="">
    @csrf
    <div class="row bg-white my-4 mx-1 p-3 shadow-sm">
        <div class="col-md-4">
            <div class="form-group">
                <label>Image</label>
                <input class="form-control" name="image"  type="file">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
            <label>Heading</label>
            <textarea class="form-control" rows="1" name="description" placeholder="Enter news source"></textarea>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
            <label>Source</label>
            <textarea class="form-control" rows="1" name="description" placeholder="Enter news source"></textarea>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" rows="5" name="description" placeholder="Enter news description"></textarea>
            </div>
        </div>

        <div class="col-md-8">
            <label>Where to show</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                <label class="form-check-label mr-5" for="exampleRadios1">
                  Featured
                </label>
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                <label class="form-check-label mr-5" for="exampleRadios1">
                  World
                </label>
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                <label class="form-check-label mr-5" for="exampleRadios1">
                  Country
                </label>
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                <label class="form-check-label mr-5" for="exampleRadios1">
                  Economy
                </label>
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                <label class="form-check-label" for="exampleRadios1">
                  Company
                </label>
            </div>
        </div>

        <div class="col-md-2 text-md-center ml-4 ml-md-0 sub-plan-check-top">
            <input class="form-check-input" type="checkbox" name="is_visible" value=1 id="defaultCheck1">
            <label class="form-check-label h5" for="defaultCheck1">
                Visible
            </label>
        </div>

        <div class="col-md-2">
            <label></label>
            <button type="submit" class="btn btn-outline-primary w-100 mt-md-2">Submit</button>
        </div>
    </div>
</form>

@include('back-end.news.datatable')

@endsection
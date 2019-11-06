@extends('front-end.main-layout')
@section('content')
<!-- Navigation -->

<section class="financial-statement">
    <div class="container h-100">
        <div class="row align-items-center h-100">
            <div class="col-md-12 bg-white my-5 p-5 shadow">
                <h1>{{$page->title}}</h1>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Company</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Sector</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-secondary">Annually</button>
                    <button type="button" class="btn btn-secondary">Quarterly</button>
                </div>
            </div>
            <div class="col-md-8 text-right border-left border-secondary mb-3">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-secondary">Quarter 1</button>
                    <button type="button" class="btn btn-secondary">Quarter 2</button>
                    <button type="button" class="btn btn-secondary">Quarter 3</button>
                    <button type="button" class="btn btn-secondary">Quarter 4</button>
                </div>
            </div>
            <div class="col-md-12 text-center">
                @include('datatable')
            </div>
        </div>
    </div>
</section>

@endsection

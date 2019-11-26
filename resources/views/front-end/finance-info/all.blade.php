@extends('front-end.main-layout')
@section('content')
<!-- Navigation -->

<section class="financial-statement">
    <div class="container h-100">
        <h3>Financial Statements </h3>
        <p>We have curated data from different companies for you. </p>
        <form>
            <div class="form-group">
                <label for="exampleInputEmail1">Sector</label>
                <select class="form-control" id="exampleFormControlSelect1">
                    <option selected>Choose sector...</option>
                    @foreach ($sectors as $sector)
                        <option value="{{$sector->id}}">{{$sector->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Company</label>
                <select class="form-control" id="exampleFormControlSelect1">
                    <option selected>Choose company...</option>
                    @foreach ($companies as $company)
                        <option value="{{$company->id}}">{{$company->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="frequency">Frequency:</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" value="">
                    <label class="form-check-label">Yearly</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox"  value="">
                    <label class="form-check-label">Quarterly</label>
                </div>
            </div>

            <div class="form-group">
                <label for="frequency">Quarterly:</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" value="">
                    <label class="form-check-label">Q1</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox"  value="">
                    <label class="form-check-label">Q2</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox"  value="">
                    <label class="form-check-label">Q3</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox"  value="">
                    <label class="form-check-label">Q4</label>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Filter</button>
        </form></br>
        <div class="row align-items-center h-100">
            <div class="col-md-12 text-center">
                @include('front-end.finance-info.datatable')
            </div>
        </div>
    </div>
</section>

@endsection

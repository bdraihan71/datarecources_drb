@extends('front-end.main-layout')
@section('content')
<!-- Navigation -->

<section class="financial-statement">
    <div class="container h-100">
        <h3>Financial Statements </h3>
        <p>We have curated data from different companies for you. </p>
        <div class="row align-items-center h-100">
            <div class="col-md-12 text-center">
                @include('front-end.finance-info.datatable')
            </div>
        </div>
    </div>
</section>

@endsection

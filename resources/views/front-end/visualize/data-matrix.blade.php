@extends('front-end.main-layout')
@section('content')
<!-- Navigation -->

<section class="financial-statement" id="mainApp">
    <div class="container-fluid h-100 ">
        @include('front-end.visualize/company-datatable')
    </div>
</section>
@endsection
@section('scripts')

@endsection

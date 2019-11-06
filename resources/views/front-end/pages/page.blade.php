@extends('front-end.main-layout')
@section('content')
<!-- Navigation -->

<section class="financial-statement">
    <div class="container h-100">
        <h3>{{$page->title}} </h3>
        <p>{{$page->description}} </p>
        <div class="row align-items-center h-100">
            <div class="col-md-12 text-center">
                @include('front-end.pages.datatable')
            </div>
        </div>
    </div>
</section>

@endsection

@extends('front-end.main-layout')
@section('content')
<!-- Navigation -->

<section class="financial-statement" id="mainApp">
    <div class="container h-100">
        <div class="row align-items-center h-100">
            <div class="col-md-12 my-4">
                <form action="{{route('search')}}" method="GET">
                    <div class="input-group">
                        <input class="form-control border-secondary py-4 search-border border border-secondary" type="search" value="{{Request::get('search')}}" name="search" placeholder=" Search by keyword">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-warning px-5 search-btn-border border border-secondary" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </from>
            </div>
            <div class="col-md-12 text-center">
                @if($finance_infos->count() > 0)
                    @include('front-end.search.financial')
                @endif    
                @if($pages->count() > 0)
                    @include('front-end.search.page') 
                @endif 
                @if($finance_infos->count() == 0 and  $pages->count() == 0)
                    <h3>Your search  did not match any documents.</h3>
                @endif 
            </div>
        </div>
    </div>
</section>
@endsection
@section('scripts')

@endsection
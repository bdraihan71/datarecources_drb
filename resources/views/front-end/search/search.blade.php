@extends('front-end.main-layout')
@section('content')
<!-- Navigation -->

<section class="financial-statement" id="mainApp">
    <div class="container h-100">
        <div class="row align-items-center h-100">
            <div class="col-md-12 my-4 mb-5">
                <form action="{{route('search')}}" method="GET">
                    <div class="input-group">
                        <input class="form-control border-secondary py-4 search-border border border-secondary" type="search" value="{{Request::get('search')}}" name="search" placeholder=" Search by keyword">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-warning px-5 search-btn-border border border-secondary" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-12 text-center mt-3">
                <ul class="nav nav-tabs justify-content-center mb-4 mt-md-n5" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a onclick="clearParamsAndReload()" class="nav-link bg-transparent text-secondary" id="home-tab" data-toggle="tab" href="#financial-info" role="tab" aria-controls="financial-info" aria-selected="true">Financial Information</a>
                    </li>
                    <li class="nav-item">
                        <a onclick="clearParamsAndReload()" class="nav-link bg-transparent text-secondary" id="home-tab2" data-toggle="tab" href="#page" role="tab" aria-controls="page" aria-selected="false">Page</a>
                    </li>
                    <li class="nav-item">
                        <a onclick="clearParamsAndReload()" class="nav-link bg-transparent text-secondary" id="home-tab3" data-toggle="tab" href="#Particular" role="tab" aria-controls="Particular" aria-selected="false">Particular</a>
                    </li>
                </ul>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="financial-info" role="tabpanel" aria-labelledby="financial-info-tab">
                        @include('front-end.search.financial')
                    </div>
                    <div class="tab-pane fade" id="page" role="tabpanel" aria-labelledby="page-tab">
                        @include('front-end.search.page')
                    </div>
                    <div class="tab-pane fade" id="Particular" role="tabpanel" aria-labelledby="Particular-tab">
                        @include('front-end.search.particular')
                    </div>
                </div>
                {{-- @if($finance_infos->count() > 0)
                    @include('front-end.search.financial')
                @endif
                @if($pages->count() > 0)
                    @include('front-end.search.page')
                @endif
                @if($pageitems->count() > 0)
                    @include('front-end.search.particular')
                @endif    
                @if($finance_infos->count() == 0 and  $pages->count() == 0 and $pageitems->count() == 0)
                    <h3>Your search  did not match any documents.</h3>
                @endif --}}
            </div>
        </div>
    </div>
</section>
@endsection
@section('scripts')

@endsection

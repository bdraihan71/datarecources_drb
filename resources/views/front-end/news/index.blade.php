@extends('front-end.main-layout')
@section('content')
<!-- Navigation -->

<section class="news">
    <div class="container">
        <div class="row custom-header-top">
            <div class="col-md-8 my-5">
                <h3>News</h3>
                <p>All the news are listed here.</p>
            </div>
            <div class="col-md-4 my-5">
                <form action="{{route('search')}}" method="GET">
                    <div class="input-group mt-2">
                        <input class="form-control border-secondary search-border border border-secondary" type="search" value="" name="search" placeholder=" Search by keyword">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-warning search-btn-border border border-secondary" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-12">
                <ul class="list-unstyled">
                    <a href="#">
                        <li class="media">
                        <img src="img/hero.jpg" class="mr-3 img-fluid news-list-img" alt="...">
                        <div class="media-body">
                            <h5 class="mt-0 mb-1">News - 1</h5>
                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        </div>
                        </li>
                    </a>
                    <hr>
                    <a href="#">
                        <li class="media">
                        <img src="img/hero.jpg" class="mr-3 img-fluid news-list-img" alt="...">
                        <div class="media-body">
                            <h5 class="mt-0 mb-1">News - 2</h5>
                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        </div>
                        </li>
                    </a>
                    <hr>
                    <a href="#">
                        <li class="media">
                        <img src="img/hero.jpg" class="mr-3 img-fluid news-list-img" alt="...">
                        <div class="media-body">
                            <h5 class="mt-0 mb-1">News - 3</h5>
                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        </div>
                        </li>
                    </a>
                    <hr>
                </ul>
            </div>
            <div class="col-md-12 my-5">
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</section>

@endsection
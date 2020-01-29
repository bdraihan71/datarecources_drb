@extends('front-end.main-layout')
@section('content')
<!-- Navigation -->

<section class="news">
    <div class="container">
        <div class="row custom-header-top">
            <div class="col-md-12 mt-5">
                <h3>News</h3>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-8 mb-5">
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
            <div class="col-md-2"></div>
            <div class="col-md-12">
                <ul class="list-unstyled">
                    @foreach($allnews as $news)
                        <a href="{{route('news.single',$news->id)}}">
                            <li class="media">
                            <img src="{{ env('S3_URL') }}{{$news->image}}" class="mr-3 img-fluid news-list-img" alt="...">
                            <div class="media-body">
                                <h5 class="mt-0 mb-1">{{ $news->heading }}</h5>
                                    {{ implode(' ', array_slice(explode(' ', $news->body ), 0, 70))}}
                                <br>
                                <a href="{{route('news.single',$news->id)}}">See More ></a>
                                <br>
                                {{-- <div class="text-right">
                                    <h6>Share</h6>
                                    <div class="addthis_inline_share_toolbox mx-auto"></div>
                                    <i class="fab fa-facebook-square fa-2x"></i>
                                    <i class="fab fa-twitter-square fa-2x"></i>
                                    <i class="fab fa-linkedin fa-2x"></i>
                                </div> --}}
                            </div>
                            </li>
                        </a>
                        <hr>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-12 my-5">
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        {{ $allnews->links() }}
                    {{-- <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li> --}}
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</section>

@endsection

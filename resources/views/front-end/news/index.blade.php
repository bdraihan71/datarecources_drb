@extends('front-end.main-layout')
@section('content')
<!-- Navigation -->

<section class="news">
    <div class="container-fluid">
        <div class="row custom-header-top">
            <div class="col-md-12 mt-5">
                <h3>News</h3>
            </div>
            <div class="col-md-3"></div>
            <div class="col-md-6 mb-5">
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
            <div class="col-md-3"></div>
            <div class="col-md-12">
                @foreach($allnews as $news)
                    <div class="row">
                        <div class="col-md-2">
                            <a href="{{route('news.single',$news->id)}}">
                                <img src="{{ env('S3_URL') }}{{$news->image}}" class="mr-3 img-fluid" alt="...">
                            </a>
                        </div>
                        <div class="col-md-10">
                            <a href="{{route('news.single',$news->id)}}"><h5>{{ $news->heading }}</h5></a>
                            <a href="{{route('news.single',$news->id)}}"><p class="text-justify">{{ implode(' ', array_slice(explode(' ', $news->body ), 0, 70))}}</p></a>
                            <a href="{{route('news.single',$news->id)}}">See More ></a>
                        </div>
                    </div>
                    <hr>
                @endforeach
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

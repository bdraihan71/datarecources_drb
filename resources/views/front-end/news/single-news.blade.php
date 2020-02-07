@extends('front-end.main-layout')
@section('content')
<!-- Navigation -->

<section class="news">
    <div class="container">
        <div class="row custom-header-top">
            <div class="col-md-12 mt-5">
                <h3>{{$news->heading}}</h3>
                <p class="card-text"><small class="text-muted">Posted on {{Carbon\Carbon::parse($news->created_at)->format('d F Y')}}</small></p>
            </div>
            <div class="col-md-12">
                <img src="{{ env('S3_URL') }}{{$news->image}}" class="img-fluid w-50 float-right" alt="...">
                <p>{{$news->body}}</p>
            </div>
            <div class="col-md-12">
                <a href="{{$news->source}}" target="_blank" class="h6">Source</a>
                <div class="text-right">
                    <h6>Share</h6>
                    <div class="addthis_inline_share_toolbox mx-auto"></div>
                    {{-- <i class="fab fa-facebook-square fa-2x"></i>
                    <i class="fab fa-twitter-square fa-2x"></i>
                    <i class="fab fa-linkedin fa-2x"></i> --}}
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

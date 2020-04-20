@extends('front-end.main-layout')
@section('content')
<!-- Navigation -->

{{-- <section class="news">
    <div class="container">
        <div class="row custom-header-top">
            <div class="col-md-12 mt-5">
                <h3>{{$news->heading}}</h3>
                <p class="card-text"><small class="text-muted">Posted on {{Carbon\Carbon::parse($news->created_at)->format('d F Y')}}</small></p>
            </div>
            <div class="col-md-12">
                @if($news->image)
                    <img src="{{ env('S3_URL') }}{{$news->image}}" class="img-fluid w-50 float-right pl-4" alt="...">
                @endif
                <p class="text-justify word-break">{!! nl2br($news->body) !!}</p>
            </div>
        </div>
    </div>
</section> --}}
<section class="news">
    <div class="container">
        <div class="row custom-header-top">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <a href="{{route('news.index')}}" class="btn btn-primary">All News</a>
                <div class="row" id="{{$news->id}}">
                    <div class="col-md-12">
                        @if($news->image)
                            <a href="{{$news->source}}" target="_blank">
                                <img src="{{ env('S3_URL') }}{{$news->image}}" class="mr-3 img-fluid news-index-img" alt="...">
                            </a>
                        @endif
                    </div>
                    <div class="col-md-12">
                        <a href="{{$news->source}}" target="_blank"><small class="pt-3 pt-md-0 news-comment-time-text text-secondary">{{ Str::limit ($news->source, 50) }}</small></a>
                        <a href="{{$news->source}}" target="_blank"><h6 class="pt-md-0">{{ $news->heading }} {{$news->id}}</h6></a>
                        {{-- <a href="{{$news->source}}" target="_blank"><p class="text-justify word-break">{{ implode(' ', array_slice(explode(' ', strip_tags($news->body) ), 0, 20))}}</p></a> --}}
                        {{-- <a href="{{route('news.single',$news->id)}}">See More ></a> --}}
                    </div>
                </div>
                <div class="row">
                    <div  class="col-md-3">
                        <button type="button" class="btn btn-light btn-sm mb-3 border border-secondary" @click='isshowcomment({{$news->id}})'><i class="far fa-comment-alt"></i> Comment</button>
                    </div>
                </div>    
                <div>
                    <form method="POST" action="{{ route('comment.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-10">
                                <div class="form-group">
                                    <textarea class="form-control mr-5" id="exampleFormControlTextarea1" name="body" rows="1" placeholder="Write a comment..."></textarea>
                                </div>
                            </div>
                            <div class="col-2">
                                <input type="hidden" name="news_id" value="{{$news->id}}">
                                <button type="submit" class="btn btn-primary float-right">Submit</button>
                            </div>
                        </div>
                    </form>
                    <ul class="list-group mb-3">
                        @foreach ($news->comments as $comment)
                            <li class="list-group-item rounded-pill small border-0 bg-light mb-1"><b>{{$comment->user_id != null ? $comment->user->full_name : 'Anonymous'}}:</b> {{$comment->body}}  <br> <span class="text-secondary news-comment-time-text mt-n3">{{$comment->updated_at->diffForHumans()}}</span></li>
                        @endforeach
                    </ul>
                </div>     
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</section>

@endsection

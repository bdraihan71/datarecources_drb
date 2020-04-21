@extends('front-end.main-layout')
@section('content')
<section class="news" id="app">
    <div class="container-fluid">
        <div class="row custom-header-top">
            <div class="col-md-12">
                {{-- <h3>News</h3> --}}
            </div>
            <div class="col-md-3"></div>
            <div class="col-md-6 mb-5">
                <!-- <form action="{{route('newssearch')}}" method="GET">
                    <div class="input-group mt-2">
                        <input class="form-control border-secondary border border-secondary" type="search" value="{{Request::get('search')}}" name="search" placeholder="search for Company, Industry &amp News">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-warning border border-secondary" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form> -->
                {{-- <div class="dropdown show mt-2">
                    <a class="btn dropdown-toggle " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Any time
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="#">Past hour</a>
                        <a class="dropdown-item" href="#">Past 24 hours</a>
                        <a class="dropdown-item" href="#">Past week</a>
                        <a class="dropdown-item" href="#">Past month</a>
                        <a class="dropdown-item" href="#">Past year</a>
                         <div class="dropdown-divider"></div>
                            <a class="dropdown-item"  data-toggle="modal" data-target="#exampleModal">Custom range</a>
                        </div>
                    </div>
                </div> --}}
            </div>
            <div class="col-md-3"></div>
            <div class="col-md-2"></div>
            <div class="col-md-7">
                @if($allnews->count() == 0)
                    <h3>Your search  did not match any news.</h3>
                @else
                    @foreach($allnews as $news)
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
                            <div  class="col-md-3" >
                                <button type="button" class="btn btn-light btn-sm mb-3 border border-secondary" @click='isshowcomment({{$news->id}})'><i class="far fa-comment-alt"></i> Comment</button>
                            </div>
                            <div  class="col-md-9">
                                {{-- <div class="text-right">
                                    <h6>Share</h6>
                                    <div class="addthis_inline_share_toolbox mx-auto" id="{{$news->id}}"></div>
                                </div> --}}
                                <div class="text-right">
                                    <div class="addthis_inline_share_toolbox mx-auto" data-url="{{ env('APP_URL') }}single-news/{{$news->id}}" data-title="{{$news->heading}}" data-description="{{$news->body}}" data-media="{{ env('S3_URL') }}{{$news->image}}"></div>
                                </div>
                            </div>
                        </div>    
                        <div v-if='isShowComment == {{$news->id}}'>
                            @if (Auth::check())
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
                            @endif    
                            <ul class="list-group mb-3">
                                @foreach ($news->comments as $comment)
                                    <li class="list-group-item rounded-pill small border-0 bg-light mb-1">
                                        <b>{{$comment->user_id != null ? $comment->user->full_name : 'Anonymous'}}:</b> 
                                        <span v-if="isShowCommentBox == {{$comment->id}}">
                                            <form method="POST" action="{{ route('comment.update', $comment->id) }}">
                                                @csrf
                                                @method('patch')
                                                <div class="row">
                                                    <div class="col-10">
                                                        <div class="form-group">
                                                            <textarea class="form-control mr-5" id="exampleFormControlTextarea1" name="body" rows="1" placeholder="Write a comment...">{{$comment->body}}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <input type="hidden" name="news_id" value="{{$news->id}}">
                                                        <button type="submit" class="btn btn-primary float-right">Update</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </span> 
                                        <span v-else>{{$comment->body}}</span>
                                        @if(Auth::user())
                                            @if(Auth::user()->id == $comment->user_id) 
                                                <button class="btn btn-primary" @click="isComment({{$comment->id}})"  v-if="isShowCommentBox != {{$comment->id}}">edit</button>
                                                <form action="{{ route('comment.destroy', $comment->id)}}" onclick="return confirm('Are you sure, you want to delete this Comment?')" method="post" style="display: inline;" v-if="isShowCommentBox != {{$comment->id}}">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                                                </form>
                                            @endif
                                        @endif    
                                        <br> 
                                        <span class="text-secondary news-comment-time-text mt-n3">{{$comment->updated_at->diffForHumans()}}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>       
                    @endforeach
                @endif    
            </div>
            <div class="col-md-3">
                <h6>Most Recent</h6>
                <div class="table-responsive">
                    <table class="table table-hover border">
                        <thead>
                          <tr>
                            <th scope="col">Topic</th>
                            <th scope="col">Date</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Monthly Macro</td>
                            <td>April 2020</td>
                          </tr>
                          <tr>
                            <td>Bank Interest</td>
                            <td>March 2020</td>
                          </tr>
                          <tr>
                            <td>Latest Publication</td>
                            <td>Deember 2019</td>
                          </tr>
                        </tbody>
                      </table>
                  </div>
            </div>
            <div class="col-md-12 my-5">
                <div class="row justify-content-center">
                    {{ $allnews->links() }}
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Customised date range</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <form  method="GET">
                    <div class="form-group row">
                        <label for="example-date-input" class="col-4 col-form-label">Date From</label>
                        <div class="col-8">
                            <input class="form-control" type="date" value="{{ Request()->from}}" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-date-input" class="col-4 col-form-label">Date To</label>
                        <div class="col-8">
                            <input class="form-control" type="date" value="{{ Request()->to}}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Search</button>
                    </div>
                </form>
            </div>
            
            </div>
        </div>
    </div> --}}
</section>
    @section('scripts')
        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
        <script >
            var app = new Vue({
                el: '#app',
                data: {
                    isShowComment: null,
                    isShowCommentBox: null,
                    
                },
                mounted () {
                    this.isShowComment = localStorage.isShowComment ;
                },
                methods: {
                    isshowcomment: function(index){
                    this.isShowComment = index;
                    localStorage.isShowComment = index;
                    },

                    isComment: function(index){
                        this.isShowCommentBox = index;
                },
            }

            })
        </script>


    @endsection

@endsection

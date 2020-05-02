@extends('front-end.main-layout')
@section('content')

<section class="news" id="app">
    <div class="container-fluid">
        <div class="row custom-news-header-top">
            <div class="col-md-12">
                {{-- <h3>News</h3> --}}
                <button type="button" id="sidebarCollapse" class="btn btn-warning my-2 d-md-none news-toggle-button news-sidenav-scroll-hide">
                    <i id="news-sidenav" class="fas fa-chevron-right"></i>
                    <span>Data Resource BD</span>
                </button>
            </div>
            <div class="col-md-2">
                <div class="wrapper">
                    <!-- Sidebar  -->
                    <nav id="sidebar" class="bg-transparent text-dark custom-news-nav-header-top news-sidenav-scroll-hide">
                
                        <ul class="list-unstyled components">
                            <li class="{{ request()->url() == route('news.index') ? 'news-sidenav-active' : '' }}">
                                <a href="{{route('news.index')}}">All News</a>
                            </li>
                            @foreach ($categories as $category)
                                <li class="{{ request()->url() == route('news.bycategoty', $category->name) ? 'news-sidenav-active' : '' }}">
                                    <a href="{{route('news.bycategoty', $category->name)}}">{{ $category->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-md-7">
                <ul id="example-1">
                    <div v-for="item in initial" :key="item.message">
                    <div class="shadow-sm mb-3 single-news-border">
                        <div class="row" id="$news->id">
                            <div class="col-md-9">
                        
                                <a href="" target="_blank"><h5 class="pt-md-2 px-2">@{{item.heading}}</h5></a>
                                <a href="$news->source}}" target="_blank"><p class="text-justify word-break px-2"><span class="text-secondary ml-2 small">@{{item.url}}</span></p></a>
                 
                            </div>
                            <div class="col-md-3">
                               
                                    <a href="item.url" target="_blank">
                                        <img  v-bind:src="getImageUrl(item.image)" class="mb-3 img-fluid news-index-img" alt="...">
                                    </a>
                            </div>
                        </div>
                        <div class="row">
                        
                                <div  class="col-md-3" >
                                    <button type="button" class="btn btn-light btn-sm mb-3 border border-secondary ml-2" ><i class="far fa-comment-alt"></i> Comment</button>
                                </div>
                            <div  class="col-md-9">

                            </div>
                           
                        </div>    
                        
                    </div>  
                    </div>
                </ul>
            </div>
            <div class="col-md-3">
                <h5>Most Recent</h5>
                <div class="table-responsive most-recent-border">
                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th scope="col">Topic</th>
                            <th scope="col">Date</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($mostrecents as $recent)
                                <tr>
                                    <td class="more">{!! nl2br($recent->body) !!}</td>
                                    <td>{{ date('F Y', strtotime($recent->date)) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
            var example1 = new Vue({
            el: '#example-1',
            mounted () {
                this.initial_call();
            },
            created () {
                window.addEventListener('scroll', this.handleScroll);
            },
            destroyed () {
                window.removeEventListener('scroll', this.handleScroll);
            },
            methods: {
                getImageUrl(name){
                    return "https://data-resources-bd.s3-ap-southeast-1.amazonaws.com/" + name;
                },
                handleScroll (event) {
                    if(window.scrollY > this.threshold){
                        this.call();
                        this.initial = this.initial.concat(this.latest_call);

                        this.threshold = this.threshold + 600;
                    };
                },
                call (){
                    fetch('/api/news/last_id/'+ this.last_id, {
                        method: 'Get', // *GET, POST, PUT, DELETE, etc.
                        mode: 'cors', // no-cors, cors, *same-origin
                        cache: 'no-cache', // *default, no-cache, reload, force-cache, only-if-cached
                        credentials: 'same-origin', // include, *same-origin, omit
                        headers: {
                            'Content-Type': 'application/json',
                            'Authorization' : 'Bearer ' + localStorage.access_token,
                            // 'Content-Type': 'application/x-www-form-urlencoded',
                        },
                        redirect: 'follow', // manual, *follow, error
                        referrer: 'no-referrer', // no-referrer, *client
                        
                    })
                    .then(function(response) {
                        return response.json();
                    })
                    .then(response => {
                        this.latest_call = response.items;
                        this.last_id = response.last_id;
                    });
                },

                initial_call() {
                    fetch('/api/news/last_id/'+ 0, {
                        method: 'Get', // *GET, POST, PUT, DELETE, etc.
                        mode: 'cors', // no-cors, cors, *same-origin
                        cache: 'no-cache', // *default, no-cache, reload, force-cache, only-if-cached
                        credentials: 'same-origin', // include, *same-origin, omit
                        headers: {
                            'Content-Type': 'application/json',
                            'Authorization' : 'Bearer ' + localStorage.access_token,
                            // 'Content-Type': 'application/x-www-form-urlencoded',
                        },
                        redirect: 'follow', // manual, *follow, error
                        referrer: 'no-referrer', // no-referrer, *client
                        
                    })
                    .then(function(response) {
                        return response.json();
                    })
                    .then(response => {
                        this.initial = response.items;
                        this.last_id = response.last_id;
                    });
                }
            },
            data: {
                last_id: 0,
                threshold: 300,
                count: 0,
                content: [],
                initial: [],
                latest_call: [],
            }
            })
        </script>


    @endsection

@endsection

<section class="news" id ="news">
    <div class="container">
        {{-- <div class="dropdown show">
            <a class="btn dropdown-toggle text-dark" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Any time
            </a> --}}
            <div class="form-group ropdown show">
                <select class="form-control" id="exampleFormControlSelect1" v-model="time" @click="getAllNews">
                  <option>Any time</option>
                  <option value="1">Past 24 hours</option>
                  <option value="7">Past week</option>
                  <option value="30">Past month</option>
                  <option value="365">Past year</option>
                  {{-- <option  data-toggle="modal" data-target="#exampleModal">Custom range</option> --}}
                 
                </select>
              </div>
            {{-- <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" v-model="time">
                <a class="dropdown-item" href="#">Past hour</a>
                <a class="dropdown-item" href="#">Past 24 hours</a>
                <a class="dropdown-item" href="#">Past week</a>
                <a class="dropdown-item" href="#">Past month</a>
                <a class="dropdown-item" href="#">Past year</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item"  data-toggle="modal" data-target="#exampleModal">Custom range</a>
                </div>
            </div> --}}
        {{-- </div> --}}
        <div class="row">
            <div class="col-md-12">
                @if($allnews->count() == 0)
                    <h3>Your search  did not match any news.</h3>
                @else
                    @foreach($allnews as $news)
                        <div class="row">
                            <div class="col-md-2">
                                @if($news->image)
                                    <a href="{{route('news.single',$news->id)}}">
                                        <img src="{{ env('S3_URL') }}{{$news->image}}" class="mr-3 img-fluid news-index-img" alt="...">
                                    </a>
                                @endif
                            </div>
                            <div class="col-md-10">
                                <a href="{{route('news.single',$news->id)}}"><h5 class="pt-3 pt-md-0">{{ $news->heading }}</h5></a>
                                <a href="{{route('news.single',$news->id)}}"><p class="text-justify">{{ implode(' ', array_slice(explode(' ', strip_tags($news->body) ), 0, 70))}}</p></a>
                                <a href="{{route('news.single',$news->id)}}">See More ></a>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                @endif    
            </div>
            <div class="col-md-12 mb-5">
                <div class="row justify-content-center">
                    {{ $allnews->links() }}
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <button type="button" class="btn btn-primary">Search</button>
                    </div>
                </form>
            </div>
            
            </div>
        </div>
    </div>
</section>
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script>
    var app = new Vue({
        el: '#news',
        data () {
            return {
                allNews: [],
                time: null
            }
        },
      
        methods: {
            getAllNews: function(){
                    console.log("calling get news");
                    fetch('/api/news/' + this.time)
                    .then(function(response) {
                        return response.json();
                    })
                    .then(response => (this.allNews = (response)))
                },

        }
       
    })
</script>
@endsection
@extends('front-end.main-layout')

@section('content')
<header id="home">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card mb-3 custom-header-top">
                    <div class="row no-gutters">
                        @if($featured)
                            <div class="col-md-12">
                                <div class="featured-img">
                                    @if($featured->image)
                                        <a href="{{route('news.single',$featured->id)}}">
                                            <img src="{{ env('S3_URL') }}{{$featured->image}}" class="featured-news-img rounded-0" alt="...">
                                        </a>
                                    @endif
                                
                                    <div class="card-body text-left featured-img-text pl-4 pt-5">
                                        <a href="{{route('news.single',$featured->id)}}">
                                            <h5 class="card-title text-white">{{$featured->heading}}</h5>
                                            {{-- <p class="card-text text-white">{{$featured->body}}</p> --}}
                                            <p class="card-text text-white">{{implode(' ', array_slice(explode(' ', $featured->body), 0, 20))}}</p>
                                            <p class="card-text"><small class="text-white">{{$featured->updated_at->diffForHumans()}}</small></p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-md-4">
                                <div class="card-body text-right">
                                    <a href="{{route('news.single',$featured->id)}}">
                                        <h5 class="card-title text-white">{{$featured->heading}}</h5>
                                        {{-- <p class="card-text text-white">{{$featured->body}}</p> --}}
                                        {{-- <p class="card-text text-white">{{implode(' ', array_slice(explode(' ', $featured->body), 0, 20))}}</p>
                                        <p class="card-text"><small class="text-muted">{{$featured->updated_at->diffForHumans()}}</small></p>
                                    </a>
                                </div>
                            </div> --}}
                        @else
                            <div class="col-md-8">
                                <img src="img/blur.jpg" class="card-img news-card-img rounded-0" alt="...">
                            </div>
                            <div class="col-md-4">
                                <div class="card-body text-right">
                                    <h5 class="card-title text-white">No news available</h5>
                                    <p class="card-text text-white">--</p>
                                    <p class="card-text"><small class="text-muted">--</small></p>
                                </div>
                            </div>
                        @endif    
                    </div>
                </div>

                <div class="row"> 
                    @if($top5s->isEmpty())
                        <div class="col-4 col-sm text-center">
                            <h4 class="card-text main-text-color"><small>No news available</small></h4>
                        </div>
                    @else  
                        @foreach ($top5s as $news)
                            <div class="col-4 col-sm">
                                <a href="{{route('news.single',$news->id)}}">
                                    <div class="card border-0">
                                        @if($news->image)
                                            <img src="{{ env('S3_URL') }}{{ $news->image }}" class="card-img-top top5-news-img rounded-0" alt="...">
                                        @endif
                                        <p class="card-text main-text-color py-1 news-line-height"><small class="font-weight-bold">{{ $news->heading }}</small></p>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @endif 
                </div>

                <div class="card-deck mt-5">
                    <div class="card border-0">
                        <h4 class="main-text-color">World</h4>
                        @if($world)
                        <a href="{{route('news.single',$world->id)}}">
                            @if($world->image)
                            <img src="{{ env('S3_URL') }}{{$world->image}}" class="card-img-top rounded-0 category-news-img" alt="...">
                            @endif
                            <p class="card-text main-text-color category-news-heading-border py-2 news-line-height">{{$world->heading}}</p>
                        </a> 
                        @else 
                            <p class="card-text main-text-color"><small>No news available</small></p>
                        @endif
                        <a href="{{route('news.single',App\News::where('showing_area', 'world')->orderBy('created_at', 'desc')->skip(1)->take(1)->get()->first()->id ?? '#')}}" class="category-news-heading-border"><small class="card-text main-text-color">{{implode(' ', array_slice(explode(' ', App\News::where('showing_area', 'world')->orderBy('created_at', 'desc')->skip(1)->take(1)->get()->first()->heading ?? '#'), 0, 20))}}</small></a>
                        <a href="{{route('news.single',App\News::where('showing_area', 'world')->orderBy('created_at', 'desc')->skip(2)->take(1)->get()->first()->id ?? '#')}}" class="category-news-heading-border"><small class="card-text main-text-color">{{implode(' ', array_slice(explode(' ', App\News::where('showing_area', 'world')->orderBy('created_at', 'desc')->skip(2)->take(1)->get()->first()->heading ?? '#'), 0, 20))}}</small></a>
                        <a href="{{route('news.single',App\News::where('showing_area', 'world')->orderBy('created_at', 'desc')->skip(3)->take(1)->get()->first()->id ?? '#')}}" class="category-news-heading-border"><small class="card-text main-text-color">{{implode(' ', array_slice(explode(' ', App\News::where('showing_area', 'world')->orderBy('created_at', 'desc')->skip(3)->take(1)->get()->first()->heading ?? '#'), 0, 20))}}</small></a>
                        <a href="{{route('news.single', App\News::where('showing_area', 'world')->orderBy('created_at', 'desc')->skip(4)->take(1)->get()->first()->id ?? '#')}}" class="category-news-heading-border"><small class="card-text main-text-color">{{implode(' ', array_slice(explode(' ', App\News::where('showing_area', 'world')->orderBy('created_at', 'desc')->skip(4)->take(1)->get()->first()->heading ?? '#'), 0, 20))}}</small></a>
                    </div>

                    <div class="card border-0">
                        <h4 class="main-text-color">Country</h4>
                        @if($country)
                        <a href="{{route('news.single',$country->id)}}">
                            @if($country->image)
                            <img src="{{ env('S3_URL') }}{{$country->image}}" class="card-img-top rounded-0 category-news-img" alt="...">
                            @endif
                            <p class="card-text main-text-color category-news-heading-border py-2">{{$country->heading}}</p>
                        </a>
                        @else 
                            <p class="card-text main-text-color"><small>No news available</small></p>
                        @endif
                        <a href="{{route('news.single',App\News::where('showing_area', 'country')->orderBy('created_at', 'desc')->skip(1)->take(1)->get()->first()->id ?? '#')}}" class="category-news-heading-border"><small class="card-text main-text-color">{{implode(' ', array_slice(explode(' ', App\News::where('showing_area', 'country')->orderBy('created_at', 'desc')->skip(1)->take(1)->get()->first()->heading ?? '#'), 0, 20))}}</small></a>  
                        <a href="{{route('news.single',App\News::where('showing_area', 'country')->orderBy('created_at', 'desc')->skip(2)->take(1)->get()->first()->id ?? '#')}}" class="category-news-heading-border"><small class="card-text main-text-color">{{implode(' ', array_slice(explode(' ', App\News::where('showing_area', 'country')->orderBy('created_at', 'desc')->skip(2)->take(1)->get()->first()->heading ?? '#'), 0, 20))}}</small></a>
                        <a href="{{route('news.single',App\News::where('showing_area', 'country')->orderBy('created_at', 'desc')->skip(3)->take(1)->get()->first()->id ?? '#')}}" class="category-news-heading-border"><small class="card-text main-text-color">{{implode(' ', array_slice(explode(' ', App\News::where('showing_area', 'country')->orderBy('created_at', 'desc')->skip(3)->take(1)->get()->first()->heading ?? '#'), 0, 20))}}</small></a>
                        <a href="{{route('news.single', App\News::where('showing_area', 'country')->orderBy('created_at', 'desc')->skip(4)->take(1)->get()->first()->id ?? '#')}}" class="category-news-heading-border"><small class="card-text main-text-color">{{implode(' ', array_slice(explode(' ', App\News::where('showing_area', 'country')->orderBy('created_at', 'desc')->skip(4)->take(1)->get()->first()->heading ?? '#'), 0, 20))}}</small></a>
                    </div>

                    <div class="card border-0">
                        <h4 class="main-text-color">Economy</h4>
                        @if($economy)
                        <a href="{{route('news.single',$economy->id)}}">

                            @if($economy->image)
                            <img src="{{ env('S3_URL') }}{{$economy->image}}" class="card-img-top rounded-0 category-news-img" alt="...">
                            @endif
                            <p class="card-text main-text-color category-news-heading-border py-2">{{$economy->heading}}</p>
                        </a>
                        @else 
                            <p class="card-text main-text-color"><small>No news available</small></p>
                        @endif
                        <a href="{{route('news.single',App\News::where('showing_area', 'economy')->orderBy('created_at', 'desc')->skip(1)->take(1)->get()->first()->id ?? '#')}}" class="category-news-heading-border"><small class="card-text main-text-color">{{implode(' ', array_slice(explode(' ', App\News::where('showing_area', 'economy')->orderBy('created_at', 'desc')->skip(1)->take(1)->get()->first()->heading ?? '#'), 0, 20))}}</small></a>  
                        <a href="{{route('news.single',App\News::where('showing_area', 'economy')->orderBy('created_at', 'desc')->skip(2)->take(1)->get()->first()->id ?? '#')}}" class="category-news-heading-border"><small class="card-text main-text-color">{{implode(' ', array_slice(explode(' ', App\News::where('showing_area', 'economy')->orderBy('created_at', 'desc')->skip(2)->take(1)->get()->first()->heading ?? '#'), 0, 20))}}</small></a>
                        <a href="{{route('news.single',App\News::where('showing_area', 'economy')->orderBy('created_at', 'desc')->skip(3)->take(1)->get()->first()->id ?? '#')}}" class="category-news-heading-border"><small class="card-text main-text-color">{{implode(' ', array_slice(explode(' ', App\News::where('showing_area', 'economy')->orderBy('created_at', 'desc')->skip(3)->take(1)->get()->first()->heading ?? '#'), 0, 20))}}</small></a>
                        <a href="{{route('news.single', App\News::where('showing_area', 'economy')->orderBy('created_at', 'desc')->skip(4)->take(1)->get()->first()->id ?? '#')}}" class="category-news-heading-border"><small class="card-text main-text-color">{{implode(' ', array_slice(explode(' ', App\News::where('showing_area', 'economy')->orderBy('created_at', 'desc')->skip(4)->take(1)->get()->first()->heading ?? '#'), 0, 20))}}</small></a>  
                    </div>

                    <div class="card border-0">
                        <h4 class="main-text-color">Company</h4>
                        @if($company)
                        <a href="{{route('news.single',$company->id)}}">
                            @if($company->image)
                             <img src="{{ env('S3_URL') }}{{$company->image}}" class="card-img-top rounded-0 category-news-img" alt="...">
                            @endif
                            <p class="card-text main-text-color category-news-heading-border py-2">{{$company->heading}}</p>
                        </a>
                        @else 
                            <p class="card-text main-text-color"><small>No news available</small></p>
                        @endif   
                        <a href="{{route('news.single',App\News::where('showing_area', 'company')->orderBy('created_at', 'desc')->skip(1)->take(1)->get()->first()->id ?? '#')}}" class="category-news-heading-border"><small class="card-text main-text-color">{{implode(' ', array_slice(explode(' ', App\News::where('showing_area', 'company')->orderBy('created_at', 'desc')->skip(1)->take(1)->get()->first()->heading ?? '#'), 0, 20))}}</small></a>  
                        <a href="{{route('news.single',App\News::where('showing_area', 'company')->orderBy('created_at', 'desc')->skip(2)->take(1)->get()->first()->id ?? '#')}}" class="category-news-heading-border"><small class="card-text main-text-color">{{implode(' ', array_slice(explode(' ', App\News::where('showing_area', 'company')->orderBy('created_at', 'desc')->skip(2)->take(1)->get()->first()->heading ?? '#'), 0, 20))}}</small></a>
                        <a href="{{route('news.single',App\News::where('showing_area', 'company')->orderBy('created_at', 'desc')->skip(3)->take(1)->get()->first()->id ?? '#')}}" class="category-news-heading-border"><small class="card-text main-text-color">{{implode(' ', array_slice(explode(' ', App\News::where('showing_area', 'company')->orderBy('created_at', 'desc')->skip(3)->take(1)->get()->first()->heading ?? '#'), 0, 20))}}</small></a>
                        <a href="{{route('news.single', App\News::where('showing_area', 'company')->orderBy('created_at', 'desc')->skip(4)->take(1)->get()->first()->id ?? '#')}}" class="category-news-heading-border"><small class="card-text main-text-color">{{implode(' ', array_slice(explode(' ', App\News::where('showing_area', 'company')->orderBy('created_at', 'desc')->skip(4)->take(1)->get()->first()->heading  ?? '#'), 0, 20))}}</small></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="custom-header-top">
                    @if($sides->isEmpty())
                        <h4 class="card-text main-text-color text-center"><small>No news available</small></h4>
                    @else  
                        @foreach ($sides as $side) 
                            <h5 class="category-news-heading-border pb-3 pt-2">
                                <a href="{{route('news.single',$side->id)}}">{{$side->heading}}</a>
                            </h5>
                        @endforeach
                    @endif  
                </div>
            </div>
        </div>
    </div>
</header>

<section class="analyze">
    <div class="container-fluid">
        <div class="row">
            <div class="header">
                <div class="inner-header flex mt-4">
                    <h1 class="my-md-5 main-text-color">Start Analyzing With</h1>
                    <div class="col-12">
                        <div class="row no-gutters">
                            <div class="col-md-2">
                                <a href="http://ec2-54-169-255-50.ap-southeast-1.compute.amazonaws.com/Commodity_Price" class="btn rounded-0 main-text-color ash-btn-color my-2 w-100" target="_blank">Commodity</a>
                            </div>
                            <div class="col-md-2">
                                <a href="http://ec2-54-169-255-50.ap-southeast-1.compute.amazonaws.com/Registered%20Vehicle" class="btn rounded-0 main-color text-white my-2 w-100" target="_blank">Vehicle</a>
                            </div>
                            <div class="col-md-2">
                                <a href="http://ec2-54-169-255-50.ap-southeast-1.compute.amazonaws.com/Monthly%20Macro" class="btn rounded-0 main-text-color ash-btn-color my-2 w-100" target="_blank">Monthly Macro</a>
                            </div>
                            <div class="col-md-2">
                                <a href="http://ec2-54-169-255-50.ap-southeast-1.compute.amazonaws.com/Internet%20Subscriber" class="btn rounded-0 main-color text-white my-2 w-100" target="_blank">Internet</a>
                            </div>
                            <div class="col-md-2">
                                <a href="http://ec2-54-169-255-50.ap-southeast-1.compute.amazonaws.com/Publication" class="btn rounded-0 main-text-color ash-btn-color my-2 w-100" target="_blank">Publication</a>
                            </div>
                            <div class="col-md-2">
                                <a href="http://ec2-54-169-255-50.ap-southeast-1.compute.amazonaws.com/Mobile%20Subscriber" class="btn rounded-0 main-color text-white my-2 w-100" target="_blank">Mobile Subscriber</a>
                            </div>

                            <div class="col-md-2">
                                <a href="http://ec2-54-169-255-50.ap-southeast-1.compute.amazonaws.com/finance-info" class="btn rounded-0 main-color text-white my-2 w-100" target="_blank">Grameenphone</a>
                            </div>
                            <div class="col-md-2">
                                <a href="http://ec2-54-169-255-50.ap-southeast-1.compute.amazonaws.com/search?search=brac+bank" class="btn rounded-0 main-text-color ash-btn-color my-2 w-100" target="_blank">BRAC Bank</a>
                            </div>
                            <div class="col-md-2">
                                <a href="http://ec2-54-169-255-50.ap-southeast-1.compute.amazonaws.com/search?search=bergerpbl" class="btn rounded-0 main-color text-white my-2 w-100" target="_blank">BergerPBL</a>
                            </div>
                            <div class="col-md-2">
                                <a href="http://ec2-54-169-255-50.ap-southeast-1.compute.amazonaws.com/search?search=reckit" class="btn rounded-0 main-text-color ash-btn-color my-2 w-100" target="_blank">Reckittben</a>
                            </div>
                            <div class="col-md-2">
                                <a href="http://ec2-54-169-255-50.ap-southeast-1.compute.amazonaws.com/search?search=marico" class="btn rounded-0 main-color text-white my-2 w-100" target="_blank">Marico</a>
                            </div>
                            <div class="col-md-2">
                                <a href="http://ec2-54-169-255-50.ap-southeast-1.compute.amazonaws.com/search?search=Esquire+knit" class="btn rounded-0 main-text-color ash-btn-color my-2 w-100" target="_blank">Esquire knit</a>
                            </div>

                            <div class="col-md-2">
                                <a href="http://ec2-54-169-255-50.ap-southeast-1.compute.amazonaws.com/search?search=ifad+autos" class="btn rounded-0 main-text-color ash-btn-color my-2 w-100" target="_blank">Ifad Autos</a>
                            </div>
                            <div class="col-md-2">
                                <a href="http://ec2-54-169-255-50.ap-southeast-1.compute.amazonaws.com/search?search=olympic" class="btn rounded-0 main-color text-white my-2 w-100" target="_blank">Olympic</a>
                            </div>
                            <div class="col-md-2">
                                <a href="http://ec2-54-169-255-50.ap-southeast-1.compute.amazonaws.com/search?search=summit+power" class="btn rounded-0 main-text-color ash-btn-color my-2 w-100" target="_blank">Summit Power</a>
                            </div>
                            <div class="col-md-2">
                                <a href="http://ec2-54-169-255-50.ap-southeast-1.compute.amazonaws.com/search?search=IDLC" class="btn rounded-0 main-color text-white my-2 w-100" target="_blank">IDLC</a>
                            </div>
                            <div class="col-md-2">
                                <a href="http://ec2-54-169-255-50.ap-southeast-1.compute.amazonaws.com/search?search=Singer" class="btn rounded-0 main-text-color ash-btn-color my-2 w-100" target="_blank">Singer</a>
                            </div>
                            <div class="col-md-2">
                                <a href="http://ec2-54-169-255-50.ap-southeast-1.compute.amazonaws.com/search?search=Bata+shoe" class="btn rounded-0 main-color text-white my-2 w-100" target="_blank">Bata Shoe</a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- <!--Waves Container-->
                <div>
                    <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 120 28" preserveAspectRatio="none" shape-rendering="auto">
                        <defs>
                            <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
                        </defs>
                        <g class="parallax">
                            <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(0, 172, 193, 1)" />
                            <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(84, 58, 183, 0.5)" />
                            <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(0, 172, 193, 0.3)" />
                            <use xlink:href="#gentle-wave" x="48" y="7" fill="rgba(84, 58, 183, 0.5)" />
                        </g>
                    </svg>
                </div>
                <!--Waves end--> --}}
            </div>
        </div>
    </div>
</section>


@if(count($survey_results)>0)
    <section class="survey" id="opinion">
        <div class="container h-100">
            <div class="row text-center align-items-center h-100">
                <div class="col-md-12">
                    <h1 class="mt-5 survey-margin-top">Your Opinion</h1>
                </div>

                @foreach ($survey_results as $survey)
                <div class="col-md-12">
                    {{-- <h5 class="main-text-color">{{$survey->title}}</h5> --}}
                </div>
                    @foreach($survey->surveyQuestions as $surveyQuestion)
                        <div class="col-md-12">
                            @include('front-end.home.survey-answer')
                        </div>
                    @endforeach
                @endforeach

            </div>
        </div>
    </section>
@endif
@if(count($surveys)>0)
    <section class="survey" id="opinion">
        <div class="container h-100">
            <div class="row text-center align-items-center h-100">
                <div class="col-md-12">
                    <h4 class="mt-md-5 survey-margin-top">Participate in Survey</h4>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        @foreach ($surveys as $survey)
                            <!-- <h5 class="main-text-color">{{$survey->title}}</h5> -->

                            @foreach($survey->surveyQuestions as $surveyQuestion)
                                <div class="col-md-6">
                                    @if(auth()->user())
                                        @if(auth()->user()->canSubmitResponse($surveyQuestion))
                                            @include('front-end.home.survey-answer-form')
                                        @else
                                            <h5 class="my-3 text-left submitted-question-answer">Question: {{ $surveyQuestion->question }}</h5>
                                            <p class="my-3 text-left submitted-question-answer">Thank you for taking the survey</p>
                                        @endif
                                    @else
                                        @include('front-end.home.survey-answer-form')
                                    @endif<br>
                                </div>
                            @endforeach
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
<section class="call-to-action bg-warning">
    <div class="container-fluid h-100">
        <div class="row text-center align-items-center h-100 mt-5">
            @if (Auth::user())
                <div class="col-md-12">
                    <h1 class="main-text-color">Data Resources BD</h1>
                </div>
            @else
                <div class="col-md-2"></div>
                <div class="col-md-4">
                    <h1 class="main-text-color">Sign Up for Free</h1>
                </div>
                <div class="col-md-4">
                    <a href="{{ route('register') }}" class="btn btn-dark rounded-pill py-2 w-100 main-color">Sign Up</a>
                </div>
                <div class="col-md-2"></div>
            @endif
        </div>
    </div>
</section>


<section class="price py-5 main-color">
    <h1 class="text-center text-warning display-4 font-weight-bold">Our Pricing</h1>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card-group">
                    <div class="card bg-transparent border-0">
                        <div class="card-body">
                        <h6 class="text-warning my-4 font-weight-bold">Features</h6>
                        <p class="text-white price-text pt-4">News Aggregator</p>
                        <p class="text-white price-text">Data Matrix</p>
                        <p class="text-white price-text">Economy Data</p>
                        <p class="text-white price-text">Commodity Data</p>
                        <p class="text-white price-text">Industry Data</p>
                        <p class="text-white price-text">Publication</p>
                        <p class="text-white price-text">Quarterly Finance Statement</p>
                        <p class="text-white price-text">Annual Finance Statement</p>
                        </div>
                    </div>
                    <div class="card bg-transparent border border-warning">
                        <div class="card-body text-center">
                            <h6 class="text-warning font-weight-bold">Basic Account</h6>
                            <p class="text-white font-weight-bold price-text-2">(0 BDT)</p>
                            <p class="text-white price-text pt-4">Y</p>
                            <p class="text-white price-text">Y</p>
                            <p class="text-white price-text">Y</p>
                            <p class="text-white price-text">Y</p>
                            <p class="text-white price-text">Y</p>
                            <p class="text-white price-text">Y</p>
                            <p class="text-white price-text">Y</p>
                            <p class="text-warning price-text">N</p>
                        </div>
                    </div>
                    @foreach ($subscriptionplans as $subscriptionplan)
                    <div class="card bg-transparent border border-warning">
                        <div class="card-body text-center">
                            <h6 class="text-warning font-weight-bold">{{ $subscriptionplan->name}} <small>({{ $subscriptionplan->user_limit }} Users)</small></h6>
                            <div class="row">
                                <div class="col-6">
                                    <p class="text-white font-weight-bold price-text-2">BDT {{ $subscriptionplan->price_per_month }}/<br>month</p>
                                    <p class="text-white price-text">Y</p>
                                    <p class="text-white price-text">Y</p>
                                    <p class="text-white price-text">Y</p>
                                    <p class="text-white price-text">Y</p>
                                    <p class="text-white price-text">Y</p>
                                    <p class="text-white price-text">Y</p>
                                    <p class="text-white price-text">Y</p>
                                    <p class="text-white price-text">Y</p>
                                    @if(auth()->user())
                                        <form  method="post" action="{{ route('subscribe.plan') }}">
                                            @csrf
                                            <input type="hidden" name="price" value="{{ $subscriptionplan->price_per_month }}">
                                            <button type="submit" class="btn btn-outline-warning btn-sm">Get Started</button>
                                        </form>
                                    @else
                                        <td><a href="/login" class="btn btn-warning">Login</a></td>   
                                    @endif 
                                </div>
                                <div class="col-6">
                                    <p class="text-white font-weight-bold price-text-2">BDT {{ $subscriptionplan->price_per_year }}/year<br><span class="text-warning">{{ intval($subscriptionplan->discount($subscriptionplan->price_per_month , $subscriptionplan->price_per_year)) }}% Discount</span></p>
                                    <p class="text-white price-text">Y</p>
                                    <p class="text-white price-text">Y</p>
                                    <p class="text-white price-text">Y</p>
                                    <p class="text-white price-text">Y</p>
                                    <p class="text-white price-text">Y</p>
                                    <p class="text-white price-text">Y</p>
                                    <p class="text-white price-text">Y</p>
                                    <p class="text-white price-text">Y</p>
                                    @if(auth()->user())
                                        <form  method="post" action="{{ route('subscribe.plan') }}">
                                            @csrf
                                            <input type="hidden" name="price" value="{{ $subscriptionplan->price_per_year }}">
                                            <button type="submit" class="btn btn-outline-warning btn-sm">Get Started </button>
                                        </form>
                                    @else
                                        <td><a href="/login" class="btn btn-warning">Login</a></td>   
                                    @endif     
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>


{{-- <section class="pricing py-5 main-color">
    <div class="container">
      <div class="row no-gutters">
        <!-- Free Tier -->
        <div class="col-lg-4">
          <div class="card mb-5 mb-lg-0 border-top border-warning pb-4">
            <div class="card-body pb-5">
              <h5 class="card-title text-muted text-uppercase text-center">Available</h5>
              <h6 class="card-price text-center">Features</h6>
              <h6 class="card-title text-dark text-uppercase text-center">&nbsp;</h6>
              <hr>
              <ul class="fa-ul">
                <li>News Aggregator</li>
                <li>Data Matrix</li>
                <li>Economy Data</li>
                <li>Commodity Data</li>
                <li>Industry Data</li>
                <li>Publication</li>
                <li>Quarterly Finance Statement</li>
                <li>Annual Finance Statement</li>
              </ul>
            </div>
          </div>
        </div>
        <!-- Plus Tier -->
        <div class="col-lg-4">
          <div class="card mb-5 mb-lg-0 border-top border-warning">
            <div class="card-body">
              <h5 class="card-title text-muted text-uppercase text-center">Basic Account</h5>
              <h6 class="card-price text-center">0 bdt<span class="period">/month</span></h6>
              <h6 class="card-title text-dark text-uppercase text-center">&nbsp;</h6>
              <hr>
              <ul class="fa-ul text-center mr-5">
                <li><i class="fas fa-check"></i></li>
                <li><i class="fas fa-check"></i></li>
                <li><i class="fas fa-check"></i></li>
                <li><i class="fas fa-check"></i></li>
                <li><i class="fas fa-check"></i></li>
                <li><i class="fas fa-check"></i></li>
                <li><i class="fas fa-check"></i></li>
                <li class="text-muted"><i class="fas fa-times"></i></li>
              </ul>
              <a href="#" class="btn btn-block btn-warning">Register Now</a>
            </div>
          </div>
        </div>
        <!-- Pro Tier -->
        <div class="col-lg-4">
          <div class="card border-top border-warning">
            <div class="card-body">
              <h5 class="card-title text-muted text-uppercase text-center">Premium Account</h5>
              <div class="row custom-price-card-margin">
                <div class="col-lg-6 border-right">
                    <h6 class="card-price text-center">200bdt<span class="period">/month</span></h6>
                </div>
                <div class="col-lg-6">
                    <h6 class="card-price text-center">1200bdt<span class="period">/year</span></h6>
                    <h6 class="card-title text-dark border border-warning text-uppercase text-center">50% discount</h6>
                </div>
              </div>
              <hr>
              <ul class="fa-ul text-center mr-5">
                <li><i class="fas fa-check"></i></li>
                <li><i class="fas fa-check"></i></li>
                <li><i class="fas fa-check"></i></li>
                <li><i class="fas fa-check"></i></li>
                <li><i class="fas fa-check"></i></li>
                <li><i class="fas fa-check"></i></li>
                <li><i class="fas fa-check"></i></li>
                <li><i class="fas fa-check"></i></li>
              </ul>
              <a href="#" class="btn btn-block btn-warning">Register Now</a>
            </div>
          </div>
        </div>
      </div>
    </div>
</section> --}}


<section class="contact-us pb-5">
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-6 main-text-color border-right">
                <h1>Who We Are</h1>
                <p class="main-text-color">Data Resources BD aims to provide accurate and workable data to help you make e best investment decision. All the data are collected from secondary source.
                </p>
            </div>
            <div class="col-md-6">
                <h1 class="main-text-color">Contact Us</h1>
                <form action="{{route('contactus')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" placeholder="Message" name="body"></textarea>
                    </div>
                    <button class="btn btn-dark py-2 w-100 main-color" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

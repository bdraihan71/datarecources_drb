@extends('front-end.main-layout')

@section('content')
<header id="home">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card mb-3 custom-header-top">
                    <div class="row no-gutters news-background">
                        @if($featured)
                            <div class="col-md-8">
                                <img src="{{ env('S3_URL') }}{{$featured->image}}" class="card-img news-card-img rounded-0" alt="...">
                            </div>
                            <div class="col-md-4">
                                <div class="card-body text-right">
                                    <h5 class="card-title text-white">{{$featured->heading}}</h5>
                                    {{-- <p class="card-text text-white">{{$featured->body}}</p> --}}
                                    <p class="card-text text-white">{{implode(' ', array_slice(explode(' ', $featured->body), 0, 20))}}</p>
                                    <p class="card-text"><small class="text-muted">{{$featured->updated_at->diffForHumans()}}</small></p>
                                </div>
                            </div>
                        @else
                            <div class="col-md-8">
                                <img src="img/hero.jpg" class="card-img news-card-img rounded-0" alt="...">
                            </div>
                            <div class="col-md-4">
                                <div class="card-body text-right">
                                    <h5 class="card-title text-white">News title</h5>
                                    <p class="card-text text-white">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                </div>
                            </div>
                        @endif    
                    </div>
                </div>

                <div class="row"> 
                    @foreach ($allnews as $news)
                        <div class="col-md-3">
                            <div class="card border-0">
                                <img src="{{ env('S3_URL') }}{{ $news->image }}" class="card-img-top" alt="...">
                                <p class="card-text"><small>{{ $news->heading }}</small></p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="card-deck mt-5">
                    <div class="card border-0">
                        <h4 class="main-text-color">World</h4>
                        @if($world)
                            <img src="{{ env('S3_URL') }}{{$world->image}}" class="card-img-top" alt="...">
                            <p class="card-text"><small>{{$world->heading}}</small></p>
                        @else 
                            <img src="img/blur.jpg" class="card-img-top" alt="...">
                            <p class="card-text"><small>This is a longer card with supporting text below longer.</small></p>
                        @endif    
                    </div>

                    <div class="card border-0">
                        <h4 class="main-text-color">Country</h4>
                        @if($country)
                            <img src="{{ env('S3_URL') }}{{$country->image}}" class="card-img-top" alt="...">
                            <p class="card-text"><small>{{$country->heading}}</small></p>
                        @else 
                            <img src="img/blur.jpg" class="card-img-top" alt="...">
                            <p class="card-text"><small>This is a longer card with supporting text below longer.</small></p>
                        @endif   
                    </div>

                    <div class="card border-0">
                        <h4 class="main-text-color">Economy</h4>
                        @if($economy)
                            <img src="{{ env('S3_URL') }}{{$economy->image}}" class="card-img-top" alt="...">
                            <p class="card-text"><small>{{$economy->heading}}</small></p>
                        @else 
                            <img src="img/blur.jpg" class="card-img-top" alt="...">
                            <p class="card-text"><small>This is a longer card with supporting text below longer.</small></p>
                        @endif  
                    </div>

                    <div class="card border-0">
                        <h4 class="main-text-color">Company</h4>
                        @if($company)
                            <img src="{{ env('S3_URL') }}{{$company->image}}" class="card-img-top" alt="...">
                            <p class="card-text"><small>{{$company->heading}}</small></p>
                        @else 
                            <img src="img/blur.jpg" class="card-img-top" alt="...">
                            <p class="card-text"><small>This is a longer card with supporting text below longer.</small></p>
                        @endif   
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="iframe-div-1">
                    <iframe id="myIframe" is="x-frame-bypass" class="custom-header-top iframe-1" src="https://www.dsebd.org/" scrolling="no"></iframe>
                </div>
                <div class="iframe-div-2">
                    <iframe id="myIframe2" is="x-frame-bypass" class="iframe-2" src="https://www.dsebd.org/" scrolling="no"></iframe>
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

{{-- <script>
    var myIframe = document.getElementById('myIframe');
    myIframe.onload = function () {
         myIframe.contentWindow.scrollTo(9,512);
    }
</script>

<script>
    var myIframe2 = document.getElementById('myIframe2');
    myIframe2.onload = function () {
        myIframe2.contentWindow.scrollTo(9,212);
    }
</script> --}}
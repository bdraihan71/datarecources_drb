@extends('front-end.main-layout')

@section('content')
<header id="home">
    <div class="hero-background">
        <div class="container-fluid h-100">
            <div class="row align-items-center h-100">
                <div class="col-md-12 text-center text-white mt-5">
                    <h1 class="mb-3 mt-5">Bangladesh's First Aggregate Data Platform</h1>
                    <h4 class="my-4">More than 1000 Contents</h4>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <form action="{{route('search')}}" method="GET">
                                <div class="input-group">
                                    <input class="form-control border-secondary py-4 search-border border border-secondary" type="search" value="" name="search" placeholder=" Search by keyword">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-warning px-5 search-btn-border border border-secondary" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
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
                    @foreach ($surveys as $survey)
                            <!-- <h5 class="main-text-color">{{$survey->title}}</h5> -->
                            <div class="row">
                                @foreach($survey->surveyQuestions as $surveyQuestion)
                                    <div class="col-md-6">
                                        @if(auth()->user())
                                            @if(auth()->user()->canSubmitResponse($surveyQuestion))
                                                @include('front-end.home.survey-answer-form')
                                            @else
                                                <p>Question: {{ $surveyQuestion->question }}</p>
                                                <p>Thank you for taking the survey</p>
                                            @endif
                                        @else
                                            @include('front-end.home.survey-answer-form')      
                                        @endif<br>
                                    </div>
                                @endforeach
                            </div>
                    @endforeach
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

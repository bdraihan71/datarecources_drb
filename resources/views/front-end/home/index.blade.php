@extends('front-end.main-layout')
@section('content')
<header>
    <div class="hero-background">
        <div class="container-fluid h-100">
            <div class="row align-items-center h-100">
                <div class="col-md-12 text-center text-white">
                    <h1 class="mb-3">Bangladesh's First Aggregate Data Platform</h1>
                    <h4 class="mb-5">MORE THAN 2000 DATA</h4>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <input class="form-control border-secondary py-4 search-border border border-secondary" type="search" value="" placeholder=" Search by keyword">
                                <div class="input-group-append">
                                    <button class="btn btn-warning px-5 search-btn-border border border-secondary" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<section class="who-we-are">
    <div class="container h-100">
        <div class="row align-items-center h-100">
            <div class="col-md-5">
                <h1>WHO WE ARE</h1>
                <h5>DRB aims to provide accurate and workable data to help you make e best investment decision.
                    We want to be your one step solution for all kinds of data need.
                </h5>
            </div>
            <div class="col-md-7 text-center">
                <img src="/img/hero.jpg" class="img-fluid">
            </div>
        </div>
    </div>
</section>

<section class="analyze">
    <div class="container-fluid">
        <div class="row">
            <div class="header">
                <div class="inner-header flex mt-5">
                    <h1 class="my-md-5">START ANALYZE WITH</h1>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-md-4">
                                <button class="btn btn-warning rounded-pill my-2" type="submit">Annual Financial statement</button>
                            </div>
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-warning rounded-pill my-2" type="submit">Annual Financial statement</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">

                            </div>
                            <div class="col-md-5">
                                <button class="btn btn-warning rounded-pill my-2" type="submit">Annual Financial statement 2</button>
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-warning rounded-pill my-2" type="submit">Annual Financial statement</button>
                            </div>
                            <div class="col-md-2">

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <button class="btn btn-warning rounded-pill my-2" type="submit">Annual Financial statement</button>
                            </div>
                            <div class="col-md-5">
                                <button class="btn btn-warning rounded-pill my-2" type="submit">Annual Financial statement</button>
                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-warning rounded-pill my-2" type="submit">Annual Financial statement</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">

                            </div>
                            <div class="col-md-5">
                                <button class="btn btn-warning rounded-pill my-2" type="submit">Annual Financial statement 2</button>
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-warning rounded-pill my-2" type="submit">Annual Financial statement</button>
                            </div>
                            <div class="col-md-2">

                            </div>
                        </div>
                    </div>
                </div>

                <!--Waves Container-->
                <div>
                    <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
                        <defs>
                            <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
                        </defs>
                        <g class="parallax">
                            <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7" />
                            <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)" />
                            <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)" />
                            <use xlink:href="#gentle-wave" x="48" y="7" fill="#fff" />
                        </g>
                    </svg>
                </div>
                <!--Waves end-->
            </div>
        </div>
    </div>
</section>


@if(count($survey_results)>0)
    <section class="survey">
        <div class="container-fluid h-100">
            <div class="row text-center mt-5 align-items-center h-100">
                <div class="col-md-12">
                    <h1 class="my-5 survey-margin-top">Survey Result</h1>
                </div>

                @foreach ($survey_results as $survey)


                    <div class="col-md-6">
                        <p>{{$survey->title}}</p>
                        @foreach($survey->surveyQuestions as $surveyQuestion)
                            @include('front-end.home.survey-answer')

                            <div class="col-md-6">
                                <p>{{$surveyQuestion->question}}</p>
                                <canvas id="chDonut1{{$surveyQuestion->id}}"></canvas>
                            </div>
                            <script src="/vendor/chart.js/Chart.min.js"></script>

                            <script>
                            
                            /* chart.js chart examples */

                            // chart colors
                            var colors = ['#0066cc','#e67300','#a6a6a6','#c3e6cb','#dc3545','#6c757d'];

                            /* 3 donut charts */
                            var donutOptions = {
                            cutoutPercentage: 85, 
                            legend: {position:'bottom', padding:5, labels: {pointStyle:'circle', usePointStyle:true}}
                            };

                            // donut 1
                            var chDonutData1{{$surveyQuestion->id}} = {
                                labels: @json($surveyQuestion->surveyAnswerOptions->pluck('answer_option')),
                                datasets: [
                                {
                                    backgroundColor: colors.slice(0,3),
                                    borderWidth: 0,
                                    data: @json($surveyQuestion->surveyAnswerOptions->pluck('hit_count'))
                                }
                                ]
                            };

                            var chDonut1{{$surveyQuestion->id}} = document.getElementById("chDonut1{{$surveyQuestion->id}}");
                            if (chDonut1{{$surveyQuestion->id}}) {
                            new Chart(chDonut1{{$surveyQuestion->id}}, {
                                type: 'pie',
                                data: chDonutData1{{$surveyQuestion->id}},
                                options: donutOptions
                            });
                            }
                            </script>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif
@if(count($surveys)>0)
    <section class="survey">
        <div class="container-fluid h-100">
            <div class="row text-center mt-5 align-items-center h-100">
                <div class="col-md-12">
                    <h1 class="my-5 survey-margin-top">Participate in Survey</h1>
                </div>
                @foreach ($surveys as $survey)
                    <div class="col-md-6">
                        <h3>{{$survey->title}}</h3>
                        @foreach($survey->surveyQuestions as $surveyQuestion)
                            @if(auth()->user())
                                @if(auth()->user()->canSubmitResponse($surveyQuestion))
                                    @include('front-end.home.survey-answer-form')
                                @else
                                    @include('front-end.home.survey-answer')
                                @endif
                            @else
                                @include('front-end.home.survey-answer-form')      
                            @endif
                        @endforeach
                    </div>
                @endforeach
                
            </div>
        </div>
    </section>
@endif
<section class="call-to-action bg-warning">
    <div class="container-fluid h-100">
        <div class="row text-center align-items-center h-100 mt-5">
            <div class="col-md-2"></div>
            <div class="col-md-4">
                <h3>Sign Up for Free</h3>
            </div>
            <div class="col-md-4">
                <button class="btn btn-dark rounded-pill py-2 w-100" type="submit">Signup</button>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</section>


<section class="contact-us pb-5">
    <div class="container h-100">
        <div class="row text-center align-items-center h-100 mt-5">
            <div class="col-md-6">
                <h1>CONTACT US</h1>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" placeholder="Message"></textarea>
                </div>
                <button class="btn btn-dark py-2 w-100" type="submit">Submit</button>
            </div>
        </div>
    </div>
</section>
@endsection

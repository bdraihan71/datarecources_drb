@extends('layout')

@section('main-content')

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-light fixed-top nav-bg border-bottom mt-md-n4">
    <div class="container">
        <a class="navbar-brand text-white" href="#"><h2>DRB</h2></a>
        <button class="navbar-toggler custom-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown nav-custom-margin-top">
                    <a class="nav-link dropdown-toggle font-weight-bold text-white" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        MACRO
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item dropdown nav-custom-margin-top">
                    <a class="nav-link dropdown-toggle font-weight-bold text-white" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        COMMODITY
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item dropdown nav-custom-margin-top">
                    <a class="nav-link dropdown-toggle font-weight-bold text-white" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        COMPANY
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item dropdown nav-custom-margin-top">
                    <a class="nav-link dropdown-toggle nav-custom-margin-right font-weight-bold text-white" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        MARKET
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <form class="form-inline my-2 my-lg-0">
                    <button class="btn btn-warning my-2 my-sm-0 mx-1" type="submit">Sign Up</button>
                    <button class="btn btn-outline-warning my-2 my-sm-0 text-white mx-1" type="submit">Sign In</button>
                </form>
            </ul>
        </div>
    </div>
</nav>
  
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


<section class="survey">
    <div class="container-fluid h-100">
        <div class="row text-center mt-5 align-items-center h-100">
            <div class="col-md-12">
                <h1 class="my-5 survey-margin-top">Survey Result</h1>
            </div>
            <div class="col-md-6">
                <p>Do you think private sector credit growth will slow down?</p>
                <canvas id="chDonut1"></canvas>
            </div>
            <div class="col-md-6">
                <p>Do you think exchange rate will be BDT 87 per USD?</p>
                <div class="btn-group mb-3" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-success">Yes</button>
                    <button type="button" class="btn btn-primary">No</button>
                    <button type="button" class="btn btn-warning">May Be</button>
                </div>
                <div class="progress my-3">
                    <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="progress my-3">
                    <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="progress my-3">
                    <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
</section>


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


<section class="footer-main py-5">
    <div class="container h-100">
        <div class="row align-items-center h-100">
            <div class="col-md-3">
                <h1>DRB</h1>
            </div>
            <div class="col-md-3">
                <ul class="list-unstyled">
                    <li>Home</li>
                    <li>About</li>
                    <li>Support</li>
                </ul>
            </div>
            <div class="col-md-6">
                <label>Stay Updated</label>
                <div class="input-group">
                    <input type="email" class="form-control rounded-0" placeholder="Enter your email">
                    <span class="input-group-btn">
                    <button class="btn btn-warning rounded-0" type="submit">Subscribe</button>
                    </span>
                </div>
            </div>
            <div class="col-md-12 border-top border-light mt-5">
                <div class="text-center mt-5 w-100">
                    <span>Copyright © Data Resource BD 2019</span>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
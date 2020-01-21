@extends('back-end.admin-layout')

@section('content')
<style>
    .Header, .HeaderTop, .HeaderBottom, .navbar, .navbar-default,
    .carousel-inner, .carousel-example-generic, .fa, .fa-chevron-left,
    .panel-dse, .adsbygoogle, .RightCol, .col-md-12.col-xs-12.col-sm-12.mujib, .TBtn{
        display:none !important;
    }
    .col-xs-5 .col-sm-5 .LeftCol{
        display:none !important;
    }
    .tete{
        background-color: blue !important;
    }
    footer{
        display:none !important;
    }
    .clipping {
        clip-path: inset(0% 30% 74% 45%);
    }
</style>
<div class="graph">
    <div class="clipping" >
        {!!  $htmlContent !!}
    </div>
</div>
@include('back-end.stockinfo.stockinfo-datatable')

@endsection

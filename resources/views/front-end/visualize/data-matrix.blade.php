@extends('front-end.main-layout')

@section('content')
  @include('front-end.visualize.datatable', compact('stockinfos'))
@endsection
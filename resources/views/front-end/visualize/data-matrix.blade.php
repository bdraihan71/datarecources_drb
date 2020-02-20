@extends('front-end.main-layout')

@section('content')
  @foreach($sectors as $sector)
    @include('front-end.visualize.sector-datatable', compact('sector'))
  @endforeach
@endsection
@extends('front-end.main-layout')

@section('content')
<div class="container-fluid">
  <div class="row custom-header-top">
      <div class="col-md-12 mt-5">
        @foreach($sectors as $sector)
          @include('front-end.visualize.sector-datatable', compact('sector'))
        @endforeach
    </div>
  </div>
</div>
@endsection
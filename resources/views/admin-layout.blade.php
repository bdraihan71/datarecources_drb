@extends('layout')

@section('admin-content')

<div class="wrapper">
        
    @include('sidenav')

    <!-- Page Content  -->
    <div id="content">

        @include('topnav')

        <div id="content-wrapper">

            <div class="container-fluid">
      
              @include('breadcrumb')
      
              @include('page')
      
            </div>
            <!-- /.container-fluid -->
      
            @include('footer')
      
        </div>
        <!-- /.content-wrapper -->
    </div>
</div>

@endsection
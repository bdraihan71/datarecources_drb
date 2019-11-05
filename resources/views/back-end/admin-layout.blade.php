@extends('layout')

@section('admin-content')

<div class="wrapper">

    @include('back-end.partial.sidenav')

    <!-- Page Content  -->
    <div id="content">

        @include('back-end.partial.topnav')

        <div id="content-wrapper">

            <div class="container-fluid">

              @include('breadcrumb')
              @yield('content')

              {{-- @include('page') --}}

            </div>
            <!-- /.container-fluid -->

            @include('back-end.footer')

        </div>
        <!-- /.content-wrapper -->
    </div>
</div>

@endsection

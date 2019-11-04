@extends('layout')

@section('content')

<form  method="post" action="{{ route('menu.store') }}">
    @csrf
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
            <label>Menu Name</label>
            <input class="form-control" name="title"  value="{{ old('title') }}" type="text" placeholder="Enter Menu Name">
            </div>
        </div>

        {{-- <div class="col-md-4">
            <div class="form-group ">
                <label class="col-12 col-form-label">Parent Menu:<span class="text-danger">*</span> </label>
                <div class="col-12">
                    <select class="form-control dropdown-custom" name="parent_menu_id" require>
                    <option value="">Choose Menu</option>
                    @foreach($menus as $menu)
                        <option value="{{$menu->id}}"  {{ (old("parent_menu_id") == $menu->id ? "selected":"") }}>{{$menu->title}}</option>
                    @endforeach
                    </select>
                </div>
            </div>
        </div> --}}

        <div class="col-md-2">
            <label>.</label>
            <button type="submit" class="btn btn-outline-primary w-100">Submit</button>
        </div>
    </div>
</form>
@include('page.datatable')

@endsection
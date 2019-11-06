@extends('back-end.admin-layout')

@section('content')

<form  method="post" action="{{ route('menu.update', $menu->id) }}">
    @csrf
    @method('patch')
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
            <label>Menu Name</label>
            <input class="form-control" name="title"  value="{{ $menu->title}}" type="text" placeholder="Enter Menu Name">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group ">
                <label class="col-12 col-form-label">Parent Menu:<span class="text-danger">*</span> </label>
                <div class="col-12">
                    <select class="form-control dropdown-custom" name="parent_menu_id" require>
                        @foreach($allmenus as $allmenu)
                            @if ($menu->id == $allmenu->parent_menu_id))
                                <option value="{{$allmenu->id}}" selected>{{$allmenu->title}}</option>
                            @else
                                <option value="{{$allmenu->id}}">{{$allmenu->title}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="col-md-2">
            <label>.</label>
            <button type="submit" class="btn btn-outline-primary w-100">Update</button>
        </div>
    </div>
</form>

@endsection
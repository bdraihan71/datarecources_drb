@extends('back-end.admin-layout')

@section('content')

<form  method="post" action="{{ route('company.update', $company->id) }}">
    @csrf
    @method('patch')
    <div class="row">
            <div class="col-md-4">
                    <div class="form-group">
                    <label>Company Name</label>
                    <input class="form-control" name="name"  value="{{ $company->name }}" type="text" placeholder="Enter Company Name">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                    <label>Ticker </label>
                    <input class="form-control" name="ticker"  value="{{ $company->ticker }}" type="text" placeholder="Enter Ticker">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group ">
                        <label class="col-12 col-form-label">Sector:<span class="text-danger">*</span> </label>
                        <div class="col-12">
                            <select class="form-control dropdown-custom" name="sector_id" require>
                                @foreach($sectors as $sector)
                                    @if (($company->sector->id) == $sector->id))
                                        <option value="{{$sector->id}}" selected>{{$sector->name}}</option>
                                    @else
                                        <option value="{{$sector->id}}">{{$sector->name}}</option>
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

@extends('layouts.base')

@section('content')
    @include('sweetalert::alert')

    <label for="exampleInputEmail1" class="form-label">Farm Management</label>
    <hr>

    <form method="POST" action="{{ route('farms.update', $farm->id) }}" enctype="multipart/form">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <label for="exampleInputEmail1" class="form-label">Name </label>
                <input type="text" class="form-control" name="business_name" value="{{$farm->business_name}}" required>
            </div>
            <div class="col-md-6">
                <label for="exampleInputPassword1" class="form-label">Legal Owner</label>
                <input type="text" class="form-control" name="legal_owner_name" value="{{$farm->legal_owner_name}}" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="exampleInputEmail1" class="form-label">Farm Size Ha </label>
                <input type="text" class="form-control" name="farm_size_ha" value="{{$farm->farm_size_ha}}" required>
            </div>
            <div class="col-md-6">
                <label for="exampleInputPassword1" class="form-label">Farm Size Acres</label>
                <input type="text" class="form-control" name="farm_size_acres" value="{{$farm->farm_size_acres}}" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="exampleInputEmail1" class="form-label">Geolocation</label>
                <input type="text" class="form-control" name="geo_location_id" value="{{$farm->geo_location_id}}" required>
            </div>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection

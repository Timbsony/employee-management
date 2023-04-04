@extends('layouts.base')

@section('content')
    @include('sweetalert::alert')

    <label for="exampleInputEmail1" class="form-label">Farmer Management</label>
    <hr>

    <form method="POST" action="{{ route('farmers.update', $farmer->id) }}" enctype="multipart/form">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <label for="exampleInputEmail1" class="form-label">First Name</label>
                <input type="text" class="form-control" name="first_name" value="{{$farmer->first_name}}" required>
            </div>
            <div class="col-md-6">
                <label for="exampleInputPassword1" class="form-label">Surname</label>
                <input type="text" class="form-control" name="surname" value="{{$farmer->surname}}" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="exampleInputEmail1" class="form-label">Middle Name</label>
                <input type="text" class="form-control" name="middle_name" value="{{$farmer->middle_name}}" >
            </div>
            <div class="col-md-6">
                <label for="exampleInputPassword1" class="form-label">Alias</label>
                <input type="text" class="form-control" name="alias" value="{{$farmer->alias}}" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="exampleInputEmail1" class="form-label">National ID</label>
                <input type="text" class="form-control" name="national_id" value="{{$farmer->national_id}}" required>
            </div>
            <div class="col-md-6">
                <label for="exampleInputEmail1" class="form-label">Gender </label>
                <select type="text" class="form-control" id="validationDefault02" name="gender" required>
                    <option value="{{$farmer->gender}}">{{$farmer->gender}}</option>
                    <option value="MALE">MALE</option>
                    <option value="FEMALE">FEMALE</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="{{$farmer->email}}" required>
            </div>
            <div class="col-md-6">
                <label for="exampleInputEmail1" class="form-label">Date of Birth</label>
                <input type="date" class="form-control" name="dob" value="{{$farmer->dob}}" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="exampleInputEmail1" class="form-label">Phone Number</label>
                <input type="text" class="form-control" name="phone_number" value="{{$farmer->phone_number}}" required>
            </div>
            <div class="col-md-6">
                <label for="exampleInputEmail1" class="form-label">Image</label>
                <input type="file" class="form-control" name="image" value="{{$farmer->image}}" >
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="exampleInputEmail1" class="form-label">Residential Address</label>
                <input type="text" class="form-control" name="residential_address" value="{{$farmer->residential_address}}" required>
            </div>
            <div class="col-md-6">
                <label for="exampleInputEmail1" class="form-label">Postal Address</label>
                <input type="text" class="form-control" name="postal_address" value="{{$farmer->postal_address}}" >
            </div>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection

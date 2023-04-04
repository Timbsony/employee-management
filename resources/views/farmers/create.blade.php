@extends('layouts.base')

@section('content')
    @include('sweetalert::alert')

    <label for="exampleInputEmail1" class="form-label">Farmers Management</label>
    <hr>
    <form method="POST" action="{{ route('farmers.store') }}" enctype="multipart/form">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <label for="exampleInputEmail1" class="form-label">First Name</label>
                <input type="text" class="form-control" name="first_name" required>
            </div>
            <div class="col-md-6">
                <label for="exampleInputPassword1" class="form-label">Surname</label>
                <input type="text" class="form-control" name="surname" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="exampleInputEmail1" class="form-label">Middle Name</label>
                <input type="text" class="form-control" name="middle_name" >
            </div>
            <div class="col-md-6">
                <label for="exampleInputPassword1" class="form-label">Alias</label>
                <input type="text" class="form-control" name="alias" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="exampleInputEmail1" class="form-label">National ID</label>
                <input type="text" class="form-control" name="national_id" required >
            </div>
            <div class="col-md-6">
                <label for="exampleInputEmail1" class="form-label">Gender</label>
                <select class="form-control" name="gender" required="">
                    <option value="MALE" selected="">MALE</option>
                    <option value="FEMALE" selected="">FEMALE</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="exampleInputEmail1" class="form-label">Email </label>
                <input type="email" class="form-control" name="email" required >
            </div>
            <div class="col-md-6">
                <label for="exampleInputEmail1" class="form-label">Date of Birth </label>
                <input type="date" class="form-control" name="dob" required >
            </div>

        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="exampleInputEmail1" class="form-label">Phone Number </label>
                <input type="text" class="form-control" name="phone_number" required >
            </div>
            <div class="col-md-6">
                <label for="exampleInputEmail1" class="form-label">Image</label>
                <input type="file" class="form-control" name="image"  >
            </div>

        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="exampleInputEmail1" class="form-label">Residential Address </label>
                <textarea  class="form-control" name="residential_address"  ></textarea>
            </div>
            <div class="col-md-6">
                <label for="exampleInputEmail1" class="form-label">Postal Address</label>
                <textarea  class="form-control" name="postal_address"  ></textarea>
            </div>

        </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection

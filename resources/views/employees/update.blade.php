@extends('layouts.base')

@section('content')
    @include('sweetalert::alert')

    <label for="exampleInputEmail1" class="form-label">update {{ $employee->name }}</label>
    <hr>

    <form method="POST" action="{{ route('employees.update', $employee->id) }}" enctype="multipart/form">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <label for="exampleInputEmail1" class="form-label"> Name</label>
                <input type="text" class="form-control" name="name" value="{{$employee->name}}" required>
            </div>
            <div class="col-md-6">
                <label for="exampleInputPassword1" class="form-label">Designation</label>
                <input type="text" class="form-control" name="designation" value="{{$employee->designation}}" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="{{$employee->email}}" >
            </div>
            <div class="col-md-6">
                <label for="exampleInputPassword1" class="form-label">Phone</label>
                <input type="text" class="form-control" name="phone" value="{{$employee->phone}}" required>
            </div>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection

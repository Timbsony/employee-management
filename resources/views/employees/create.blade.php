@extends('layouts.base')

@section('content')
    @include('sweetalert::alert')
    <label for="exampleInputEmail1" class="form-label">Employee Management</label>
    <hr>
    <form method="POST" action="{{ route('employees.store') }}" enctype="multipart/form">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <label for="exampleInputEmail1" class="form-label"> Name</label>
                <input type="text" class="form-control" name="name" required>
                @if ($errors->has('name'))
                    <div class="error" style="color: red">{{ $errors->first('name') }}</div>
                @endif
            </div>
            <div class="col-md-6">
                <label for="exampleInputEmail1" class="form-label">Designation</label>
                <input type="text" class="form-control" name="designation" required >
                @if ($errors->has('designation'))
                    <div class="error" style="color: red">{{ $errors->first('designation') }}</div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="exampleInputPassword1" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" required>
                @if ($errors->has('email'))
                    <div class="error" style="color: red">{{ $errors->first('email') }}</div>
                @endif
            </div>
            <div class="col-md-6">
                <label for="exampleInputPassword1" class="form-label">Phone</label>
                <input type="text" class="form-control" name="phone" required>
                @if ($errors->has('phone'))
                    <div class="error" style="color: red">{{ $errors->first('phone') }}</div>
                @endif
            </div>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection

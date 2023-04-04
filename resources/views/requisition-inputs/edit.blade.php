@extends('layouts.base')

@section('content')
    @include('sweetalert::alert')

    <label for="exampleInputEmail1" class="form-label">Inventory Management</label>
    <hr>

    <form method="POST" action="{{ route('inventories.update', $inventory->id) }}" enctype="multipart/form">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <label for="exampleInputEmail1" class="form-label">Name </label>
                <input type="text" class="form-control" name="input_name" value="{{$inventory->input_name}}" required>
            </div>
            <div class="col-md-6">
                <label for="exampleInputPassword1" class="form-label">Quantity</label>
                <input type="text" class="form-control" name="quantity" value="{{$inventory->quantity}}" required>
            </div>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection

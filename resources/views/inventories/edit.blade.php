@extends('layouts.base')

@section('content')
    @include('sweetalert::alert')

    <label for="exampleInputEmail1" class="form-label">Currency Management</label>
    <hr>

    <form method="POST" action="{{ route('currencies.update', $currency->id) }}" enctype="multipart/form">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <label for="exampleInputEmail1" class="form-label">Currency Code</label>
                <input type="text" class="form-control" name="currency_code" value="{{$currency->currency_code}}" required>
            </div>
            <div class="col-md-6">
                <label for="exampleInputPassword1" class="form-label">Rate</label>
                <input type="text" class="form-control" name="rate" value="{{$currency->rate}}" required>
            </div>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection

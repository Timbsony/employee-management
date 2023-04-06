@extends('layouts.base')

@section('content')
    @include('sweetalert::alert')

    <label for="exampleInputEmail1" class="form-label">Requisition Cash</label>
    <hr>

    <form method="POST" action="{{ route('requisitionCash.update', $cash->id) }}" enctype="multipart/form">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <label for="exampleInputEmail1" class="form-label">Amount </label>
                <input type="text" class="form-control" name="amount_requested" value="{{$cash->amount_requested}}" required>
            </div>
            <div class="col-md-6">
                <label for="exampleInputPassword1" class="form-label">Reason</label>
                <input type="text" class="form-control" name="reason_for_request" value="{{$cash->reason_for_request}}" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="exampleInputEmail1" class="form-label">Loan </label>
                <input type="text" class="form-control" name="loan_classification" value="{{$cash->loan_classification}}" required>
            </div>
            <div class="col-md-6">
                <label for="exampleInputPassword1" class="form-label">Interest Rate</label>
                <input type="text" class="form-control" name="interest_rate" value="{{$cash->interest_rate}}" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="exampleInputEmail1" class="form-label">Payment Period </label>
                <input type="text" class="form-control" name="payment_period_months" value="{{$cash->payment_period_months}}" required>
            </div>
            <div class="col-md-6">
                <label for="exampleInputPassword1" class="form-label">Acknowledgement</label>
                <select type="text" class="form-control" id="validationDefault02" name="acknowledgement_of_debt_signed" required>
                    <option value="{{$cash->acknowledgement_of_debt_signed}}">{{$cash->acknowledgement_of_debt_signed}}</option>
                    <option value="0">0</option>
                    <option value="1">1</option>
                </select>
            </div>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection

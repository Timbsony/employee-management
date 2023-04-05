@extends('layouts.base')

@section('content')
    @include('sweetalert::alert')
    <label for="exampleInputEmail1" class="form-label">Requisition Inputs</label>
    <hr>
   <div align="right"><a href="{{ route('requisitionInputs.create') }}" class="btn btn-success my-2" >Create</a></div>
    <div class="py-5">
        <table class="table table-row-dashed table-row-gray-300 gy-7" id="example">
            <thead>
            <tr class="fw-bolder fs-6 text-gray-800">
                <th>ID</th>
                <th>Name</th>
                <th>Amount</th>
                <th>Reason</th>
                <th>Loan</th>
                <th>Interest</th>
                <th>Payment</th>
                <th>Acknowledgement</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($records as $item)
                <tr>

                    <td>{{ $item->id }}</td>
                    <td>{{ $item->input_name }}</td>
                    <td>{{ $item->amount_requested }}</td>
                    <td>{{ $item->reason_for_request }}</td>
                    <td>{{ $item->loan_classification }}</td>
                    <td>{{ $item->interest_rate }}</td>
                    <td>{{ $item->payment_period_months }}</td>
                    <td>{{ $item->acknowledgement_of_debt_signed }}</td>
                <td>
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           Actions
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{route("requisitionInputs.edit",$item->id) }}">Edit</a>
                            <a class="dropdown-item" href="{{route("requisitionInputs.destroy",$item->id) }}">Delete</a>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

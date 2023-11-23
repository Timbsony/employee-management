@extends('layouts.base')

@section('content')
    @include('sweetalert::alert')
    <label for="exampleInputEmail1" class="form-label">Employees Management</label>
    <hr>
    <div align="right"><a href="{{ route('employees.create') }}" class="btn btn-success my-2" >Create</a></div>
    <div class="py-5">
        <table class="table table-row-dashed table-row-gray-300 gy-7" id="example">
            <thead>
            <tr class="fw-bolder fs-6 text-gray-800">
                <th>ID</th>
                <th>Name</th>
                <th>Designation</th>
                <th>Email</th>
                <th>Phone</th>
            </tr>
            </thead>
            <tbody>
            @foreach($employees as $employee)
                <tr>

                    <td>{{ $employee->id }}</td>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->designation }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->phone }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

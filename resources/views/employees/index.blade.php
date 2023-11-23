@extends('layouts.base')

@section('content')
    @include('sweetalert::alert')
    <label for="exampleInputEmail1" class="form-label">Employees Management</label>
    <hr>
    <div align="right"><a href="{{ route('employees.create') }}" class="btn btn-success my-2" ><i class="fa fa-plus" aria-hidden="true"></i>Add Employee</a>&nbsp;&nbsp;
        <a href="{{ route('employees.pdf') }}" class="btn btn-primary my-2" ><i class="fas fa-file-download"></i>Export PDF</a></div>
    <div class="py-5">
        <table class="table table-row-dashed table-row-gray-300 gy-7" id="example">
            <thead>
            <tr class="fw-bolder fs-6 text-gray-800">
                <th>ID</th>
                <th>Name</th>
                <th>Designation</th>
                <th>Email</th>
                <th>Phone</th>
                <th></th>
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
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Actions
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{route("employees.edit",$employee->id) }}">
                                    <button type="submit" class="btn btn-xs btn-success btn-flat" title='Edit'><i class="fa fa-edit" aria-hidden="true"></i>Update</button>
                                </a>
                                    <form method="POST" action="{{ route('employees.destroy', $employee->id) }}">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'><i class="fa fa-trash"></i>Delete</button>
                                    </form>
                               {{-- <a class="dropdown-item" href="{{route("employees.destroy",$employee->id) }}">Delete</a>--}}
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">

        $('.show_confirm').click(function(event) {
            var form =  $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                title: `Are you sure you want to delete this record?`,
                text: "If you delete this, it will be gone forever.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });

    </script>
@endsection

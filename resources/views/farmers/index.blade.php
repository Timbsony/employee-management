@extends('layouts.base')

@section('content')
    @include('sweetalert::alert')
    <label for="exampleInputEmail1" class="form-label">Farmers Management</label>
    <hr>
   <div align="right"><a href="{{ route('farmers.create') }}" class="btn btn-success my-2" >Create</a></div>
    <div class="py-5">
        <table class="table table-row-dashed table-row-gray-300 gy-7" id="example">
            <thead>
            <tr class="fw-bolder fs-6 text-gray-800">
                <th>ID</th>
                <th>Name</th>
                <th>Surname</th>
                <th>Farm</th>
                <th>Middle Name</th>
                <th>Gender</th>
                <th>Email</th>
                <th>National ID</th>
                <th>DOB</th>
                <th>Res address</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($records as $item)
            <tr>

                <td>{{ $item->id }}</td>
                <td>{{ $item->first_name }}</td>
                <td>{{ $item->surname }}</td>
                <td>@if($item->farm_id != null)
                    {{  \App\Models\Farm::find($item->farm_id)->business_name}}
                @endif
                <td>{{ $item->middle_name }}</td>
                <td>{{ $item->gender }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->national_id }}</td>
                <td>{{ $item->dob }}</td>
                <td>{{ $item->residental_address }}</td>
                <td>
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           Actions
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{route("farmers.edit",$item->id) }}">Edit</a>
                            <a class="dropdown-item" href="{{route("farmers.allocate",$item->id) }}">Allocate Farm</a>
                            <a class="dropdown-item" href="#">Add Inputs</a>
                            <a class="dropdown-item" href="{{route("farmers.destroy",$item->id) }}">Delete</a>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

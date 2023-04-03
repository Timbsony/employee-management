@extends('layouts.base')

@section('content')
    @include('sweetalert::alert')
    <label for="exampleInputEmail1" class="form-label">Inventory Management</label>
    <hr>
   <div align="right"><a href="{{ route('inventories.create') }}" class="btn btn-success my-2" >Create</a></div>
    <div class="py-5">
        <table class="table table-row-dashed table-row-gray-300 gy-7" id="example">
            <thead>
            <tr class="fw-bolder fs-6 text-gray-800">
                <th>ID</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Created at</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($records as $item)
            <tr>

                <td>{{ $item->id }}</td>
                <td>{{ $item->input_name }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ $item->created_at }}</td>
                <td>
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           Actions
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{route("inventories.edit",$item->id) }}">Edit</a>
                            <a class="dropdown-item" href="{{route("inventories.destroy",$item->id) }}">Delete</a>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

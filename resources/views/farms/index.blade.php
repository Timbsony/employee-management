@extends('layouts.base')

@section('content')
    @include('sweetalert::alert')
    <label for="exampleInputEmail1" class="form-label">Farm Management</label>
    <hr>
   <div align="right"><a href="{{ route('farms.create') }}" class="btn btn-success my-2" >Create</a></div>
    <div class="py-5">
        <table class="table table-row-dashed table-row-gray-300 gy-7" id="example">
            <thead>
            <tr class="fw-bolder fs-6 text-gray-800">
                <th>ID</th>
                <th>Name</th>
                <th>Legal Owner</th>
                <th>Farm size Ha</th>
                <th>Farm size Acre</th>
                <th>Geolocation</th>
                <th>Created at</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($records as $item)
            <tr>

                <td>{{ $item->id }}</td>
                <td>{{ $item->business_name }}</td>
                <td>{{ $item->legal_owner_name }}</td>
                <td>{{ $item->farm_size_ha }}</td>
                <td>{{ $item->farm_size_acres }}</td>
                <td>{{ $item->geo_location_id }}</td>
                <td>{{ $item->created_at }}</td>
                <td>
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           Actions
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{route("farms.edit",$item->id) }}">Edit</a>
                            <a class="dropdown-item" href="{{route("farms.destroy",$item->id) }}">Delete</a>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

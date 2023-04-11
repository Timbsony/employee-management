@extends('layouts.base')

@section('content')
    @include('sweetalert::alert')

    <label for="exampleInputEmail1" class="form-label">Allocate Farm</label>
    <hr>
    <form method="POST" action="{{ route('farmers.assign', $farmer->id) }}" enctype="multipart/form">
        @csrf

        <table class="table table-row-dashed table-row-gray-300 gy-7" id="example">
            <thead>
            <tr class="fw-bolder fs-6 text-gray-800">
                <th>Name</th>
                <th>Surname</th>
                <th>Gender</th>
                <th>National ID</th>
                <th>Res address</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $farmer->first_name }}</td>
                    <td>{{ $farmer->surname }}</td>
                    <td>{{ $farmer->gender }}</td>
                    <td>{{ $farmer->national_id }}</td>
                    <td>{{ $farmer->residental_address }}</td>
                </tr>
            </tbody>
        </table>
        <br/>
        <br/>

        <div class="row">
           Allocate Farm
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="exampleInputPassword1" class="form-label">Farms</label>
                <select class="form-control" name="farm_id" required="" >
                @foreach ($farms as $farm)
                        <option value="{{$farm->id}}" selected="">{{$farm->business_name}}</option>
                    @endforeach
                    <option selected="">Please Choose</option>

                </select>
            </div>
        </div>

        <input type="text" class="form-control" name="first_name" value="{{$farmer->first_name}}" hidden required>
        <input type="text" class="form-control" name="surname" value="{{$farmer->surname}}" hidden required>
        <input type="text" class="form-control" name="middle_name" value="{{$farmer->middle_name}}" hidden >
        <input type="text" class="form-control" name="alias" value="{{$farmer->alias}}" hidden required>
        <input type="text" class="form-control" name="national_id" value="{{$farmer->national_id}}" hidden required>
        <input type="text" class="form-control" name="gender" value="{{$farmer->gender}}" hidden required>
        <input type="email" class="form-control" name="email" value="{{$farmer->email}}" hidden required>
        <input type="date" class="form-control" name="dob" value="{{$farmer->dob}}" hidden required>
        <input type="text" class="form-control" name="phone_number" value="{{$farmer->phone_number}}" hidden required>
        <input type="text" class="form-control" name="residential_address" value="{{$farmer->residential_address}}" hidden required>
        <input type="text" class="form-control" name="postal_address" value="{{$farmer->postal_address}}" hidden >
        <input type="file" class="form-control" name="image" value="{{$farmer->image}}" hidden >
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection

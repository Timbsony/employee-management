@extends('layouts.base')

@section('content')
    @include('sweetalert::alert')

    <label for="exampleInputEmail1" class="form-label">Allocate Farm</label>
    <hr>

    <form method="POST" action="{{ route('farmers.update', $farmer->id) }}" enctype="multipart/form">
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
                </select>
            </div>
        </div>

        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection

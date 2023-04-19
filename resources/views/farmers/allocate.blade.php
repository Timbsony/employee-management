@extends('layouts.base')

@section('content')
    @include('sweetalert::alert')

    <label for="exampleInputEmail1" class="form-label"><h3>Allocate {{ $farmer->first_name }}-{{ $farmer->surname }}  Farm</h3></label>
    <hr>

    <form method="POST" action="{{ route('farms.search') }}" enctype="multipart/form">
        @csrf

        <div class="row mx-auto" >
            <h6>
            Search Farm
            </h6>
        </div>
        <div class="row">
            <input type="text" class="form-control" name="business_name" placeholder="Enter Farm Name" >
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <br>
    <br>
    <hr>


    @if(session("farms"))
        @php $farmSearch = session("farms") @endphp
        <form method="POST" action="{{ route('farmers.assign', $farmer->id) }}" enctype="multipart/form">
        @csrf

        <div class="row mx-auto">
            <h6>
           Please Choose Correct Farm
            </h6>
        </div>
        <div class="row">
            <select class="form-control" name="farm_id" required="" >
                @foreach ($farmSearch as $farm)
                    <option value="{{$farm->id}}" selected="">{{$farm->business_name}} - {{$farm->legal_owner_name}}</option>
                @endforeach
            </select>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    @endif

@endsection

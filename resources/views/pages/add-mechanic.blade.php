@extends('mechanicTemplate.app')

@section('content')
<h1 class="mt-4">Pridėti servisa</h1>
@include('mechanicTemplate/_partials/errors')
<form action="/storeMechanic" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group m-1">
        <input type="text" name="firstName" class="form-control" placeholder="Vardas">
    </div>
    <div class="form-group m-1">
        <input type="text" name="lastName" class="form-control" placeholder="Pavarde">
    </div>
    <div class="form-group m-1">
        <input type="text" name="specialization" class="form-control" placeholder="Specializacija">
    </div>
    <div class="form-group m-1">
        <label>Mechaniko nuotrauka</label>
        <input type="file" name="poster" class="form-control">
    </div>
    <div class="form-group m-1">
        <input type="text" name="city" class="form-control" placeholder="Miestas">
    </div>
    <div class="form-group m-1">
        <select name="service" class="form-control">
            <option selected disabled>--Pasirinkite kategorija--</option>
            @foreach($services as $service)
            <option value="{{$service->title}}">{{$service->title}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group m-1">
        <button type="submit" class="btn btn-primary">Saugoti</button>
    </div>
</form>
@endsection
@extends('mechanicTemplate.app')

@section('content')
<h1 class="mt-4">Pakeisti servisa</h1>
@include('mechanicTemplate/_partials/errors')
<form action="/service/update/{{$service->id}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group m-1">
        <input type="text" name="title" class="form-control" placeholder="Serviso pavadinimas" value="{{$service->title}}">
    </div>
    <div class="form-group m-1">
        <input type="text" name="location" class="form-control" placeholder="Lokacija" value="{{$service->location}}">
    </div>
    <div class="form-group m-1">
        <input type="text" name="owner" class="form-control" placeholder="Savininkas" value="{{$service->owner}}">
    </div>
    <div class="form-group m-1">
        <button type="submit" class="btn btn-primary">Saugoti</button>
    </div>
</form>
@endsection
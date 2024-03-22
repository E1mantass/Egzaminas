@extends('mechanicTemplate.app')

@section('content')
<h1 class="mt-4">Pridėti servisa</h1>
@include('mechanicTemplate/_partials/errors')
<form action="/store/service" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group m-1">
        <input type="text" name="title" class="form-control" placeholder="Serviso pavadinimas">
    </div>
    <div class="form-group m-1">
        <input type="text" name="location" class="form-control" placeholder="Lokacija">
    </div>
    <div class="form-group m-1">
        <input type="text" name="owner" class="form-control" placeholder="Savininkas">
    </div>
    <div class="form-group m-1">
        <button type="submit" class="btn btn-primary">Saugoti</button>
    </div>
</form>
@endsection
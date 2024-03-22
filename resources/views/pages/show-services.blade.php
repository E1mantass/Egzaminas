@extends('mechanicTemplate.app')

@section('content')
<h1 class="mt-4">Servisai</h1>
@include('mechanicTemplate/_partials/errors')

<button class="btn"><a href="/add-service" alt="">Prideti servisa</a></button>

<table class="table">
    <tr>
        <th>Pavadinimas</th>
        <th>Lokacija</th>
        <th>Savininkas</th>
        <th></th>
        <th></th>
    </tr>
    @foreach($services as $service)
    <tr>
        <td>{{$service->title}}</td>
        <td>{{$service->location}}</td>
        <td>{{$service->owner}}</td>
        <td><a href="service/edit/{{$service->id}}" alt="">Redaguoti</a></td>
        <td><a href="service/delete/{{$service->id}}" alt="">Salinti</td>
    </tr>
    @endforeach
</table>


@endsection
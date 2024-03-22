@extends('mechanicTemplate.app')

@section('content')
<h1 class="mt-4">Servisai</h1>
@include('mechanicTemplate/_partials/errors')

<button class="btn"><a href="/add-mechanic" alt="">Prideti mechanika</a></button>

<table class="table">
    <tr>
        <th>Vardas</th>
        <th>Pavarde</th>
        <th>Specializacija</th>
        <th>Nuotrauka</th>
        <th>Miestas</th>
        <th>Servisas</th>
        <th></th>
        <th></th>
    </tr>
    @foreach($mechanics as $mechanic)
    <tr>
        <td>{{$mechanic->firstName}}</td>
        <td>{{$mechanic->lastName}}</td>
        <td>{{$mechanic->specialization}}</td>
        <td>{{$mechanic->poster}}</td>
        <td>{{$mechanic->city}}</td>
        <td>{{$mechanic->service}}</td>
        <td><a href="mechanic/edit/{{$mechanic->id}}" alt="">Redaguoti</a></td>
        <td><a href="mechanic/delete/{{$mechanic->id}}" alt="">Salinti</td>
    </tr>
    @endforeach
</table>


@endsection
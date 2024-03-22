@extends('mechanicTemplate.app')

@section('content')
<h1 class="mt-4">Servisai ir ju Mechanikai</h1>    
<div class="row">
    <form>
        
    </form>
    @foreach($services as $service)
    <div class="col-4">
        <div class="card">
            <ul>
                <li>{{$service->title}}</li>
                <li>{{$service->location}}</li>
                <li>{{$service->owner}}</li>
                <li><a href="/service/{{$service->id}}">Placiau...</a></li>
            </ul>
        </div>
    </div>
    @endforeach
</div>

@endsection
@extends('master')

@section('title','cities')

@section('content')

<h1>List of cities</h1>

<ul>
@foreach($cities as $city)
<li>
{{$city->id}} : {{$city->name}}
<br>
</li>

@endforeach
</ul>

@endsection
@extends('master')

@section('title','provinces')

@section('content')

<h1>List of provinces</h1>

<ul>
@foreach($provinces as $province)
<li>
<a href="/cities/{{$province->id}}">
{{$province->id}} : {{$province->name}}
</a>
<br>
</li>

@endforeach
</ul>

@endsection
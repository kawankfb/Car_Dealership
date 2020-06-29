@extends('master')

@section('title','cities')

@section('content')

<h1>List of cities</h1>
{{utf8_encode($cities)}}

@foreach ($cities as $city)

{{$city->name}}
@endforeach
<div class="btn btn-default">{{$cities->links()}}</div>

@endsection
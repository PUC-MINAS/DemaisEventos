@extends('layouts.admin')

@section('content')
<h1>Bem Vindo, {{Auth::user()->name}}</h1>
<a class="btn btn-primary" href="{{route('eventos/create')}}">Novo Evento</a>
@endsection
@extends('website.layout')
@section('title',       'Presupuesto')
@section('description', 'Seleccione un Perfil')
@section('keywords',    'Perfiles')
@section('author',      'Cautex')

@section('content')
<div class="container">
	<form-presupuesto class="my-5" url-action="{{ route('website.presupuesto') }}"></form-presupuesto>
</div>
@endsection
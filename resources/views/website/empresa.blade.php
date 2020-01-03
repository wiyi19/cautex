@extends('website.layout')
@section('title',       'Nuestros Perfiles')
@section('description', 'Seleccione un Perfil')
@section('keywords',    'Perfiles')
@section('author',      'Klockmetal')

@section('content')
@include('website.components.banner')
<div>
	<div class="container py-7">
		<div class="row empresa">
			<div class="col-md-6">
				<div>{!! $empresa->texto1 !!}</div>
			</div>
			<div class="col-md-6">
				<div>{!! $empresa->texto2 !!}</div>
			</div>
		</div>
	</div>
</div>
<div>
	<img class="w-100" src="{{ asset(Storage::url($imagenempresa->imagen))}}">
</div>

@endsection
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
				<div>textooooooooooooooooooooooooooooooo</div>
			</div>
			<div class="col-md-6">
				<div>textooooooooooooooooooooooooooooooo</div>
			</div>
		</div>
	</div>
</div>
<div>
	<div class="container-fluid">
	 	<div class="row imagenempresa">
			<div class="col-md-12">
   				<img src="{{ asset(Storage::url($imagenempresa->imagen))}}">
   			</div>
   		<div>
    </div>
</div>

@endsection
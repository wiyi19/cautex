@extends('website.layout')
@section('title',       'Empresa')
@section('description', 'Fabricantes de burletes para empresas y mayoristas')
@section('keywords',    'Perfiles')
@section('author',      'Cautex')
@section('navbar_fixed', true)

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
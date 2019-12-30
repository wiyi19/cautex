@extends('website.layout')
@section('title',       'Nuestros Perfiles')
@section('description', 'Seleccione un Perfil')
@section('keywords',    'Perfiles')
@section('author',      'Klockmetal')

@section('content')
@include('website.components.banner')
<div class="container">
	<div class="row mt-5">
		@foreach ($familias as $item)
		<a href="" class="col-md-4 home-familia-box" style="background-image: url({{ asset(Storage::url($item->imagen))}});">
			<div class="home-familia-box-space"></div>
			<div class="home-familia-box-overlay">
				<i class="fas fa-plus"></i>
			</div>
			<div class="home-familia-box-text">{{ $item->texto1 }}</div>
		</a>
		@endforeach
	</div>
</div>
<div class="container">
	<h3 class="section-title mt-10 mb-5">MATERIALES</h3>
	<div class="row">
		@foreach ($materiales as $material)
		<div class="col home-materiales-box">
			<img src="{{ asset(Storage::url($material->imagen))}}">
			<span>{{ $material->texto2 }}</span>
			<hr>
		</div>
		@endforeach
	</div>
</div>
<div style="background-color: #F5F5F5">
	<div class="container py-12">
		<div class="row home-soluciones">
			<div class="col-md-6">
				<div class="home-soluciones-titulo">Ofrecemos un alto desempeño en soluciones de caucho</div>
				<div>Contacte a nuestros especialistas (54 011) 7520-3572</div>
			</div>
			<div class="col-md-6">
				<div class="home-soluciones-item">
					<img src="{{ asset('img/website/soluciones-1.png')}}">
					<span>Amplia variedad de materiales</span>
				</div>
				<div class="home-soluciones-item">
					<img src="{{ asset('img/website/soluciones-2.png')}}">
					<span>Abastecedores de las industrias más exigentes</span>
				</div>
				<div class="home-soluciones-item">
					<img src="{{ asset('img/website/soluciones-3.png')}}">
					<span>Aseguramos rapidez en las entregas</span>
				</div>
				<div class="home-soluciones-item">
					<img src="{{ asset('img/website/soluciones-4.png')}}">
					<span>Desarrollos integrales de alta calidad</span>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

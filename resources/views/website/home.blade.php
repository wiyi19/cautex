@extends('website.layout')
@section('title',       'Nuestros Perfiles')
@section('description', 'Seleccione un Perfil')
@section('keywords',    'Perfiles')
@section('author',      'Klockmetal')
@section('navbar_fixed', true)

@section('content')
@include('website.components.banner')
<div class="container">
	<div class="row mt-5">
		@foreach ($familias as $item)
		<a href="" class="col-md-4 home-familia-box" style="background-image: url({{ asset(Storage::url($item->imagen))}});">
			<div class="home-familia-box-space"></div>
			<div class="home-familia-box-overlay">
				<i class="fas fa-search-plus"></i>
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
		<div class="col-12 col-md-4 col-lg home-materiales-box">
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
				<div class="home-soluciones-titulo">{{$soluciones_textos->texto1}}</div>
				<div>{!! $soluciones_textos->texto2 !!}</div>
			</div>
			@foreach ($soluciones_iconos as $item)
			<div class="col-md-6">
				<div class="home-soluciones-item">
					<img src="{{ asset(Storage::url($item->imagen))}}">
					<span>{{ $item->texto1 }}</span>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div>
<div class="container">
	<h3 class="section-title mt-10 mb-5">{{ $banner_rubros_texto->texto1 }}</h3>
</div>
<div id="carouselRubros" class="carousel slide" data-ride="carousel">
	<ol class="carousel-indicators custom-carousel-indicators">
		@foreach ($banner_rubros as $key => $item)
		<li data-target="#carouselRubros" data-slide-to="{{ $key }}" class="{{ $loop->first?'active':'' }}">
			{{ $item->texto1 }}
		</li>
		@endforeach
	</ol>
	<div class="carousel-inner">
		@foreach ($banner_rubros as $item)
		<div class="carousel-item {{ $loop->first?'active':'' }}" style="background-image: url({{ asset(Storage::url($item->imagen))}});">
			<div class="banner-rubros__overlay">
			</div>
			<div class="carousel-content">
				<div class="container">
				</div>
			</div>
		</div>
		@endforeach
	</div>
	<div class="custom-carousel-control">
		<div class="container">
			<a class="custom-carousel-control-prev" href="#carouselRubros" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="custom-carousel-control-next" href="#carouselRubros" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>
</div>
<div class="home-matrices mt-10" style="background-image: url({{ asset(Storage::url($matrices->imagen))}});">
	<div class="home-matrices-overlay">
		<div class="home-matrices-container">
			<div class="home-matrices-texto1">{{ $matrices->texto1 }}</div>
			<div class="home-matrices-texto2">{{ $matrices->texto2 }}</div>
			<a href="" class="btn btn-outline-light btn--style-custom">Ingresar</a>
		</div>
	</div>
</div>
@endsection

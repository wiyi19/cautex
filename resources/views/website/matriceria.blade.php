@extends('website.layout')
@section('title',       'Nuestros Perfiles')
@section('description', 'Seleccione un Perfil')
@section('keywords',    'Perfiles')
@section('author',      'Klockmetal')
@section('navbar_fixed', true)

@section('content')
@include('website.components.banner')
<div class="matriceria-iconos">
	<div class="container">
		<div class="row justify-content-center">
			@foreach ($iconos as $icon)
			<div class="col-12 col-md matriceria-iconos__icon">
				<img src="{{ asset(Storage::url($icon->imagen)) }}">
				<div class="matriceria-iconos__icon__text">{{ $icon->texto1 }}</div>
			</div>
			@endforeach
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="matriceria-content">
				{!! $textos->texto1 !!}
			</div>
		</div>
	</div>
</div>
<div class="matriceria-pie" style="background-image: url({{ asset(Storage::url($pie->imagen2)) }});">
	<div class="container">
		<div class="row">
			<div class="col-md-12 matriceria-pie__elements">
				<img src="{{ asset(Storage::url($pie->imagen1)) }}">
				<div class="matriceria-pie__textos">
					<div class="matriceria-pie__texto1">{{ $pie->texto1 }}</div>
					<div class="matriceria-pie__texto2">{{ $pie->texto2 }}</div>
				</div>
				<a href="{{ route('website.presupuesto') }}" class="btn btn--orange btn--style-custom">Ingresar</a>
			</div>
		</div>
	</div>
</div>
@endsection
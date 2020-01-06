@extends('website.layout')
@section('title',       'Productos')
@section('description', 'Seleccione un Perfil')
@section('keywords',    'Perfiles')
@section('author',      'Cautex')

@section('content')
<div class="container my-3">
	<div class="row">
		<div class="col-md-3">
			@include('website.components.sidebar-producto')
		</div>
		<div class="col-md-9">
			<div class="row">
				<div class="col-sm-12 col-md-6 col-lg-6">
					<div id="carouselProductoIndicators" class="carousel slide" data-ride="carousel" style="box-shadow: 0 0 3px rgba(100, 100, 100, 0.4);">
						<ol class="carousel-indicators">
							<li data-target="#carouselProductoIndicators" data-slide-to="0" class="active"></li>
							@for ($i = 1; $i <= count($producto->imagenes); $i++)
							<li data-target="#carouselProductoIndicators" data-slide-to="{{ $i }}"></li>
							@endfor
						</ol>
						<div class="carousel-inner">
							<div class="carousel-item active" style="background-image: url({{ asset(Storage::url($producto->imagen))}});">
								<div style="padding-bottom: 100%;"></div>
							</div>
							@foreach ($producto->imagenes as $imagen)
							<div class="carousel-item" style="background-image: url({{ asset(Storage::url($imagen))}});">
								<div style="padding-bottom: 100%;"></div>
							</div>
							@endforeach
						</div>
					</div>
				</div>
				<div class="col-sm-12 col-md-6 col-lg-6">
					<div>{{ $producto->texto1 }}</div>
					<div>{!! $producto->texto2 !!}</div>
					<div>
						<a href="{{ route('website.presupuesto') }}" class="btn btn--orange btn--style-custom">Solicitar presupuesto</a>
					</div>
				</div>
			</div>
			<div class="row">
				@foreach ($producto->medidas as $presentacion)
				<div class="col-md-12 producto-presentacion mt-5">
					{{ $presentacion['titulo'] }}
				</div>
					@foreach ($presentacion['elementos'] as $medida)
					<div class="col-md-4" style="background-color: {{ $loop->odd?'#F7F7F7':'#DBDBDB' }}">
						{{ $medida['texto'] }}
						<img src="{{ asset(Storage::url($medida['imagen'])) }}">
					</div>
					@endforeach
				@endforeach
			</div>
		</div>
	</div>
</div>
@endsection
@extends('website.layout')
@section('title',       'Productos')
@section('description', 'Seleccione un Perfil')
@section('keywords',    'Perfiles')
@section('author',      'Cautex')

@section('content')
<div class="container my-3">
	<div class="row">
		<div class="col-md-3">
			<div class="menu-producto">
				@foreach ($familias as $f)
				<a
					class="menu-producto-rubro {{ $familia_id!=$f->id?'collapsed':'' }}"
					data-toggle="collapse"
					href="#collapse-rubro-{{ $f->id }}"
					role="button" aria-expanded="false"
					aria-controls="collapse-rubro-{{ $f->id }}"
				>
					<span>{{ $f->texto1 }}</span>
					<i class="fas fa-angle-right"></i>
				</a>
				<div
				class="collapse {{ $familia_id==$f->id?'show':'' }}"
				id="collapse-rubro-{{ $f->id }}"
				>
					@foreach ($f->productos as $producto)
					<a
					class="menu-producto-marca {{ isset($producto_id)&&$producto_id==$producto->id?'':'collapsed' }}"
					href="{{ route('website.producto', $producto->id) }}">{{ $producto->texto1 }}</a>
					@endforeach
				</div>
				@endforeach
			</div>
		</div>
		<div class="col-md-9">
			<div class="row">
				@foreach ($familia->productos as $producto)
				<div class="col-md-6 col-lg-4 p-0">
					<a href="{{ route('website.producto', $producto->id) }}" class="producto-box" style="background-image: url({{ asset(Storage::url($producto->imagen)) }});">
						<div class="producto-box-space"></div>
						<div class="producto-box-overlay">
							<i class="fas fa-search-plus"></i>
						</div>
						<div class="producto-box-text">{{ $producto->texto1 }}</div>
					</a>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</div>

@endsection
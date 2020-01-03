@extends('website.layout')
@section('title',       'Productos')
@section('description', 'Seleccione un Perfil')
@section('keywords',    'Perfiles')
@section('author',      'Cautex')

@section('content')
<div class="container">
	<div class="row my-5">
		@foreach ($familias as $item)
		<div class="col-md-4 p-0">
			<a href="{{ route('website.familia', $item->id) }}" class="producto-box" style="background-image: url({{ asset(Storage::url($item->imagen)) }});">
				<div class="producto-box-space"></div>
				<div class="producto-box-overlay">
					<i class="fas fa-search-plus"></i>
				</div>
				<div class="producto-box-text">{{ $item->texto1 }}</div>
			</a>
		</div>
		@endforeach
	</div>
</div>
@endsection
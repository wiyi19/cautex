@extends('website.layout')
@section('title',       'Productos')
@section('description', 'Seleccione un Perfil')
@section('keywords',    'Perfiles')
@section('author',      'Cautex')

@section('content')
<div class="container">
	<div class="row mt-5 mb-2 d-flex justify-content-center">
		<form class="form-search col-md-12 col-lg-6" action="{{ route('website.search') }}">
			<div class="form-search__icon">
				<i class="fas fa-search"></i>
			</div>
			<input type="text" class="" id="" name="q">
			<button type="submit" class="">Submit</button>
		</form>
	</div>
	<div class="row mb-5">
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
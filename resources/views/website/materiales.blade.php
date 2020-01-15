@extends('website.layout')
@section('title',       'Materiales')
@section('description', 'Seleccione un Perfil')
@section('keywords',    'Perfiles')
@section('author',      'Cautex')

@section('content')
<div class="container my-5">
	<div class="row">
		@foreach ($materiales as $material)
		<div class="col-12 col-md-4 col-lg home-materiales-box home-materiales-box--materiales" data-display-id="{{ $material->id }}">
			<img src="{{ asset(Storage::url($material->imagen))}}">
			<span>{{ $material->texto2 }}</span>
			<hr>
		</div>
		@endforeach
	</div>
	<div class="row mt-5">
		<div class="col-md-12">CARACTERÍSTICAS:</div>
		@foreach ($materiales as $material)
		<div class="col-md-12 mt-3 {{ !$loop->first?'d-none':'' }}" id="material-id-{{ $material->id }}">
			{!! $material->texto3 !!}
		</div>
		@endforeach
	</div>
</div>
@endsection
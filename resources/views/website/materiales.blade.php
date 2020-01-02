@extends('website.layout')
@section('title',       'Nuestros Perfiles')
@section('description', 'Seleccione un Perfil')
@section('keywords',    'Perfiles')
@section('author',      'Klockmetal')

@section('content')
<div class="container my-5">
	<div class="row">
		@foreach ($materiales as $material)
		<div class="col-12 col-md-4 col-lg home-materiales-box home-materiales-box--materiales">
			<img src="{{ asset(Storage::url($material->imagen))}}">
			<span>{{ $material->texto2 }}</span>
			<hr>
		</div>
		@endforeach
	</div>
	<div class="row mt-5">
		<div class="col-md-12">CARACTERÍSTICAS:</div>
		<div class="col-md-12 mt-3">
			<ul>
				<li>Es un caucho resistente al aceite, grasas y combustibles.</li>
				<li>Buena resistencia mecánica y a la abrasión.</li>
				<li>Buen comportamiento con aceites minerales, hidráulicos, derivados de petróleo, agua, aire comprimido y freón 12.</li>
				<li>Uso estático para muy alta presión.</li>
				<li>Rango STD de aplicación térmica: -40ºC - 130ºC.</li>
			</ul>
		</div>
	</div>
</div>
@endsection
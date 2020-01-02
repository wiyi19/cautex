@extends('website.layout')
@section('title',       'Nuestros Perfiles')
@section('description', 'Seleccione un Perfil')
@section('keywords',    'Perfiles')
@section('author',      'Klockmetal')

@section('content')
<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13127.23147965277!2d-58.3546088!3d-34.6595548!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xdd13d80577ba1a74!2sCAUTEX%20SRL!5e0!3m2!1ses-419!2sve!4v1578001559020!5m2!1ses-419!2sve" height="350" frameborder="0" style="border:0; width: 100%;" allowfullscreen=""></iframe>
<div class="container my-5">
	<div class="row">
		<div class="col-md-4 contacto-info">
			<p class="mb-4">Ante cualquier duda complete el formulario con sus datos y a la brevedad le estaremos respondiendo su inquietud.</p>
			<div class="footer__info mb-4">
				<img src="{{ asset('img/website/icon-direccion.png') }}">
				<div class="footer__info__content">
					<div class="footer__title">DIRECCIÓN</div>
					<div class="footer__info__text">12 de Octubre 569, Dock Sud, Buenos Aires</div>
				</div>
			</div>
			<div class="footer__info mb-4">
				<img src="{{ asset('img/website/icon-phone.png') }}">
				<div class="footer__info__content">
					<div class="footer__title">TELÉFONO</div>
					<div class="footer__info__text">(54 011) 7-520-3572</div>
				</div>
			</div>
			<div class="footer__info mb-4">
				<img src="{{ asset('img/website/icon-mail.png') }}">
				<div class="footer__info__content">
					<div class="footer__title">E-MAIL</div>
					<div class="footer__info__text">info@cautex.com.ar</div>
				</div>
			</div>
		</div>
		<div class="col-md-8"><form-contacto class="my-5"></form-contacto></div>
	</div>
</div>
@endsection
@extends('website.layout')
@section('title',       'Contacto')
@section('description', 'Seleccione un Perfil')
@section('keywords',    'Perfiles')
@section('author',      'Cautex')

@section('content')
<iframe src="{{$infoempresa->texto8}}" height="350" frameborder="0" style="border:0; width: 100%;" allowfullscreen=""></iframe>
<div class="container my-5">
	<div class="row">
		<div class="col-md-4 contacto-info">
			<p class="mb-4">Ante cualquier duda complete el formulario con sus datos y a la brevedad le estaremos respondiendo su inquietud.</p>
			<div class="footer__info mb-4">
				<img src="{{ asset('img/website/icon-direccion.png') }}">
				<div class="footer__info__content">
					<div class="footer__title">DIRECCIÓN</div>
					<div class="footer__info__text">{{$infoempresa->texto5}}</div>
				</div>
			</div>
			<div class="footer__info mb-4">
				<img src="{{ asset('img/website/icon-phone.png') }}">
				<div class="footer__info__content">
					<div class="footer__title">TELÉFONO</div>
					<div class="footer__info__text">{{$infoempresa->texto6}}</div>
				</div>
			</div>
			<div class="footer__info mb-4">
				<img src="{{ asset('img/website/icon-mail.png') }}">
				<div class="footer__info__content">
					<div class="footer__title">E-MAIL</div>
					<div class="footer__info__text">{{$infoempresa->texto7}}</div>
				</div>
			</div>
		</div>
		<div class="col-md-8"><form-contacto url-action="{{ route('website.contacto') }}"></form-contacto></div>
	</div>
</div>
@endsection
<footer>
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<a href="{{ route('website.home') }}"><img src="{{ asset('img/website/logo.png') }}"></a>
			</div>
			<div class="col-md-8">
				<div class="footer__title">Mapa del sitio</div>
				<div class="row">
					<div class="col-md-3"><a href="{{ route('website.home') }}">Home</a></div>
					<div class="col-md-3"><a href="">Productos</a></div>
					<div class="col-md-3"><a href="{{ route('website.matriceria') }}">Matriceria propia</a></div>
				</div>
				<div class="row">
					<div class="col-md-3"><a href="{{ route('website.empresa') }}">Empresa</a></div>
					<div class="col-md-3"><a href="{{ route('website.materiales') }}">Materiales</a></div>
					<div class="col-md-3"><a href="{{ route('website.contacto') }}">Contacto</a></div>
				</div>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="offset-md-4 col-md-8">
				<div class="row">
					<div class="col-md-4 footer__info">
						<img src="{{ asset('img/website/icon-direccion.png') }}">
						<div class="footer__info__content">
							<div class="footer__title">DIRECCIÓN</div>
							<div class="footer__info__text">{{$infoempresa->texto2}}</div>
						</div>
					</div>
					<div class="col-md-4 footer__info">
						<img src="{{ asset('img/website/icon-phone.png') }}">
						<div class="footer__info__content">
							<div class="footer__title">TELÉFONO</div>
							<div class="footer__info__text">{{$infoempresa->texto3}}</div>
						</div>
					</div>
					<div class="col-md-4 footer__info">
						<img src="{{ asset('img/website/icon-mail.png') }}">
						<div class="footer__info__content">
							<div class="footer__title">E-MAIL</div>
							<div class="footer__info__text">{{$infoempresa->texto4}}</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				by Osole
			</div>
		</div>
	</div>
</footer>
<div class="navbar-top-bg {{ isset($navbar_fixed)&&$navbar_fixed==true?'navbar--fixed':'' }}">
	<div class="container position-relative">
		<div class="row pt-3 mb-3">
			<div class="col d-none d-lg-flex justify-content-start align-items-end">
				<img src="{{ asset('img/website/icon-phone.png') }}" class="mr-3"> (54 011) 7520-3572
			</div>
			<div class="col d-flex justify-content-center align-items-end">
				<a href="{{ route('website.home') }}"><img src="{{ asset('img/website/logo.png') }}"></a>
			</div>
			<div class="col d-none d-lg-flex justify-content-end align-items-end">
				<a href="{{ route('website.presupuesto') }}" class="btn-header-presupuesto {{ __active($active, 'website.presupuesto') }}">
					<img src="{{ asset('img/website/icon-calc.png') }}">
					SOLICITUD DE PRESUPUESTO
				</a>
				<a href="{{ route('website.familias') }}" class="btn btn--search">
					<i class="fas fa-search"></i>
				</a>
			</div>
			<div class="display-menu-mobile d-lg-none">
				<div class="display-menu-mobile-btn" data-toggle="modal" data-target="#modalNavbarTop"><i class="fas fa-bars"></i> MENU</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<ul class="navbar-top-ul d-none d-lg-flex">
					<li><a href="{{ route('website.home') }}"  class="{{ __active($active, 'website.home') }}">HOME</a></li>
					<li><a href="{{ route('website.empresa') }}"  class="{{ __active($active, 'website.empresa') }}">EMPRESA</a></li>
					<li><a href="{{ route('website.familias') }}"  class="{{ __active($active, 'website.familias') }}">PRODUCTOS</a></li>
					<li><a href="{{ route('website.materiales') }}"  class="{{ __active($active, 'website.materiales') }}">MATERIALES</a></li>
					<li><a href="{{ route('website.matriceria') }}"  class="{{ __active($active, 'website.matriceria') }}">MATRICERIA PROPIA</a></li>
					<li><a href="{{ route('website.contacto') }}"  class="{{ __active($active, 'website.contacto') }}">CONTACTO</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="modalNavbarTop" tabindex="-1" role="dialog" aria-labelledby="modalNavbarTopTitle" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalNavbarTopTitle">Menu</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div id="navbar-modal-items">
					<a href="{{ route('website.home') }}" class="navbar-item">HOME</a>
					<a href="{{ route('website.empresa') }}" class="navbar-item">EMPRESA</a>
					<a href="{{ route('website.familias') }}" class="navbar-item">PRODUCTOS</a>
					<a href="{{ route('website.materiales') }}" class="navbar-item">MATERIALES</a>
					<a href="{{ route('website.matriceria') }}" class="navbar-item">MATRICERIA PROPIA</a>
					<a href="{{ route('website.contacto') }}" class="navbar-item">CONTACTO</a>
				</div>
			</div>
		</div>
	</div>
</div>
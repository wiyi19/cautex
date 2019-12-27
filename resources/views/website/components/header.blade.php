<div class="navbar-top-bg navbar-fixed">
	<div class="container position-relative">
		<div class="row pt-3 mb-3">
			<div class="col d-none d-lg-flex justify-content-start align-items-end">
				<img src="{{ asset('img/website/icon-phone.png') }}" class="mr-3"> (54 011) 7520-3572
			</div>
			<div class="col d-flex justify-content-center align-items-end">
				<a href="{{ route('website.home') }}"><img src="{{ asset('img/website/logo.png') }}"></a>
			</div>
			<div class="col d-none d-lg-flex justify-content-end align-items-end">
				<a href="" class="btn-header-presupuesto">
					<img src="{{ asset('img/website/icon-calc.png') }}">
					SOLICITUD DE PRESUPUESTO
				</a>
				<img src="{{ asset('img/website/icon-search.png') }}">
			</div>
			<div class="display-menu-mobile d-lg-none">
				<div class="display-menu-mobile-btn" data-toggle="modal" data-target="#modalNavbarTop"><i class="fas fa-bars"></i> MENU</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<ul class="navbar-top-ul d-none d-lg-flex">
					<li><a href="">HOME</a></li>
					<li><a href="">EMPRESA</a></li>
					<li><a href="">PRODUCTOS</a></li>
					<li><a href="">MATERIALES</a></li>
					<li><a href="">MATRICERIA PROPIA</a></li>
					<li><a href="">CONTACTO</a></li>
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
			<a href="" class="navbar-item ">HOME</a>
			<a href="" class="navbar-item ">EMPRESA</a>
			<a href="" class="navbar-item ">PRODUCTOS</a>
			<a href="" class="navbar-item ">MATERIALES</a>
			<a href="" class="navbar-item ">MATRICERIA PROPIA</a>
			<a href="" class="navbar-item ">CONTACTO</a>
		</div>
      </div>
    </div>
  </div>
</div>
@extends('layouts.app')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<div>
		<a href="{{ route('adm.matrides') }}" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm">
			<i class="fas fa-step-backward fa-sm text-white-50"></i>
			Volver Atras
		</a>
	</div>
</div>
<div class="row">
	<form class="col s12" method="POST" action="{{ route('adm.matrides.store') }}" enctype="multipart/form-data">
		@csrf
		<div class="row">
			<div class="col-xl-12 col-lg-12">
				<div class="card shadow mb-4">
					<!-- Card Header - Dropdown -->
					<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
						<h6 class="m-0 font-weight-bold text-primary">Añadir</h6>
					</div>
					<!-- Card Body -->
					@include('adm.matrides.form')
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xl-12 col-lg-12 d-sm-flex align-items-center justify-content-between">
				<a href="{{ route('adm.matrides') }}" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm">
					<i class="fas fa-step-backward fa-sm text-white-50"></i>
					Volver Atras
				</a>

				<button class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm">
					<i class="fas fa-save fa-sm text-white-50"></i>
					Guardar
				</button>
			</div>
		</div>
	</form>
</div>
@endsection

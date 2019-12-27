@extends('layouts.app')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<div>
		<a href="{{ route('adm.producto') }}" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm">
			<i class="fas fa-step-backward fa-sm text-white-50"></i>
			Volver Atras
		</a>
	</div>
</div>
<producto-form-component
    form-name="Añadir"
    url-data="{{ route('adm.producto.data', $element->id) }}"
    url-back="{{ route('adm.producto') }}"
    url-action="{{ route('adm.producto.update', $element->id) }}"
></producto-form-component>
@endsection

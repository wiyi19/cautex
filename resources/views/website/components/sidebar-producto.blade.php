<div class="menu-producto">
	@foreach ($familias as $f)
	<a
		class="menu-producto-rubro {{ $familia_id!=$f->id?'collapsed':'' }}"
		data-toggle="collapse"
		href="#collapse-rubro-{{ $f->id }}"
		role="button" aria-expanded="false"
		aria-controls="collapse-rubro-{{ $f->id }}"
	>
		<span>{{ $f->texto1 }}</span>
		<i class="fas fa-angle-right"></i>
	</a>
	<div
	class="collapse {{ $familia_id==$f->id?'show':'' }}"
	id="collapse-rubro-{{ $f->id }}"
	>
		@foreach ($f->productos as $producto)
		<a
		class="menu-producto-marca {{ isset($producto_id)&&$producto_id==$producto->id?'':'collapsed' }}"
		href="{{ route('website.producto', $producto->id) }}">{{ $producto->texto1 }}</a>
		@endforeach
	</div>
	@endforeach
</div>
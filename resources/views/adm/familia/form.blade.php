<div class="card-body">
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<label for="texto1">Nombre</label>
				<input type="text" class="form-control" id="texto1" name="texto1" value="{{ old('texto1', isset($element) ? $element->texto1 : null) }}">
			</div>
		</div>
		<div class="col-md-12">
			<div class="form-group">
				<label for="imagen">Imagen</label>
				<input type="file" class="form-control" id="imagen" name="imagen" value="{{ old('imagen', isset($element) ? $element->imagen : null) }}">
			</div>
		</div>
		<div class="col-md-12">
			<div class="form-group">
				<label for="orden">Orden</label>
				<input type="text" class="form-control" id="orden" name="orden" value="{{ old('orden', isset($element) ? $element->orden : null) }}">
			</div>
		</div>
		<div class="col-md-12">
			<div class="form-group">
				<label for="destacado">Destacado</label>
				@php($destacado = old('destacado', isset($element) ? $element->destacado : 0))
				<select class="form-control" id="destacado" name="destacado">
					<option value="0" {{ $destacado == 0 ? 'selected="selected' : '' }}>No</option>
					<option value="1" {{ $destacado == 1 ? 'selected="selected' : '' }}>Si</option>
				</select>
			</div>
		</div>
	</div>
</div>
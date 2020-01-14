<div class="card-body">
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<label for="texto1">Texto</label>
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
				<label for="orden">ORDEN</label>
				<input type="text" class="form-control" id="orden" name="orden" value="{{ old('orden', isset($element) ? $element->orden : null) }}">
			</div>
		</div>
	</div>
</div>
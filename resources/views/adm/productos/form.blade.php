<div class="card-body">
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<label for="producto">Producto</label>
				<input type="producto" class="form-control" id="producto" name="producto" value="{{ old('producto', isset($element) ? $element->producto : null) }}">
			</div>
		</div>
		<div class="col-md-12">
			<div class="form-group">
				<label for="imagen">Imagen</label>
				<input type="file" class="form-control" id="imagen" name="imagen" value="{{ old('imagen', isset($element) ? $element->imagen : null) }}">
			</div>
		</div>
	</div>
</div>
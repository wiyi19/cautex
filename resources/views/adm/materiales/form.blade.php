<div class="card-body">
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<label for="texto1">Abreviatura</label>
				<input type="text" class="form-control" id="texto1" name="texto1" value="{{ old('texto1', isset($element) ? $element->texto1 : null) }}">
			</div>
		</div>
		<div class="col-md-12">
			<div class="form-group">
				<label for="texto2">Nombre Material</label>
				<input type="text" class="form-control" id="texto2" name="texto2" value="{{ old('texto2', isset($element) ? $element->texto2 : null) }}">
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
				<label for="texto3">Caracteristicas</label>
				<textarea class="ckeditor" id="texto3" name="texto3">{{ old('texto3', isset($textos) ? $textos->texto3 : null) }}</textarea>
			</div>
		</div>
	</div>
</div>
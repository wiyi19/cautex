<div class="card-body">
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<label for="texto1">TEXTO 1</label>
                <input type="text" class="form-control" id="texto1" name="texto1" value="{{ old('texto1', isset($textos) ? $textos->texto1 : null) }}">
			</div>
		</div>
		<div class="col-md-12">
			 <div class="form-group">
                 <label for="texto2">TEXTO 2</label>
                 <textarea class="form-control" id="texto2" name="texto2">{{ old('texto2', isset($textos) ? $textos->texto2 : null) }}</textarea>
              </div>
		</div>
		<div class="col-md-12">
			<div class="form-group">
                <label for="imagen1">Icono</label>
                <input type="file" class="form-control" id="imagen1" name="imagen1" value="{{ old('imagen1', isset($element) ? $element->imagen1 : null) }}">
            </div>
		</div>
		<div class="col-md-12">
			<div class="form-group">
                <label for="imagen2">IMAGEN</label>
                <input type="file" class="form-control" id="imagen2" name="imagen2" value="{{ old('imagen2', isset($element) ? $element->imagen2 : null) }}">
            </div>
		</div>
	</div>
</div>
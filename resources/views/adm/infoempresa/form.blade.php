<div class="card-body">
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<label for="texto1">Dirección</label>
                <input type="text" class="form-control" id="texto1" name="texto1" value="{{ old('texto1', isset($textos) ? $textos->texto1 : null) }}">
			</div>
		</div>
		<div class="col-md-12">
			 <div class="form-group">
                 <label for="texto2">Telefono</label>
                 <input type="text" class="form-control" id="texto2" name="texto2" value="{{ old('texto2', isset($textos) ? $textos->texto2 : null) }}">
              </div>
		</div>
		<div class="col-md-12">
			<div class="form-group">
                <label for="imagen">Email</label>
                <input type="text" class="form-control" id="texto3" name="texto3" value="{{ old('texto3', isset($textos) ? $textos->texto3 : null) }}">
            </div>
		</div>
	</div>
</div>
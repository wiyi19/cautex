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
				<label for="idfamilia">Familia</label>
				<select id="idfamilia" class="form-control{{ $errors->has('idfamilia') ? ' is-invalid' : '' }}" name="idfamilia" required>
            	@foreach ($familias as $oi)
            	 <option value="{{ $oi->id }}" {{ $oi->id==old('idfamilia', isset($element) ? $element->idfamilia : 0)?'selected':'' }}>{{ $oi->texto1 }}</option>
            	@endforeach
        		</select>
        		@if ($errors->has('idfamilia'))
            		<span class="invalid-feedback">
                	<strong>{{ $errors->first('idfamilia') }}</strong>
            		</span>
       			@endif

			</div>
		</div>
		<div class="col-xl-12 col-md-12 mb-12">
             <div class="form-group">
                <label for="texto3">Descrpción</label>
                <textarea class="ckeditor" id="texto2" name="texto2">{{ old('texto2', isset($textos) ? $textos->texto2: null) }}</textarea>
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
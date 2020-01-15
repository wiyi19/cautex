<div class="card-body">
	<div class="row">
		<div class="col-xl-12 col-md-12 mb-12">
                        <div class="form-group">
                            <label for="texto1">Texto 1</label>
                            <textarea class="ckeditor" id="texto1" name="texto1">{{ old('texto1', isset($textos) ? $textos->texto1 : null) }}</textarea>
                        </div>
                    </div>
                    <div class="col-xl-12 col-md-12 mb-12">
                        <div class="form-group">
                            <label for="texto2">Texto 2</label>
                            <textarea class="ckeditor" id="texto2" name="texto2">{{ old('texto2', isset($textos) ? $textos->texto2 : null) }}</textarea>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 d-sm-flex align-items-center justify-content-end">
                        <button class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm">
                            <i class="fas fa-save fa-sm text-white-50"></i>
                            Guardar
                        </button>
                    </div>
                </div>
	</div>
	</div>
</div>
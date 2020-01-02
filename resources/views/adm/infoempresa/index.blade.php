@extends('layouts.app')
@section('content')
<!-- Content Row -->
<div class="row">
 <form class="col s12" method="POST" action="{{ route('adm.infoempresa.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-header">
                Información de Header
            </div>
          <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="texto1">Teléfono Header</label>
                        <input type="text" class="form-control" id="texto1" name="texto1" value="{{ old('texto1', isset($textos) ? $textos->texto1 : null) }}">
                    </div>
                </div>
                @if (!$textos->imagen1==null)
                    <div class="col-xl-12 col-md-12 mb-12">
                         <div class="form-group">
                            <label for="imagen1">Logo header</label>
                            <input type="file" class="form-control" id="imagen1" name="imagen1" value="{{ old('imagen', isset($textos) ? $textos->imagen1 : null) }}">
                        </div>
                    </div>
                    <div class="col-xl-12 col-md-12 mb-12">
                        <div class="form-group">
                            <img src=" {{ asset(Storage::url($textos->imagen1))}}" width="200" height="100">
                        </div>
                    </div>
                    @else
                    <div class="col-xl-12 col-md-12 mb-12">
                        <div class="form-group">
                            <label for="imagen1">Logo Header</label>
                            <input type="file" class="form-control" id="imagen1" name="imagen1" value="{{ old('imagen1', isset($textos) ? $textos->imagen1 : null) }}">
                        </div>
                    </div>
                @endif
            </div>
         </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-header">
                Información de Footer
            </div>
          <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="texto2">Dirección</label>
                        <input type="text" class="form-control" id="texto2" name="texto2" value="{{ old('texto2', isset($textos) ? $textos->texto2 : null) }}">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="texto3">Teléfono</label>
                        <input type="text" class="form-control" id="texto3" name="texto3" value="{{ old('texto3', isset($textos) ? $textos->texto3 : null) }}">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="texto4">Email</label>
                        <input type="text" class="form-control" id="texto4" name="texto4" value="{{ old('texto4', isset($textos) ? $textos->texto4 : null) }}">
                    </div>
                </div>
                @if (!$textos->imagen2==null)
                    <div class="col-xl-12 col-md-12 mb-12">
                         <div class="form-group">
                            <label for="imagen2">Logo Footer</label>
                            <input type="file" class="form-control" id="imagen2" name="imagen2" value="{{ old('imagen2', isset($textos) ? $textos->imagen2 : null) }}">
                        </div>
                    </div>
                    <div class="col-xl-12 col-md-12 mb-12">
                        <div class="form-group">
                            <img src=" {{ asset(Storage::url($textos->imagen2))}}" width="200" height="100">
                        </div>
                    </div>
                    @else
                    <div class="col-xl-12 col-md-12 mb-12">
                        <div class="form-group">
                            <label for="imagen2">Logo Footer</label>
                            <input type="file" class="form-control" id="imagen2" name="imagen2" value="{{ old('imagen2', isset($textos) ? $textos->imagen2 : null) }}">
                        </div>
                    </div>
                @endif
            </div>
         </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-header">
                Información de Contacto
            </div>
          <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="texto5">Dirección</label>
                        <input type="text" class="form-control" id="texto5" name="texto5" value="{{ old('texto5', isset($textos) ? $textos->texto5 : null) }}">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="texto6">Teléfono</label>
                        <input type="text" class="form-control" id="texto6" name="texto6" value="{{ old('texto6', isset($textos) ? $textos->texto6 : null) }}">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="texto7">Email</label>
                        <input type="text" class="form-control" id="texto7" name="texto7" value="{{ old('texto7', isset($textos) ? $textos->texto7 : null) }}">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="texto8">Mapa</label>
                        <textarea class="form-control" id="texto8" name="texto8">{{ old('texto8', isset($textos) ? $textos->texto8 : null) }}</textarea>
                    </div>
                </div>
            </div>
         </div>
        </div>
    </div>
   <div class="col-xl-12 col-lg-12 d-sm-flex align-items-center justify-content-end">
        <button class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm">
            <i class="fas fa-save fa-sm text-white-50"></i>
                Guardar
        </button>
    </div>
    <!-- Earnings (Monthly) Card Example -->
</form>    
</div>
@endsection

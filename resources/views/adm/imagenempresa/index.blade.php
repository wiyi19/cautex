@extends('layouts.app')
@section('content')
<!-- Content Row -->
<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-header">
                Imagen
            </div>
            <form class="card-body" method="POST" action="{{ route('adm.imagenempresa.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    @if (!$textos->imagen==null)
                        <div class="col-xl-12 col-md-12 mb-12">
                            <div class="form-group">
                                <label for="imagen">Imagen</label>
                                <input type="file" class="form-control" id="imagen" name="imagen" value="{{ old('imagen', isset($element) ? $element->imagen : null) }}">
                            </div>
                        </div>
                        <div class="col-xl-12 col-md-12 mb-12">
                            <div class="form-group">
                               <img src=" {{ asset(Storage::url($textos->imagen))}}" width="200" height="100">
                            </div>
                        </div>
                    @else
                    <div class="col-xl-12 col-md-12 mb-12">
                            <div class="form-group">
                                <label for="imagen">Imagen</label>
                                <input type="file" class="form-control" id="imagen" name="imagen" value="{{ old('imagen', isset($element) ? $element->imagen : null) }}">
                            </div>
                        </div>
                    @endif
                    
                    <div class="col-xl-12 col-lg-12 d-sm-flex align-items-center justify-content-end">
                        <button class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm">
                            <i class="fas fa-save fa-sm text-white-50"></i>
                            Guardar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Earnings (Monthly) Card Example -->
</div>
@endsection

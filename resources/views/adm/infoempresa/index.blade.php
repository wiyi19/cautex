@extends('layouts.app')
@section('content')
<!-- Content Row -->
<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-header">
                Información
            </div>
            <form class="card-body" method="POST" action="{{ route('adm.infoempresa.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-xl-12 col-md-12 mb-12">
                        <div class="form-group">
                            <label for="texto1">Dirección</label>
                            <input type="text" class="form-control" id="texto1" name="texto1" value="{{ old('texto1', isset($textos) ? $textos->texto1 : null) }}">
                        </div>
                    </div>
                    <div class="col-xl-12 col-md-12 mb-12">
                        <div class="form-group">
                            <label for="texto2">Telefono</label>
                            <input type="text" class="form-control" id="texto2" name="texto2" value="{{ old('texto2', isset($textos) ? $textos->texto2 : null) }}">
                        </div>
                    </div>
                    <div class="col-xl-12 col-md-12 mb-12">
                        <div class="form-group">
                            <label for="texto3">Email</label>
                            <input type="text" class="form-control" id="texto3" name="texto3" value="{{ old('texto3', isset($textos) ? $textos->texto3 : null) }}">
                        </div>
                    </div>
                
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

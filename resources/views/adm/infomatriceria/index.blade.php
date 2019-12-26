@extends('layouts.app')
@section('content')
<!-- Content Row -->
<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-header">
                Matriceria Propia
            </div>
            <form class="card-body" method="POST" action="{{ route('adm.infomatriceria.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-xl-12 col-md-12 mb-12">
                        <div class="form-group">
                            <label for="texto1">TEXTO 1</label>
                            <textarea class="ckeditor" id="texto1" name="texto1">{{ old('texto1', isset($textos) ? $textos->texto1 : null) }}</textarea>
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

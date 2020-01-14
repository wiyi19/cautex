@extends('layouts.app')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
        @if (isset($trash) && $trash == true)
        <a href="{{ route('adm.familia') }}" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm">
            <i class="fas fa-step-backward fa-sm text-white-50"></i>
            Salir de la Papelera
        </a>
        @else
        <a href="{{ route('adm.familia.trash') }}" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm">
            <i class="fas fa-trash fa-sm text-white-50"></i>
            Papelera
        </a>
        @endif
        <a href="{{ route('adm.familia.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i>
            Añadir
        </a>
    </div>
</div>

<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-12 col-md-12 mb-12">
        <table class="data_table table table-striped table-bordered display">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>DESTACADO</th>
                    <th>IMAGEN</th>
                    <th>ORDEN</th>
                    <th class="no-sort"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->texto1 }}</td>
                    <td></td>
                    <td><img src=" {{ asset(Storage::url($item->imagen))}}" width="100" height="100"></td>
                    <td>{{ $item->orden }}</td>
                    <td>
                        @if (!$item->trashed())
                        <a href="{{ route('adm.familia.edit', [$item->id]) }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-sm text-white-50 fa-edit"></i>
                            Editar
                        </a>
                        <a href="{{ route('adm.familia.destroy', [$item->id]) }}" class="btn btn-danger btn-sm">
                            <i class="fas fa-sm text-white-50 fa-trash-alt"></i>
                            Eliminar
                        </a>
                        @else
                        <a href="{{ route('adm.familia.restore', [$item->id]) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-sm text-white-50 fa-trash-restore"></i>
                            Restaurar
                        </a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

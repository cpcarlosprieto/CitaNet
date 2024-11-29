@extends('layouts.panel')

@section('content')

    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Editar Medicamento</h3>
                </div>
                <div class="col text-right">
                    <a href="{{ url('/medicamentos') }}" class="btn btn-sm btn-success">
                        <i class="fas fa-chevron-left"></i>
                        Volver</a>
                </div>
            </div>
        </div>

        <div class="card-body">

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        <i class="fas fa-exclamation-triangle"></i>
                        <strong>Error: </strong>{{ $error }}
                    </div>
                @endforeach
            @endif

            <form action="{{ url('/medicamentos/' . $medication->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="description">Nombre</label>
                    <input type="text" name="description" class="form-control" value="{{ old('description', $medication->description) }}" required>
                </div>

                <div class="form-group">
                    <label for="dose">Dosis</label>
                    <input type="text" name="dose" class="form-control" value="{{ old('dose', $medication->dose) }}" required>
                </div>

                <div class="form-group">
                    <label for="presentation">Presentación</label>
                    <input type="text" name="presentation" class="form-control" value="{{ old('presentation', $medication->presentation) }}" required>
                </div>

                <div class="form-group">
                    <label for="expiration">Caducidad</label>
                    <input type="date" name="expiration" class="form-control" value="{{ old('expiration', $medication->expiration) }}" required>
                </div>

                <div class="form-group">
                    <label for="laboratory">Laboratorio</label>
                    <input type="text" name="laboratory" class="form-control" value="{{ old('laboratory', $medication->laboratory) }}" required>
                </div>

                <div class="form-group">
                    <label for="price">Precio</label>
                    <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price', $medication->price) }}" required>
                </div>

                <div class="form-group">
                    <label for="stock">Stock</label>
                    <input type="number" name="stock" class="form-control" value="{{ old('stock', $medication->stock) }}" required>
                </div>

                <button type="submit" class="btn btn-sm btn-primary">Guardar Cambios</button>
            </form>
        </div>
    </div>
@endsection


<?php
use Illuminate\Support\Str;
?>
@extends('layouts.panel')

@section('content')

    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Nuevo Medicamento</h3>
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
                        <strong>Por Favor!!! </strong>{{ $error }}
                    </div>
                @endforeach
            @endif

            <form action="{{ route('medicamentos.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="description">Nombre</label>
                    <input type="text" name="description" class="form-control" value="{{ old('description') }}" required>
                </div>

                <div class="form-group">
                    <label for="dose">Dosis</label>
                    <input type="text" name="dose" class="form-control" value="{{ old('dose') }}" required>
                </div>

                <div class="form-group">
                    <label for="presentation">Presentación</label>
                    <input type="text" name="presentation" class="form-control" value="{{ old('presentation') }}" required>
                </div>

                <div class="form-group">
                    <label for="expiration">Caducidad</label>
                    <input type="date" name="expiration" class="form-control" value="{{ old('expiration') }}" required>
                </div>

                <div class="form-group">
                    <label for="laboratory">Laboratorio</label>
                    <input type="text" name="laboratory" class="form-control" value="{{ old('laboratory') }}" required>
                </div>
                <div class="form-group">
                    <label for="price">Precio</label>
                    <input type="number" name="price" class="form-control" value="{{ old('price') }}" required>
                </div>
                <div class="form-group">
                    <label for="stock">Stock</label>
                    <input type="number" name="stock" class="form-control" value="{{ old('stock') }}" required>
                </div>
                <button type="submit" class="btn btn-sm btn-primary">Añadir Medicamento</button>
            </form>
        </div>
    </div>
@endsection

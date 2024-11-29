<?php
use Illuminate\Support\Str;
?>

@extends('layouts.panel')

@section('content')

    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Agregar Servicio</h3>
                </div>
                <div class="col text-right">
                    <a href="{{ url('/services') }}" class="btn btn-sm btn-success">
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

            <form action="{{ route('services.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="servicio">Servicio</label>
                    <input type="text" name="servicio" class="form-control" value="{{ old('servicio') }}" required>
                </div>

                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <input type="text" name="descripcion" class="form-control" value="{{ old('descripcion') }}" required>
                </div>

                <div class="form-group">
                    <label for="valor">Valor</label>
                    <input type="decimal" name="valor" class="form-control" value="{{ old('valor') }}" required>
                </div>

                <button type="submit" class="btn btn-sm btn-primary">Añadir Servicio</button>
            </form>
        </div>
    </div>
@endsection
@extends('layouts.index')

@section('title', 'Registrarse')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
            <div class="card bg-light shadow border-0 rounded-lg">
                <div class="card-body px-lg-5 py-lg-5">
                    <!-- Título -->
                    <div class="text-center mb-4">
                        <img class="mb-4" src="{{ asset('img/brand/citanet.png') }}" alt="" width="80" height="64">
                        <h2 class="text-primary">Crear una cuenta</h2>
                        <h6 class="h3 mb-3 fw-normal">Registre sus datos para crear una cuenta.</h6>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Error!</strong> {{ $errors->first() }}
                        </div>
                    @endif

                    <!-- Formulario de registro -->
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-floating mb-3">
                            <input class="form-control" type="text" name="name" id="name" placeholder="Nombre" value="{{ old('name') }}" required>
                            <label for="name">Nombre</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input class="form-control" type="email" name="email" id="email" placeholder="Correo electrónico" value="{{ old('email') }}" required>
                            <label for="email">Correo electrónico</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input class="form-control" type="password" name="password" id="password" placeholder="Contraseña" required>
                            <label for="password">Contraseña</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirmar contraseña" required>
                            <label for="password_confirmation">Confirmar contraseña</label>
                        </div>

                        <div class="form-floating mb-3">
                            <select class="form-control" name="role" id="role" required>
                                <option value="paciente">Paciente</option>
                                <option value="doctor">Doctor</option>
                                <option value="admin">Administrador</option>
                            </select>
                            <label for="role">Rol</label>
                        </div>

                        <button class="btn btn-primary w-100 py-2" type="submit">Crear Cuenta</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

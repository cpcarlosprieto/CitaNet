@extends('layouts.index')

@section('title', 'Iniciar Sesión')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
            <div class="card bg-light shadow border-0 rounded-lg">
                <div class="card-body px-lg-5 py-lg-5">
                    <!-- Sección con el título y la descripción -->
                    <div class="text-center mb-4">
                        <img class="mb-4" src="{{ asset('img/brand/citanet.png') }}" alt="" width="80" height="64">
                        <h2 class="text-primary">Iniciar sesión</h2>
                        <h6 class="h3 mb-3 fw-normal">Ingrese sus credenciales para acceder a su cuenta.</h6>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Error!</strong> {{ $errors->first() }}
                        </div>
                    @endif

                    <!-- Formulario de inicio de sesión -->
                    <main class="form-signin w-100 m-auto">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label for="email">{{ __('Correo Electronico') }}</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                        </div>

                        <div class="form-group">
                            <label for="password">{{ __('Contraseña') }}</label>
                            <input id="password" type="password" class="form-control" name="password" required>
                        </div>
                        <br><br>
                        <button type="submit" class="btn btn-primary">Iniciar Sesion</button>
                    </form>

                    </main>
                </div>
            </div>

            <!-- Enlaces de ayuda y registro -->
            <div class="row mt-3">
                <div class="col-6">
                    <a href="{{ route('password.request') }}" class="text-muted"><small>¿Olvidaste tu contraseña?</small></a>
                </div>
                <div class="col-6 text-end">
                    <a href="{{ route('register') }}" class="text-muted"><small>Crear una cuenta nueva</small></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

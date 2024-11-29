@extends('layouts.panel')

@section('content')
    <div class="row">
        <div class="col-md-12 mb-4">
            <div class="card">
                <div class="card-header">{{ __('Bienvenido al Sistema') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p>{{ __('Gracias por ingresar. Aquí podrás gestionar tus citas de manera sencilla.') }}</p>
                </div>
            </div>
        </div>

        
        <div class="col-xl-4 mb-4">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title">{{ __('Citas Asignadas') }}</h5>
                    <p class="card-text">15 citas asignadas esta semana.</p>
                </div>
            </div>
        </div>
        <div class="col-xl-4 mb-4">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title">{{ __('Especialistas Disponibles') }}</h5>
                    <p class="card-text">10 especialistas activos.</p>
                </div>
            </div>
        </div>
        <div class="col-xl-4 mb-4">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title">{{ __('Usuarios Registrados') }}</h5>
                    <p class="card-text">120 usuarios registrados.</p>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">{{ __('Información General') }}</div>
                <div class="card-body">
                    <p>{{ __('Consulta y gestiona tus citas de forma rápida y eficiente.') }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection

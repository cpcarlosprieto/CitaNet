@extends('layouts.panel')

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Servicios</h3>
                </div>
                <div class="col text-right">
                    <a href="{{ route('services.create') }}" class="btn btn-sm btn-primary">Agregar Servicio</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            @if (session('notification'))
                <div class="alert alert-success" role="alert">
                    {{ session('notification') }}
                </div>
            @endif
        </div>
        <div class="table-responsive">
            <!-- Projects table -->
            <table class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Servicio</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($services as $service)
                        <tr>
                            <th scope="row">
                                {{ $service->servicio }}
                            </th>
                            <td>
                                {{ $service->descripcion }}
                            </td>
                            <td>
                                {{ $service->valor }}
                            </td>
                        
                            <td>
                                <form action="{{ route('services.destroy', $service->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('services.edit', $service->id) }}"
                                        class="btn btn-sn btn-primary">Editar</a>
                                    <button type="submit" class="btn btn-sn btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <div class="card-body">
            {{ $services->links() }}
        </div>
    </div>
@endsection

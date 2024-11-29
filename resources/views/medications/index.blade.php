@extends('layouts.panel')

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Medicamentos</h3>
                </div>
                <div class="col text-right">
                    <a href="{{ route('medicamentos.create') }}" class="btn btn-sm btn-primary">Ingresar Medicamento</a>
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
                        <th scope="col">Nombre</th>
                        <th scope="col">Dosis</th>
                        <th scope="col">Presentación</th>
                        <th scope="col">Caducidad</th>
                        <th scope="col">Laboratorio</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($medications as $medication)
                        <tr>
                            <th scope="row">
                                {{ $medication->description }}
                            </th>
                            <td>
                                {{ $medication->dose }}
                            </td>
                            <td>
                                {{ $medication->presentation }}
                            </td>
                            <td>
                                {{ $medication->expiration }}
                            </td>
                            <td>
                                {{ $medication->laboratory }}
                            </td>
                            <td>
                                {{ $medication->price }}
                            </td>
                            <td>
                                {{ $medication->stock }}
                            </td>
                            <td>
                                <form action="{{ route('medicamentos.destroy', $medication->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('medicamentos.edit', $medication->id) }}"
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
            {{ $medications->links() }}
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<h3>Lista de Vehículos</h3>

<table>
    <tr>
        <th>Nombre</th>
        <th>Tipo</th>
        <th>Capacidad</th>
        <th>Color</th>
        <th>Precio</th>
        <th>Estado</th>
        <th>Modelo 3D</th>
        @if(auth()->user()->rol == 'admin')
        <th>Acciones</th>
        @endif
    </tr>
    @foreach($vehicles as $vehicle)

    <tr>
        <td>{{ $vehicle->nombre }}</td>
        <td>{{ $vehicle->tipo }}</td>
        <td>{{ $vehicle->capacidad }}</td>
        <td>{{ $vehicle->color }}</td>
        <td>{{ $vehicle->precio }}</td>
        <td>{{ $vehicle->estado }}</td>
        <!-- <td>
            <img src="{{ asset('storage/modelos3d/' . $vehicle->modelo3d) }}" alt="Modelo 3D">
        </td> -->

        @if(auth()->user()->rol == 'admin')
        <td>
            <a href="{{ route('admin.vehicles.edit', $vehicle->id) }}">Editar</a>
            <form method="POST" action="{{ route('admin.vehicles.destroy', $vehicle->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit">Eliminar</button>
            </form>
        </td>
        @endif
    </tr>

    @endforeach
</table>
{{ $vehicles->links() }}
@endsection





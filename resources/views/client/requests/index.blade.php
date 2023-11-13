@extends('layouts.app')

@section('content')
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<h3>Lista de Solicitudes</h3>

<table>
    <tr>
        <th>Nombre</th>
        <th>Correo</th>
        <th>Vehículo</th>
        <th>Mensaje</th>
        <th>Acciones</th>
    </tr>
    @foreach($requests as $request)

    <tr>
        <td>{{ $request->name }}</td>
        <td>{{ $request->email }}</td>
        <td>{{ $request->nombre }}</td>
        <td>{{ $request->mensaje }}</td>
        <td>
            <a href="{{ route('admin.requests.edit', $request->id) }}">Editar</a>
            <form method="POST" action="{{ route('admin.requests.destroy', $request->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit">Eliminar</button>
            </form>
        </td>
    </tr>

    @endforeach
</table>
@endsection
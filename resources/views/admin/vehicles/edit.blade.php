@extends('layouts.app')

@section('content')

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<h3>Editar Vehículo</h3>

<form method="POST" action="{{ route('admin.vehicles.update', $vehicle->id) }}" role="form" enctype="multipart/form-data">
    @csrf
    @method('PUT')


    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" value="{{ $vehicle->nombre }}" required autofocus>

    <label for="modelo">Tipo:</label>
    <input type="text" name="tipo" id="tipo" value="{{ $vehicle->tipo }}" required>

    <label for="color">Color:</label>
    <input type="text" name="color" id="color" value="{{ $vehicle->color }}" required>

    <label for="capacidad">Capacidad:</label>
    <input type="text" name="capacidad" id="capacidad" value="{{ $vehicle->capacidad }}" required>

    <label for="precio">Precio:</label>
    <input type="text" name="precio" id="precio" value="{{ $vehicle->precio }}" required>

    <label for="estado">Estatus:</label>
    <input type="text" name="estado" id="estado" value="{{ $vehicle->estado }}" required>

    <label for="modelo3d" class="form-label">Modelo 3D:</label>
    <input type="file" name="modelo3d" id="modelo3d" accept="image/*" required>

    <button type="submit">Actualizar</button>

    <a href="{{ route('admin.vehicles.create') }}">Cancelar</a>
</form>


@endsection
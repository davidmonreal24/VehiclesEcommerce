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

<h3>Agregar Vehículo</h3>

<form method="POST" action="{{ route('admin.vehicles.store') }}" class="form-group" enctype="multipart/form-data">
    @csrf

    <label for="nombre" class="form-label">Nombre:</label>
    <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" required autofocus>

    <label for="tipo" class="form-label">Tipo:</label>
    <input type="text" name="tipo" id="tipo" value="{{ old('tipo') }}" required>

    <label for="capacidad" class="form-label">Capacidad:</label>
    <input type="number" name="capacidad" id="capacidad" value="{{ old('capacidad') }}" required>

    <label for="color" class="form-label">Color:</label>
    <input type="text" name="color" id="color" value="{{ old('color') }}" required>

    <label for="precio" class="form-label">Precio:</label>
    <input type="number" name="precio" id="precio" value="{{ old('precio') }}" required>

    <label for="estado" class="form-label">Estado:</label>
    <select name="estado" id="estado" required>
        <option value="disponible">Disponible</option>
        <option value="vendido">Vendido</option>
    </select>

    

    <label for="modelo3d" class="form-label">Modelo 3D:</label>
    <input type="file" name="modelo3d" id="modelo3d" accept="image/*" required>

    <button type="submit" class="btn btn-primary">Agregar</button>

    <a href="{{ route('admin.vehicles.index') }}">Cancelar</a>
</form>

@endsection

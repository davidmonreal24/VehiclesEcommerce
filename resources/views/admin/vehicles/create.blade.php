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

    <!-- Otros campos del vehículo -->

    <label for="modelo3d" class="form-label">Modelo 3D:</label>
    <input type="file" name="modelo3d" id="modelo3d" accept="image/*" required>

    <button type="submit" class="btn btn-primary">Agregar</button>

    <a href="{{ route('admin.vehicles.index') }}">Cancelar</a>
</form>

@endsection

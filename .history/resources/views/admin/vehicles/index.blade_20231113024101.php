@extends('layouts.app')

@section('content')
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<h3>Lista de Vehículos</h3>

<div class="row row-cols-1 row-cols-md-2 g-4">
    @foreach($vehicles as $vehicle)
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $vehicle->nombre }}</h5>
                    <p class="card-text"><strong>Tipo:</strong> {{ $vehicle->tipo }}</p>
                    <p class="card-text"><strong>Capacidad:</strong> {{ $vehicle->capacidad }}</p>
                    <p class="card-text"><strong>Color:</strong> {{ $vehicle->color }}</p>
                    <p class="card-text"><strong>Precio:</strong> {{ $vehicle->precio }}</p>
                    <p class="card-text"><strong>Estado:</strong> {{ $vehicle->estado }}</p>
                    <p class="card-text"><strong>Modelo 3D:</strong> {{ $vehicle->modelo3d }}</p>
                    @if(auth()->user()->rol == 'admin')
                        <a href="{{ route('admin.vehicles.edit', $vehicle->id) }}" class="btn btn-primary">Editar</a>
                        <form method="POST" action="{{ route('admin.vehicles.destroy', $vehicle->id) }}" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
</div>

@endsection

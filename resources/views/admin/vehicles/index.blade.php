@extends('layouts.app')

@section('content')
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<h3>Lista de Vehículos</h3>

<div class="row row-cols-1 row-cols-md-3 g-4">
    @foreach($vehicles as $vehicle)
    <div class="col">
        <div class="card">
            <div class="card-body">
            <img src="{{ asset('storage/modelos3d/' . $vehicle->modelo3d) }}" alt="Modelo 3D" width="300px" height="200px">
                <h5 class="card-title">{{ $vehicle->nombre }}</h5>
                <p class="card-text">Tipo: {{ $vehicle->tipo }}</p>
                <p class="card-text">Capacidad: {{ $vehicle->capacidad }}</p>
                <p class="card-text">Color: {{ $vehicle->color }}</p>
                <p class="card-text">Precio: {{ $vehicle->precio }}</p>
                <p class="card-text">Estado: {{ $vehicle->estado }}</p>
                


                @if(auth()->user()->rol != 'cliente')
                <a href="{{ route('admin.vehicles.edit', $vehicle->id) }}" class="btn btn-primary">Editar</a>
                <form method="POST" action="{{ route('admin.vehicles.destroy', $vehicle->id) }}">
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

{{ $vehicles->links() }}
@endsection
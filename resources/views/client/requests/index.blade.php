@extends('layouts.app')

@section('content')
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<h3>Lista de solicitudes</h3>

<div class="row row-cols-1 row-cols-md-3 g-4">
    @foreach($requests as $request)
    <div class="col">
        <div class="card">
            <div class="card-body">
            @foreach($vehicles as $vehicle)
                <!-- Asegúrate de ajustar la lógica según tus necesidades -->
                @if($vehicle->id == $request->id_vehicle)
                    <img src="{{ asset('storage/modelos3d/' . $vehicle->modelo3d) }}" alt="Modelo 3D" width="300px" height="200px">
                @endif
            @endforeach
                <p class="card-text">Estado: {{ $request->estado }}</p>

                @if(auth()->user()->rol != 'admin')
                <a href="{{ route('client.requests.edit', $request->id) }}" class="btn btn-primary">Editar</a>
                @if(auth()->user()->rol != 'becario')
                <form method="POST" action="{{ route('client.requests.destroy', $request->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
                @endif
                @endif
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
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

<h3>Editar solicitud</h3>

<form action="{{ route('client.requests.update',$clientRequest->id) }}" method="POST" role="form">
    @csrf
    @method('PUT')

    <!--  -->
    <label for="id_user">Usuario:</label>
    <input type="text" name="id_user" id="id_user" value="{{ Auth::user()->id}}" readonly>
    <label for="estado">Estatus:</label>
    <input type="text" name="estado" id="estado" value="{{ $clientRequest->estado }}">

    <label for="id_vehicle">Seleccionar Vehículo:</label>
    <select name="id_vehicle" id="id_vehicle" required>
        @foreach($vehicles as $vehicle)
        <option value="{{ $vehicle->id }}">{{ $vehicle->nombre }}</option>
        @endforeach
    </select>

    

    <button type="submit">Actualizar</button>

    <a href="{{ route('client.requests.index') }}">Cancelar</a>
</form>

@endsection





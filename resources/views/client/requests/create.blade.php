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

<h3>Crear solicitud de compra</h3>

<form action="{{ route('client.requests.store') }}" method="POST" class="form-group">
  @csrf
  <label for="id_vehicle">Seleccionar Vehículo:</label>
  <select name="id_vehicle" id="id_vehicle" required>
    @foreach($vehicles as $vehicle)
    <option value="{{ $vehicle->id }}">{{ $vehicle->nombre }}</option>
    @endforeach
  </select>
  <label for="id_user">Usuario:</label>
  <input type="text" name="id_user" id="id_user" value="{{ Auth::user()->id }}" readonly>
  <label for="estado">Estatus:</label>
  <input type="text" name="estado" id="estado" value="{{ $clientRequest->estado }}" readonly>


  <button type="submit">Crear Solicitud</button>
</form>

@endsection
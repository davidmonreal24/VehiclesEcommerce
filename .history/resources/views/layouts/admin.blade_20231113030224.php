{{-- Estructura específica para el panel de administrador --}}
<div>
    <h2>Bienvenido, (Administrador)</h2>
    <ul class="navbar-nav  mb-2 mb-lg-0 d-flex flex-row align-items-center"  style="background-color: black;">
        <li class="nav-item me-5"><a class="nav-link active" aria-current="page" href="{{ route('admin.vehicles.create') }}" style="color:aliceblue">Agregar Vehículo</a></li>
        <li class="nav-item me-5"><a class="nav-link active" aria-current="page" href="{{ route('admin.vehicles.pdf-most-sold') }}" style="color:aliceblue">Descargar PDF de los más vendidos</a></li>
        <li class="nav-item me-5"><a class="nav-link active" aria-current="page" href="{{ route('admin.vehicles.pdf-all-sold') }}" style="color:aliceblue">Descargar PDF de los vendidos</a></li>
        <li class="nav-item me-5"><a class="nav-link active" aria-current="page" href="{{ route('admin.export.excel') }}" style="color:aliceblue">Exportar a Excel</a></li>
    </ul>
</div>
@yield('content')

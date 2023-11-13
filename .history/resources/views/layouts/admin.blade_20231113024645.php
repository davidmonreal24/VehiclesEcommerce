{{-- Estructura específica para el panel de administrador --}}
<div>
    <h2>Bienvenido, (Administrador)</h2>
    <ul class="navbar-nav  mb-2 mb-lg-0 d-flex flex-row align-items-center"  style="background-color: black;">
        <li class="nav-item me-5">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Agregar Vehículo
            </button>
        </li>
        <!-- Otros elementos de navegación -->
    </ul>
</div>

<!-- Contenido del modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Contenido del modal en create.blade.php -->
            @include('admin.vehicles.create')
        </div>
    </div>
</div>

@yield('content')

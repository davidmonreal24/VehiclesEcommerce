<div>
    <h2>Bienvenido, {{ Auth::user()->name }}</h2>
    <ul class="navbar-nav  mb-2 mb-lg-0 d-flex flex-row align-items-center">
        <!-- <li class="nav-item me-5 ps-5"><a class="nav-link active" aria-current="page" href="{{ route('admin.vehicles.index') }}" style="color:aliceblue">Ver Vehículos</a></li> -->
        <!-- ><li class="nav-item me-5"><a class="nav-link active" aria-current="page" href="{{ route('client.requests.create') }}">Crear Solicitud de compra</a></li> -->
    </ul>
</div>
@yield('content')



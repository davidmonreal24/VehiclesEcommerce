<!DOCTYPE html>
<html lang="en">
<head>
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->

</head>
<body>
    <!-- Barra de navegación común -->
    @include('layouts.navbar')

    <!-- Contenido específico según el rol -->
    @if(auth()->check())
        @if(auth()->user()->rol === 'admin')
            @include('layouts.admin')
        @elseif(auth()->user()->rol === 'becario')
            @include('layouts.becario')
        @elseif(auth()->user()->rol === 'cliente')
            @include('layouts.client')
        @endif
    @else
        <!-- Contenido para usuarios no autenticados, por ejemplo, pantalla de inicio de sesión -->
        @yield('content')
    @endif

    <!-- Pie de página común -->
    @include('layouts.footer')

    <!-- Scripts comunes -->
    @yield('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>

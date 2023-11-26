<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">

    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .a{
            text-decoration: none;
            cursor: pointer;
        }
        #wrapper {
            display: flex;
        }

        #sidebar {
            min-width: 250px;
            max-width: 250px;
            height: 100vh;
            background-color: #f8f9fa;
            padding-top: 20px;
            margin-right: 5px; /* Ajusta la separación entre el menú y el contenido principal */
        }

        #sidebar .list-group-item {
            border: none;
            background-color: #f8f9fa;
            color: #495057;
        }

        #sidebar .list-group-item:hover {
            background-color: #e9ecef;
        }

        #sidebar .list-group-item i {
            margin-right: 10px;
        }

        #menusuperior{
            display: none;
            margin-right: 0;
            margin-bottom: 20px;
        }

        @media (max-width: 768px) {
            #wrapper {
                flex-direction: column;
            }

            #sidebar {
                display: none; /* Ocultar el menú en dispositivos pequeños por defecto */
                margin-right: 0;
                margin-bottom: 20px;
            }
            #menusuperior{
                display: block;
                margin-right: 0;
                margin-bottom: 20px;
            }

        }
        .d-show {
            display: none;
        }
    </style>


    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                   Sistema De Prestamos
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            {{-- @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif --}}
                        @else

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->usuario }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @guest
        <main class="py-4">
            <!-- ... Login ... -->
            @yield('content')
        </main>
        @else

        <!-- Agrega este código al cuerpo de tu archivo Blade -->
        <div class="spinner-container text-center" id="loader">
            <div class="spinner-border" role="status">
                <span class="sr-only">Cargando...</span>
            </div>
        </div>

        <div id="contenedor" style="display: none">

            {{-- //contenido --}}
            <div class="container" style="margin-bottom: -25px; margin-top:10px; ">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div id="menusuperior">
                            <menu-superior-component :permisos="{{ json_encode(Auth::user()->with('permisos')->get()) }}"></menu-superior-component>
                        </div>
                    </div>
                </div>
            </div>

            <div id="wrapper">
                <!-- Sidebar -->
                <div class="bg-light border-right" id="sidebar" style="margin-left: 10px">
                    <menu-component :permisos="{{ json_encode(Auth::user()->with('permisos')->get()) }}" ></menu-component>
                </div>

                <!-- Contenido principal -->
                <main id="page-content-wrapper" class="py-4">
                    <!-- ... (contenido principal) ... -->
                    @yield('content')
                </main>
            </div>

        </div>

        @endguest
    </div>

    @stack('js')

    <script>
        window.onload = function () {
            // Oculta el spinner cuando la página está completamente cargada
            document.getElementById("loader").style.display = "none";

            document.getElementById("contenedor").style.display = "block";

        };
    </script>

    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> --}}
    <script>

        // Script para ocultar el menú cuando la pantalla se ajusta a dispositivos pequeños
        window.addEventListener('resize', function () {
            // document.getElementById('menusuperior').classList.add('d-none');

            if (window.innerWidth <= 768) {
                document.getElementById('sidebar').classList.add('d-none');
                document.getElementById('menusuperior').classList.add('active');
            } else {
                document.getElementById('sidebar').classList.remove('d-none');
                document.getElementById('menusuperior').classList.add('active');
            }
        });
    </script>

</body>
</html>

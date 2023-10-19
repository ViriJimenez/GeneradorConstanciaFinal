<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Mi Sistema</title>
    <link rel="icon" type="image/png" href="../img/tecnm.png">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../../css/es-menu.css">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
    <title>Menú</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <style>
        div.container {

            background: rgba(255, 255, 255, 0.863);
            margin: auto;
            padding: 20px;
            position: relative;
            z-index: 999;
            margin-top: 100px;
        }

        .form {
            display: flex;
            flex-direction: column;
            gap: 5px
        }

        input {
            padding: 10px;
            outline: none;
            font-size: 15px;
        }

        select {
            padding: 10px;
            outline: none;
        }

        input:focus {
            font-style: normal;
            font-weight: bold;
        }

        input::placeholder {
            font-weight: normal;
        }

        .entrada {
            padding: 12px 8px;
            outline: none;
            color: white;
            font-size: 15px;
            cursor: pointer;
            width: 100%;
            text-decoration: none;
            text-align: center;
            background: rgb(0, 119, 199);
        }

        .entrada:hover {
            background: rgb(1, 137, 227);
        }

        p.title {
            text-align: center;
            font-weight: bold;
            color: rgb(9, 17, 41);
            padding: 0;
            margin: 0;
        }

        #navbarDropdown {
            width: 100% !important;
            text-align: right !important;
            margin-left: -85px;
        }
    </style>
</head>


<body id="body">
    <header>
        <div class="icon__menu">
            <i class="fas fa-bars" id="btn_open"></i>
        </div>

        <ul class="icon__session">
            <!-- Authentication Links -->
            @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Acceder') }}</a>
                    </li>
                @endif

                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Registrar') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle nombreUsuario" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                            {{ __('Cerrar sesión') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>

                        {{-- <a class="dropdown-item" href="{{ route('register') }}"> Registrar
                        </a> --}}
                    </div>
                </li>
            @endguest
        </ul>
    </header>

    <div class="menu__side" id="menu_side">

        <div class="name__page">
            <i class="fas fa-school"></i>
            <h4> ITSAL</h4>
        </div>

        <div class="options__menu">

            @if (Auth::user()->tipo_usuario != 1)
                <a href="{{ route('busquedas.index') }}" class="{{ Request::is('') ? 'selected' : '' }}">
                    <div class="option">
                        <i class="fas fa-home" title="Búsquedas"></i>
                        <h4>Búsquedas</h4>
                    </div>
                </a>
            @endif

            @if (Auth::user()->tipo_usuario == 1)
                <a href="{{ url('/') }}" class="{{ Request::is('') ? 'selected' : '' }}">
                    <div class="option">
                        <i class="fas fa-home" title="Inicio"></i>
                        <h4>Inicio</h4>
                    </div>
                </a>
                <a href="{{ route('carreras.index') }}">
                    <div class="option">
                        <i class="fas fa-book-open" title="Carrera"></i>
                        <h4>Carrera</h4>
                    </div>
                </a>
                <a href="{{ route('publicos.index') }}">
                    <div class="option">
                        <i class="fas fa-users" title="Público"></i>
                        <h4>Público</h4>
                    </div>
                </a>
                <a href="{{ route('departamentos.index') }}">
                    <div class="option">
                        <i class="fas fa-building" title="Departamentos"></i>
                        <h4>Departamentos</h4>
                    </div>
                </a>
                {{-- <a href="{{ route('ponentes.index') }}">
                <div class="option">
                    <i class="fas fa-user-tie" title="Ponentes"></i>
                    <h4>Ponentes</h4>
                </div>
            </a> --}}
                <a href="{{ route('instructors.index') }}">
                    <div class="option">
                        <i class="fas fa-book-reader" title="Instructores"></i>
                        <h4>Instructores</h4>
                    </div>
                </a>
                <a href="{{ route('eventos.index') }}">
                    <div class="option">
                        <i class="fas fa-calendar-check" title="Eventos"></i>
                        <h4>Eventos</h4>
                    </div>
                </a>
                <a href="{{ route('docentes.index') }}">
                    <div class="option">
                        <i class="fas fa-user-edit" title="Docentes"></i>
                        <h4>Docentes</h4>
                    </div>
                </a>
                <a href="{{ route('estudiantes.index') }}">
                    <div class="option">
                        <i class="fas fa-user-graduate" title="Estudiantes"></i>
                        <h4>Estudiantes</h4>
                    </div>
                </a>
                <a href="{{ route('cursos.index') }}">
                    <div class="option">
                        <i class="fas fa-graduation-cap" title="Cursos"></i>
                        <h4>Cursos</h4>
                    </div>
                </a>
            @endif


            <a href="{{ route('inscripcion.index') }}" class="{{ Request::is('inscripcion') ? 'selected' : '' }}">
                <div class="option">
                    <i class="fas fa-clipboard-check" title="Inscripciones"></i>
                    <h4>Inscripciones</h4>
                </div>
            </a>
            {{-- <a href="{{ route('conferencias.index') }}">
                <div class="option">
                    <i class="fas fa-chalkboard-teacher" title="Conferencias"></i>
                    <h4>Conferencias</h4>
                </div>
            </a> --}}
        </div>
    </div>
    <br><br>
    <br><br>
    <main class="py-4">
        @yield('content')
    </main>
    <script src="../js/script.js"></script>
</body>

</html>

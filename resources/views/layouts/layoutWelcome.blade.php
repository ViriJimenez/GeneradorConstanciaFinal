<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Mi Sistema</title>

    <link rel="icon" type="image/png" href="../img/tecnm.png">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/es-menu.css">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
    <title>Menú</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
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
            width: 500px;
            max-width: 680px;
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
            width: 100%!important;
            margin-left: -125px;
        }
    </style>

</head>



<body id="body">
    <header>
        <div class="principal">
            <div class="icon__menu">
                <i class="fas fa-bars" id="btn_open"></i>
            </div>
            <div class="logo__container">
                <img src="{{ asset('img/tecnm.png') }}" class="logo1">
                <h1 class="logo__title">INSTITUTO TECNOLÓGICO DE SALINA CRUZ</h1>
                <img src="{{ asset('img/Itsal.png') }}" class="logo2">
            </div>
        </div>
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Acceder') }}</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#" id="registrar">Registrar</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('..') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle nombreUsuario" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" >
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                {{ __('Salir') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </nav>
    </header>

    <div class="fondo">
        <div class="menu__side" id="menu_side">

            <div class="name__page">
                <i class="fas fa-school"></i>
                <h4> ITSAL</h4>
            </div>

            <div class="options__menu">

                <a href="{{ url('/') }}" class="{{ Request::is('/') ? 'selected' : '' }}">
                    <div class="option">
                        <i class="fas fa-home" title="Inicio"></i>
                        <h4>Inicio</h4>
                    </div>
                </a>
                {{-- <a href="{{ url('/') }}">
                    <div class="option">
                        <i class="bi bi-search" title="Buscador"></i>
                        <h4>Buscar</h4>
                    </div>
                </a> --}}
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
                {{-- <a  href="{{ route('ponentes.index') }}">
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
                <a href="{{ route('inscripcion.index') }}">
                    <div class="option">
                        <i class="fas fa-clipboard-check" title="Inscripciones"></i>
                        <h4>Inscripciones</h4>
                    </div>
                </a>
                {{-- <a  href="{{ route('conferencias.index') }}">
                <div class="option">
                    <i class="fas fa-chalkboard-teacher" title="Conferencias"></i>
                    <h4>Conferencias</h4>
                </div>
            </a> --}}
            </div>
        </div>
        <br><br>
        <br><br>
        <div>
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}">Inicio</a>
                    @else
                        <a href="{{ route('login') }}">Acceder</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Registrar</a>
                        @endif
                    @endauth


                </div>
                @yield('contenido')

            @endif
        </div>
    </div>
    <script src="../js/script.js"></script>


    <footer>

        <div class="container-footer-all">

            <div class="container-body">

                <div class="colum1">
                    <h1 class="text-center font-bold">INSTITUTO TECNOLÓGICO DE SALINA CRUZ</h1>

                    <p class="text-justify">Se caracteriza por proporcionar una alternativa más de educación superior a
                        los estudiantes del Istmo de Tehuantepec y sus alrededores en las ingenierías en Acuicultura,
                        Mecánica, Electrónica, Gestión Empresarial, Tecnologías de la Información y Comunicaciones e
                        Ingeniería Química</p>

                </div>

                <div class="colum2">

                    <h5 class="text-center font-bold">REDES SOCIALES</h5>
                    <div class="row">
                        <img src="../icon/facebook.png">
                        <label>TecNM campus Salina Cruz</label>
                    </div>
                    <div class="row">
                        <img src="../icon/twitter.png">
                        <label>TecNM campus Salina Cruz</label>
                    </div>
                    <div class="row">
                        <img src="../icon/internet.png">
                        <label>www.salinacruz.tecnm.mx</label>
                    </div>


                </div>

                <div class="colum3">

                    <h5 class="text-center font-bold">INFORMACIÓN CONTACTOS</h5>

                    <div class="row2">
                        {{-- <img src="icon/mapa.png"> --}}
                        <img src="../icon/mapa.png">
                        <label>Carretera a San Antonio Monterrey KM. 1.7 70701 Salina Cruz, México</label>
                    </div>

                    <div class="row2">
                        {{-- <img src="icon/llamada-telefonica.png"> --}}
                        <img src="../icon/llamada-telefonica.png">
                        <label> +52 (971) 716-3242
                            +52 (971) 716-2837
                        </label>
                    </div>

                    <div class="row2">
                        {{-- <img src="icon/correo-electronico.png"> --}}
                        <img src="../icon/correo-electronico.png">
                        <label>dir_salinacruz@tecnm.mx</label>
                    </div>

                </div>

            </div>

        </div>

        <div class="container-footer">
            <div class="footer">
                <div class="copyright">
                    ©Copyright 2022 TecNM-Todos los Derechos Reservados | <a href="">ITSAL</a>
                </div>

                <div class="information">
                    <a href="">Sistema de Informacion Web</a> | <a href="">Privación y Política</a> | <a
                        href="">Términos y Condiciones</a>
                </div>
            </div>

        </div>

    </footer>

    <script>
        //al hacer click en #registrar se ejecuta la funcion de poner y quitar  con un click el atributo apen a la etiqueta details
        //primeri verificar si tiene el atributo apen si lo tiene lo quita y si no lo tiene lo pone

        document.getElementById('registrar').addEventListener('click', function() {
            if (document.getElementById('details').hasAttribute('open')) {
                document.getElementById('details').removeAttribute('open');
            } else {
                document.getElementById('details').setAttribute('open', 'apen');
                document.getElementById('curp').focus();
            }
        });
    </script>
</body>

</html>

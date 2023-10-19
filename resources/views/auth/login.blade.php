@extends('layouts.layoutWelcome')

@section('contenido')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="../css/style.css">

    <script src="js/jquery-3.2.1.js"></script>
    <script src="js/script.js"></script>
</head>

<body>
<br><br>
    <section class="form_wrap">
        <section class="cantact_info">
            <section class="info_title">
                <span><i class="bi bi-person-circle"></i></span>
                    <h2>INSTITUTO TECNOLÓGICO DE SALINA CRUZ </h2>
                </section>
                <section class="info_items">
                    <p><i class="bi bi-telephone-fill"> +52 (971) 716-3242</i></p>
                    <p><i class="bi bi-envelope-fill"> dir_salinacruz@tecnm.mx </i></p>
                    <p><i class="bi bi-globe2"> www.salinacruz.tecnm.mx</i></p>
                    <p><i class="bi bi-facebook"> TecNM campus Salina Cruz</i></p>
                    <p><i class="bi bi-twitter"> TecNM campus Salina Cruz</i></p>
                </section>
            </section>

            <form class="form_contact" method="POST" action="{{ route('login') }}">
                <br>
                <h2>LOGIN</h2>
                <div class= {{ __('Login') }}></div>
                @csrf
                <br><br>
                <label for="email">{{ __('Dirección de correo electrónico *') }}</label>
                <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                <label for="password">{{ __('Contraseña *') }}</label>
                <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                        <br>
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                {{ __('Recuerdame') }}
                            </label>
                        </div>
                    </div>
                    <br><br>
                    <button type="submit" class ="btn btn-primary float-right">
                        {{ __('Acceder') }}
                    </button>
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('¿Olvidaste tu contraseña?') }}
                        </a>
                    @endif
            </form>

        </section>
    </section>
</body>
</html>

@endsection

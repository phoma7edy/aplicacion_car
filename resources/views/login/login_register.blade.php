<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styleLogin.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>


    <link rel="stylesheet" href="{{ asset('css/vendorsAdmin/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" media="screen" href="{{ asset('css/vendor/simplebar/dist/simplebar.min.css') }}" />
    <link rel="stylesheet" media="screen" href="{{ asset('css/vendor/tiny-slider/dist/tiny-slider.css') }}" />
    <link rel="stylesheet" media="screen" href="{{ asset('css/theme.min.css') }}">

    <title>login</title>
</head>

<body>
    @if ($errors->any())
        <script>
            alert("{{ $errors->first() }}");
        </script>
    @endif

    @if (session('success'))
        <script>
            alert("{{ session('success') }}");
        </script>
    @endif
    <div class="container-form sign-up active">
        <div class="welcome-back">
            <div class="message">
                <h1>Bienvenido a EdyCar</h1>
                <h6>Si ya tienes una cuenta por favor inicia sesion aqui</h6>
                <a class="sign-up-btn btn btn-primary">Iniciar Sesion</a>
            </div>
        </div>
        



        <form class="formulario" action="{{ route('register.post') }}" method="POST">
            @csrf
            @if (session('message'))
            <div class="alert alert-warning">
                {{ session('message') }}
            </div>
        @endif
            <h1 id="create-account">Crear una cuenta</h1>
            <div class="iconos">
                <div class="border-icon">
                    <i class='bx bxl-google'></i>
                </div>
                <div class="border-icon">
                    <i class='bx bxl-linkedin'></i>
                </div>
                <div class="border-icon">
                    <i class='bx bxl-facebook-circle'></i>
                </div>
            </div>
            <p class="cuenta-gratis">Crear una cuenta gratis</p>
            <input type="text" placeholder="Nombre" name="nombre" required>
            <input type="text" placeholder="NombreUsuario" name="nomUsuario" required>
            <input type="email" placeholder="Email" name="correo" required>
            <input type="password" placeholder="Contraseña" name="password" required>
            <input type="submit" value="Registrarse">
        </form>

    </div>
    <div class="container-form sign-in active">
        <form class="formulario" action="{{ route('login') }}" method="POST">
            @csrf
            <h1 id="create-account">Iniciar Sesion</h1>
            <div class="iconos">
                <div class="border-icon">
                    <i class='bx bxl-google'></i>
                </div>
                <div class="border-icon">
                    <i class='bx bxl-linkedin'></i>
                </div>
                <div class="border-icon">
                    <i class='bx bxl-facebook-circle'></i>
                </div>
            </div>
            <p class="cuenta-gratis">ingresa y descubre nuevos autos</p>
            <input type="text" placeholder="Email o nombre de usuario" name="nomUsuario">
            <input type="password" placeholder="Contraseña" name="password">
            <input type="submit" value="Iniciar Sesion">
        </form>
        <div class="welcome-back">
            <div class="message">
                <h1>Bienvenido de nuevo</h1>
                <h6>Si aun no tienes una cuenta por favor registrese aqui</h6>
                <a class="sign-in-btn btn btn-primary">Registrarse</a>
            </div>
        </div>
    </div>
    <a class="nav-link btn-danger" href="{{ route('home') }}" role="button">VOLVER</a>

    {{-- <script src="script.js"></script> --}}
</body>
<script>
    const $btnSignIn = document.querySelector('.sign-in-btn'),
        $btnSignUp = document.querySelector('.sign-up-btn'),
        $signUp = document.querySelector('.sign-up'),
        $signIn = document.querySelector('.sign-in');

    showLogin();

    function showLogin() {
        document.addEventListener('click', e => {
            if (e.target === $btnSignIn || e.target === $btnSignUp) {
                $signIn.classList.toggle('active');
                $signUp.classList.toggle('active')
            }
        });
    }
</script>

</html>

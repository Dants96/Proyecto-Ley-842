<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administrador - Login</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
</head>

<body>
    <div class="wrapper fadeInDown">
        @if(! $errors->isEmpty() )
      <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
        </ul>
      </div>
      @endif
        <div id="formContent">
            <!-- Tabs Titles -->

            <!-- Icon -->
            <div id="header" class="fadeIn first">
                <a href="{{route('inicio')}}">
                    <img style="width: 35%" src="{{asset('images/logo2.1.png')}}" id="icon" alt="Icon" />
                </a>
                <h2  class="font-weight-bold">MODO ADMINISTRADOR</h2>
            </div>

            <!-- Login Form -->
            <form action="{{route('adminLogin_post')}}"  method="POST" autocomplete="off">
                @csrf
                <input type="text" id="cedula" class="fadeIn second" name="cedula" placeholder="Cedula" required>
                <input type="password" id="password" class="fadeIn third" name="password" placeholder="Contraseña" required>
                <input type="submit" class="fadeIn fourth" value="Acceder">
            </form>

            <!-- Remind Passowrd -->
            <div id="formFooter">
                <a class="underlineHover" href="#">Olvido su contraseña?</a>
            </div>

        </div>
    </div>
    <script src="{{ asset('js/app.js') }}" defer></script>

</body>

</html>

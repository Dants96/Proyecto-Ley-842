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
        <div id="formContent">
            <!-- Tabs Titles -->

            <!-- Icon -->
            <div class="fadeIn first">
                <!-- <img src="" id="icon" alt="User Icon" /> -->
                <h2  class="font-weight-bold">ADMINISTRADOR</h2>
            </div>

            <!-- Login Form -->
            <form autocomplete="off">
                <input type="text" id="login" class="fadeIn second" name="login" placeholder="Cedula">
                <input type="password" id="password" class="fadeIn third" name="login" placeholder="Contraseña">
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

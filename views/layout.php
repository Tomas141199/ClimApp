<?php

if (!isset($_SESSION)) {
    session_start();
}
//Verifica que haya una sesion iniciada 
$auth = $_SESSION['login'] ?? false;
$nombre_usuario = $_SESSION['nombre'] ?? false;
$isadmin = $_SESSION['is_admin'] ?? false;
//Verifica si es que se esta accediendo a la pagina de prediccion
$active =  $band ?? false;

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Estilos de la aplicacion -->
    <link rel="stylesheet" href="/css/styles.css" />
    <!-- Normalize -->
    <link rel="stylesheet" href="/css/normalize.css" />

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>

    <!-- CND de MDBootstrap -->
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css" rel="stylesheet" />
    <!-- Fin CDN MDBootstrap -->

    <title>Document</title>
</head>

<body class="wh-auto">
    <!-- Header -->
    <header>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <!-- Container wrapper -->
            <div class="container-fluid">
                <!-- Navbar brand -->
                <a class="navbar-brand me-2" href="/">
                    <img src="/img/logo.png" class="brand-logo-m" alt="logo climapp" loading="lazy" />
                </a>

                <!-- Toggle button -->
                <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                    data-mdb-target="#navbarButtonsExample" aria-controls="navbarButtonsExample" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>

                <!-- Collapsible wrapper -->
                <div class="collapse navbar-collapse" id="navbarButtonsExample">
                    <!-- Left links -->
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <!--spacer-->
                    </ul>

                    <!-- Left links -->
                    <div class="d-flex align-items-center">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <!-- Verifica si el usuario no esta autenticado para permitirle iniciar sesion  -->
                            <?php if (!$auth) : ?>
                            <li>
                            <li class="nav-item">
                                <a class="nav-link me-2" href="/">Iniciar Sesion</a>
                            </li>
                            <li>
                                <a class="nav-link me-2" href="/registro">Registrarse</a>
                            </li>
                            <?php endif; ?>

                            <?php if ($auth && $isadmin) : ?>
                            <li>
                            <li class="nav-item">
                                <a class="nav-link me-2" href="/registro-clima">Registrar Clima</a>
                            </li>
                            <?php endif; ?>

                            
                            <!-- Si esta autenticado se le permite cerrar sesion y predecir -->
                            <?php if ($auth) : ?>
                            <li>
                                <a href="/predecir-clima" class="nav-link me-2">
                                    Predecir
                                </a>
                            </li>
                            <li>
                                <div class="dropdown">
                                    <a class="btn btn-link text-muted dropdown-toggle" href="#" role="button"
                                        id="dropdownMenuLink" data-mdb-toggle="dropdown" aria-expanded="false">
                                        <img src="/img/user.png" class="user-icon" alt="user icon">
                                        <?php echo $nombre_usuario ?>
                                    </a>

                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <li><a class="dropdown-item" href="/logout">Cerrar Sesion</a></li>
                                    </ul>
                                </div>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
                <!-- Collapsible wrapper -->
            </div>
            <!-- Container wrapper -->
        </nav>
        <!-- Navbar -->
    </header>
    <!-- Header -->



    <!-- Contenedor -->
    <div class="bg-image wh-auto" 
     style="background-image: url('/img/<?php echo $bg ?>.png')">
     <!--style="background-image: url('https://image.freepik.com/foto-gratis/arboles-al-lado-otro-bosque-cubiertos-niebla-que-arrastra_181624-16397.jpg')">
     -->  
     <div class="container-fluid mt-2">
            <?php echo $contenido; ?>
        </div>
    </div>
    <!-- Contenedor-->

    <!-- MDB -->
    <script type=" text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js">
    </script>
    <!-- Fin MDB -->

    <!-- Verifica que se encuentra en la pagina de prediccion para hacer la carga de todo el modelo  -->
    <?php if ($active) : ?>
    <!-- Archivo JS de la aplicacion -->
    <!-- CDN Brainjs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/brain.js/2.0.0-beta.1/brain-browser.min.js"
        integrity="sha512-MI1PUoQHsMVp8aw45rX19K4o8XlVfPB6jaGlHrj0zUv1ZDnq307ji47GWS1MfUfQDNua43c8vK1iCcuOjMXZBA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="/ml/trainMOD1.json"></script>
    <script src="/js/app.js"></script>
    <?php endif; ?>

</body>

</html>
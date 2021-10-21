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

<body>
    <!-- Header -->
    <header>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <!-- Container wrapper -->
            <div class="container">
                <!-- Navbar brand -->
                <a class="navbar-brand me-2" href="/login">
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
                        <li class="nav-item">
                            <a class="nav-link active" href="/login">Inicio</a>
                        </li>
                    </ul>

                    <!-- Left links -->
                    <div class="d-flex align-items-center">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link me-2" href="/login">Iniciar Sesion</a>
                            </li>
                            <li>
                                <a class="nav-link me-2" href="/registro">Registrarse</a>
                            </li>
                            <li>
                                <a class="btn btn-danger">
                                    Cerrar Sesion
                                </a>
                            </li>
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


    <!-- Background -->
    <div class="bg-image bg-size" style="background-image: url('/img/<?php echo $bg ?>.png');
      ">
        <div class="mask bg-mask">
            <!-- Contenedor -->
            <div class="container mt-5">
                <?php echo $contenido; ?>
            </div>
            <!-- Contenedor-->
        </div>
    </div>
    <!-- Background -->



    <!-- MDB -->
    <script type=" text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js">
    </script>
    <!-- Fin MDB -->

    <!-- CDN Brainjs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/brain.js/2.0.0-beta.1/brain-browser.min.js"
        integrity="sha512-MI1PUoQHsMVp8aw45rX19K4o8XlVfPB6jaGlHrj0zUv1ZDnq307ji47GWS1MfUfQDNua43c8vK1iCcuOjMXZBA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Archivo JS de la aplicacion -->
    <!-- <script src="/js/app.js"></script> -->
</body>

</html>
<div class="row py-5">
    <div class="col-lg-4 mx-auto">

        <!-- Cadena de Errores -->
        <?php foreach ($errores  as $error) : ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $error ?>
        </div>
        <?php endforeach; ?>
        <!-- Cadena de Errores -->

        <!-- Contenedor Formulario -->
        <div class="p-5 bg-white rounded shadow-lg">
            <p class="lead mb-4 fs-4">Inicia Sesión</p>
            <!-- Formulario -->
            <form action="/" method="post">

                <label class="mb-1">Email</label>
                <input name="usuario[email]" class="form-control mb-3" type="text" placeholder="correo@mail.com"
                    value=<?php echo $auth->email ?>>

                <label class="mb-1">Password</label>
                <input name="usuario[password]" class="form-control mb-3" type="password" placeholder="contraseña">

                <button type="submit" class="btn btn-primary btn-md mt-5 fw-light"
                    style="text-transform: none; font-size: 90%;">
                    Iniciar Sesión
                </button>
            </form>
            <!-- Formulario -->

            <div class="pt-3 mb-2">
                <p class="m-0" style="font-size: 90%;">
                    ¿No tienes una cuenta?
                    <a href="/registro">
                        Regístrate
                    </a>
                </p>
            </div>
        </div>
        <!-- Contenedor Formulario -->
    </div>
</div>
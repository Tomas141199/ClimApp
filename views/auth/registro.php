<div class="ms-5">
    <div class="row py-2">
        <!-- probar con py-4 -->
        <div class="col-lg-6">
            <!-- probar añadiendo offset-lg-1-->
            <div class="p-5 bg-white rounded shadow-lg">
                <div class="mx-2">
                    <p class="lead mb-4 fs-4">Registrate para empezar a predecir</p>
                    <form method="post">
                        <label class="mb-1">Nombre(s)</label>
                        <input name="usuario[nombre]" class="form-control mb-3" type="text" placeholder="Tu Nombre"
                            value=<?php echo $usuario->nombre ?>>
                        <div class="row">
                            <div class="col">
                                <label class="mb-1">Apellido Paterno</label>
                                <input name="usuario[apm]" class="form-control mb-3" type="text"
                                    placeholder="Tu Apellido Paterno" value=<?php echo $usuario->app ?>>
                            </div>
                            <div class="col">
                                <label class="mb-1">Apellido Materno</label>
                                <input name="usuario[app]" class="form-control mb-3" type="text"
                                    placeholder="Tu Apellido Materno" value=<?php echo $usuario->apm ?>>
                            </div>
                        </div>
                        <label class="mt-4 mb-1">Email</label>
                        <input name="usuario[email]" class="form-control mb-3" type="text"
                            placeholder="Ejem: correo@mail.com" value=<?php echo $usuario->email ?>>
                        <div class="row">
                            <div class="col">
                                <label class="mb-1">Contraseña</label>
                                <input name="usuario[password]" class="form-control mb-3" type="password"
                                    placeholder="Tu Contraseña">
                            </div>
                            <div class="col">
                                <label class="mb-1">Repetir contraseña</label>
                                <input name="passwordrep" class="form-control mb-3" type="password"
                                    placeholder="Repetir contraseña">
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary btn-md mt-4 fw-light"
                                style="text-transform: none; font-size: 90%;">
                                Confirmar registro
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Mensajes de error -->
        <div class="col-6 col-md-4 ms-5">
            <?php foreach ($errores as $error) : ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error ?>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
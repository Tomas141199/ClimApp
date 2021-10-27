<?php

if ($resultado) {
    $mensaje = mostrarNotificacion($resultado);
} else {
    $mensaje = false;
}

?>


<div class="container-fluid bg-size">
    <div class="row">
        <div class="col-lg-8 mt-4">
            <!-- Se puede añadir: style="margin-bottom: 15%;" -->
            <div class="mb-4" style="font-size: 310%; color: white; font-family:Arial, Helvetica, sans-serif;">
                Captura de registros
            </div>

            <div class="row py-2">

                <div class="col-lg-11">

                    <!-- Mensaje de Confirmacion -->
                    <?php if ($mensaje) : ?>
                    <div id="mensaje" class="alert alert-success" role="alert">
                        <h4 class="alert-heading">Registro Guardado!</h4>
                        <p>&check; <?php echo $mensaje ?></p>
                        <hr>
                    </div>
                    <?php endif; ?>
                    <!-- Mensaje de Confirmacion -->

                    <div class="px-4 py-4 bg-white shadow-lg" style="border-radius: 10px;">

                        <!-- Cadena de Errores -->
                        <?php foreach ($errores  as $error) : ?>
                        <div class="alert alert-danger" role="alert">
                            &#215; <?php echo $error ?>
                        </div>
                        <?php endforeach; ?>
                        <!-- Cadena de Errores -->

                        <div class="mx-1">
                            <p class="mb-4">Ingresa un registro nuevo a la base de datos</p>

                            <form method="post">
                                <div class="row mb-3">
                                    <div class="col">
                                        <label class="mb-1">Temperatura</label>
                                        <input id="temp" name="registro[temperatura]" class="form-control" type="number"
                                            placeholder="Temperatura" value=<?php echo $registro->temperatura ?>>
                                    </div>
                                    <div class="col">
                                        <label class="mb-1">Humedad</label>
                                        <input id="hum" name="registro[humedad]" class="form-control" type="number"
                                            placeholder="Humedad" value=<?php echo $registro->humedad ?>>
                                    </div>
                                    <div class="col">
                                        <label class="mb-1">Velocidad del viento</label>
                                        <input id="veloc" name="registro[velocidadViento]" class="form-control"
                                            type="number" placeholder="Velocidad"
                                            value=<?php echo $registro->velocidadViento ?>>
                                    </div>
                                    <div class="col">
                                        <label class="mb-1">Clima</label>
                                        <input id="clima" name="registro[resultado]" class="form-control" type="text"
                                            placeholder="Clima" value=<?php echo $registro->resultado ?>>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary btn-md mt-4 fw-light"
                                        style="text-transform: none; font-size: 90%;">Guardar registro </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 px-5 pt-5 pb-4" style="background-color: rgba(255, 255, 255, 0.7);">
            <div class="mt-3 mb-3 fs-4 text-break" style="line-height: 20%;">
                Últimos registros
                <br><i class="fas fa-caret-down fa-2x"></i>
            </div>

            <!-- EN ESTE DIV IRÁN LAS TEMPERATURAS -->
            <div>
                <?php foreach ($historial as $registro) : ?>
                <div class="pt-3 px-3 mb-3" style="border: 3px solid rgb(120, 120, 120); line-height: 80%;">
                    <p>Temperatura: <span><?php echo $registro->temperatura ?></span></p>
                    <p>Humedad: <span><?php echo $registro->humedad ?></span></p>
                    <p>Velocidad del Viento: <span><?php echo $registro->velocidadViento ?></span></p>
                    <p class="pt-2 text-end"><?php echo $registro->resultado ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
document.addEventListener("DOMContentLoaded", function() {
    addEventos();
});

function addEventos() {
    setTimeout(function() {
        $("#mensaje").addClass("d-none");
    }, 5000);
}
</script>
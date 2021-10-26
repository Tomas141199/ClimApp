<?php

if (!isset($_SESSION)) {
    session_start();
}
//Verifica que haya una sesion iniciada 
$auth_id = $_SESSION['usuario'] ?? false;

?>

<!-- Contenedor Formulario -->
<div class="container">

    <div class="row" style="padding: 40px">
        <div class="mb-4" style="font-size: 280%; color: black">
            Predictor de clima
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="px-4 py-4 bg-white shadow-lg  h-100" style="border-radius: 10px;">
                <div class="mx-1">

                    <p class="mb-4">Ingresa los datos de tu consulta</p>

                    <!-- Formulario -->
                    <form id="form-data" method="post">
                        <div class="row mb-3">
                            <div class="col">
                                <label class="mb-1">Temperatura(C&#176;)</label>
                                <input id="temp" name="historial[temperatura_h]" class="form-control" type="number"
                                    placeholder="Temperatura">
                            </div>
                            <div class="col">
                                <label class="mb-1">Humedad</label>
                                <input id="hum" name="historial[humedad_h]" class="form-control" type="number"
                                    placeholder="Humedad">
                            </div>
                            <div class="col-auto">
                                <label class="mb-1">Velocidad del viento(km/hr)</label>
                                <input id="veloc" name="historial[velocidadViento_h]" class="form-control" type="number"
                                    placeholder="Velocidad">
                            </div>
                        </div>

                        <!-- Cadena de Errores -->
                        <div id="contenedor-errores">
                        </div>
                        <!-- Cadena de Errores -->

                        <!-- ID del usuario -->
                        <input type="hidden" name="historial[usuario_id_usuario]" value=<?php echo $auth_id ?>>
                        <!-- ID del usuario -->
                        <!-- Nombre de la clase  -->
                        <input type="hidden" id="usuario_id" name="historial[resultado_h]" value="">
                        <!-- Nombre de la clase  -->

                        <div class="d-flex justify-content-end">
                            <button class="btn btn-primary btn-md mt-4" id="btn-predecir"
                                style="text-transform: none; font-size: 90%;">
                                ¡Predecir!
                            </button>
                        </div>
                    </form>
                    <!-- Formulario -->
                </div>
            </div>
        </div>

        <!-- Contenedor Resultado -->
        <div class="col-6 col-md-4">
            <div class="px-4 py-4 bg-white shadow-lg h-100" style="border-radius: 10px;">

                <p class="mb-4">Tu predicción</p>

                <div class="row" style="padding: 40px">
                    <div class="col-8">
                        <p class="lead" id="resultado">Comienza Ingresando Los datos!</p>
                    </div>
                    <div class="col-2"><img id="icono-resultado" class="icono me-2 mb-2" src="/img/nublado.png"
                            alt="icono clima">
                    </div>
                </div>


            </div>
        </div>
        <!-- Contenedor Resultado -->
    </div>

</div>
<!-- Contenedor Formulario -->

<!-- Ultimas Consultas Guardadas -->
<div class="container mb-5">
    <div class="row" style="padding: 20px"></div>

    <div class="row align-items-center justify-content-evenly"
        style="background-color: rgba(255, 255, 255, 0.7); padding: 40px">
        <div class="col-sm">
            <div class="h4">Historial
                <i class="fas fa-caret-right fa-1x"></i>
            </div>
        </div>

        <?php if (empty($historial)) : ?>
        <p>Tus consultas mas recientes apareceran aqui</p>
        <?php endif; ?>
        <div id="contenedor-registros" class="row">
            <!-- Contenedor Registro Historial -->
            <?php foreach ($historial as $registro) : ?>
            <div class="col-sm">
                <div class="pt-3 px-3 mb-3" style="border: 3px solid rgb(120, 120, 120); line-height: 80%;">
                    <p>Temperatura: <span><?php echo $registro->temperatura_h ?>°</span></p>
                    <p>Humedad: <span><?php echo $registro->humedad_h ?></span></p>
                    <p>Vel. del viento: <span><?php echo $registro->velocidadViento_h ?></span></p>
                    <div class="row">
                        <div class="col-8">
                            <p class="h6"><?php echo $registro->resultado_h ?></p>
                        </div>
                        <div class="col-2"><img class="icono me-2 mb-2"
                                src="/img/<?php echo $registro->resultado_h ?>.svg" alt="icono clima">
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            <!-- Contenedor Registro Historial -->
        </div>


    </div>
</div>
<!-- Ultimas Consultas Guardadas -->
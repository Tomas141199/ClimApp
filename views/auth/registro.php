<div class="ms-5">
    <div class="row py-2">
        <!-- probar con py-4 -->
        <div class="col-lg-6">
            <!-- probar añadiendo offset-lg-1-->
            <div class="p-5 bg-white rounded shadow-lg">
                <div class="mx-2">
                    <p class="lead mb-4 fs-4">Registrate para empezar a predecir</p>
                    <form>
                        <label class="mb-1">Nombre(s)</label>
                        <input name="nombre" class="form-control mb-3" type="text" placeholder="Nombre">
                        <div class="row">
                            <div class="col">
                                <label class="mb-1">Apellido Paterno</label>
                                <input name="appM" class="form-control mb-3" type="text" placeholder="Apellido Paterno">
                            </div>
                            <div class="col">
                                <label class="mb-1">Apellido Materno</label>
                                <input name="appP" class="form-control mb-3" type="text" placeholder="Apellido Materno">
                            </div>
                        </div>
                        <label class="mt-4 mb-1">Email</label>
                        <input name="email" class="form-control mb-3" type="text" placeholder="correo@mail.com">
                        <div class="row">
                            <div class="col">
                                <label class="mb-1">Contraseña</label>
                                <input name="password" class="form-control mb-3" type="password"
                                    placeholder="Contraseña">
                            </div>
                            <div class="col">
                                <label class="mb-1">Repetir contraseña</label>
                                <input name="passwordRep" class="form-control mb-3" type="password"
                                    placeholder="Repetir contraseña">
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-primary btn-md mt-4 fw-light"
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
            <div class="alert alert-danger" role="alert">
                Esta es una alerta de error
            </div>
        </div>
    </div>
</div>
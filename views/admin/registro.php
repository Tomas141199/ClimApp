 <div class="row">
     <div class="col-lg-8 mt-4">
         <!-- Se puede añadir: style="margin-bottom: 15%;" -->
         <div class="mb-4" style="font-size: 310%; color: black; text-shadow: rgb(200,200,200) 2px 3px 3px;">
             Captura de registros
         </div>

         <div class="row py-2">
             <div class="col-lg-11">
                 <div class="px-4 py-4 bg-white shadow-lg" style="border-radius: 10px;">
                     <div class="mx-1">

                         <p class="mb-4">Ingresa un registro nuevo a la base de datos</p>

                         <form>
                             <div class="row mb-3">
                                 <div class="col">
                                     <label class="mb-1">Temperatura</label>
                                     <input id="temp" name="temp" class="form-control" type="text"
                                         placeholder="Temperatura">
                                 </div>
                                 <div class="col">
                                     <label class="mb-1">Humedad</label>
                                     <input id="hum" name="hum" class="form-control" type="text" placeholder="Humedad">
                                 </div>
                                 <div class="col">
                                     <label class="mb-1">Velocidad del viento</label>
                                     <input id="veloc" name="veloc" class="form-control" type="text"
                                         placeholder="Velocidad">
                                 </div>
                                 <div class="col">
                                     <label class="mb-1">Clima</label>
                                     <input id="clima" name="clima" class="form-control" type="text"
                                         placeholder="Clima">
                                 </div>
                             </div>
                             <div class="d-flex justify-content-end">
                                 <button class="btn btn-primary btn-md mt-4 fw-light"
                                     style="text-transform: none; font-size: 90%;">
                                     Guardar registro
                                 </button>
                             </div>
                         </form>

                     </div>
                 </div>
             </div>
         </div>
     </div>

     <div class="col-lg-4 px-5 pt-5 pb-4" style="background-color: rgba(255, 255, 255, 0.7);">
         <div class="mt-3 mb-3 fs-4 text-break" style="line-height: 20%;">
             Últimos registros guardados
             <br><i class="fas fa-caret-down fa-2x"></i>
         </div>

         <!-- EN ESTE DIV IRÁN LAS TEMPERATURAS -->
         <div>
             <div class="pt-3 px-3 mb-3" style="border: 3px solid rgb(120, 120, 120); line-height: 80%;">
                 <p>Temperatura: <span>56°</span></p>
                 <p>Temperatura: <span>56°</span></p>
                 <p>Temperatura: <span>56°</span></p>
                 <p class="pt-2 text-end">Parcialmente nublado</p>
             </div>
             <div class="pt-3 px-3 mb-3" style="border: 3px solid rgb(120, 120, 120); line-height: 80%;">
                 <p>Temperatura: <span>56°</span></p>
                 <p>Temperatura: <span>56°</span></p>
                 <p>Temperatura: <span>56°</span></p>
                 <p class="pt-2 text-end">Parcialmente nublado</p>
             </div>
         </div>
     </div>
 </div>
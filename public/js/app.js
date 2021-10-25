const net = new brain.recurrent.LSTM();

document.addEventListener("DOMContentLoaded", function () {
  addEventos();
});

//Agrega los evento necesarios para que el usuario pueda interactuar con los elementos necesarios
function addEventos() {
  const btnPredecir = document.querySelector("#btn-predecir");
  cargarModelo();
  btnPredecir.addEventListener("click", obtenerPrediccion);
}

//Funcion que carga el modelo
function cargarModelo() {
  const json = JSON.parse(fn);
  net.fromJSON(json);
}

//Evento General que valida y genera la prediccion
async function obtenerPrediccion(e) {
  e.preventDefault();
  if (validarEntradas()) {
    let temperatura = $("#temp").val();
    let humedad = $("#hum").val();
    let velocidad = $("#veloc").val();

    //Se genera la prediccion de acuerdo a los parametros recibidos
    let output = net.run([temperatura, humedad, velocidad]);

    let etiqueta = getClassName(output);

    mostrarResultado(etiqueta);
    $("#usuario_id").val(etiqueta);
    // AJAX INICIO
    $.ajax({
      type: "POST",
      url: "../api/crear.php",
      data: $("#form-data").serialize(),
      success: function (response) {
        //Respuesta de finalizado
        //Actualizar Historial
        actualizarHistorial();
      },
    });
    // AJAX FIN
  }
}

function mostrarResultado(etiqueta) {
  const resultado = document.querySelector("#resultado");
  resultado.innerHTML = etiqueta;
}

//Funcion que actualiza el historial sin recargar la pagina mediante ajax
function actualizarHistorial() {
  let jsonData;
  //  AJAX INICIO
  $.ajax({
    type: "POST",
    url: "../api/registros.php",
    data: $("#form-data").serialize(),
    success: function (response) {
      //Respuesta de finalizado
      jsonData = JSON.parse(response);
      console.log(jsonData);
      let registros = jsonData.map(
        (registro) => `
       <div class="col-sm">
                <div class="pt-3 px-3 mb-3" style="border: 3px solid rgb(120, 120, 120); line-height: 80%;">
                    <p>Temperatura: <span>${registro.temperatura_h}°</span></p>
                    <p>Humedad: <span>${registro.humedad_h}</span></p>
                    <p>Vel. del viento: <span>${registro.velocidadViento_h}</span></p>
                    <div class="row">
                        <div class="col-8">
                            <p class="h6">${registro.resultado_h}</p>
                        </div>
                        <div class="col-2"><i class="fas fa-cloud-showers-heavy"></i></div>
                    </div>
                </div>
            </div>
      `
      );
      addRegistros(registros);
    },
  });
  //AJAX FIN
}

function addRegistros(registros) {
  const contenedorRegistros = document.querySelector("#contenedor-registros");
  contenedorRegistros.innerHTML = registros.join("");
  limpiarCampos();
}

//Funcion que valida las entradas del usuario dentro del formulario
function validarEntradas() {
  const temperatura = document.querySelector("#temp").value;
  const humedad = document.querySelector("#hum").value;
  const velocidad = document.querySelector("#veloc").value;
  let errores = [];
  if (temperatura === "") {
    errores = [...errores, "El Campo temperatura es obligatorio"];
  }
  if (humedad === "") {
    errores = [...errores, "El Campo humedad es obligatorio"];
  }
  if (velocidad === "") {
    errores = [...errores, "El Campo velocidad de viento es obligatorio"];
  }
  //Si es que no hay nada en errores muestra los erroes en el contenedor de la vista
  if (errores.length != 0) {
    mostrarErrores(errores);
    return false;
  }
  //Si no hay errores llama al metodo mostrar para limpiar aquellos erroes que hayan permanecido durante la validacion
  mostrarErrores(errores);
  return true;
}

function mostrarErrores(errores) {
  const contenedorErrores = document.querySelector("#contenedor-errores");
  let error;
  //Formatea el contendio del error dentro de una card de error y las carga en el div de errores en la vista
  error = errores.map(
    (err) => `<div class="alert alert-danger" role="alert">&#215; ${err}</div>`
  );
  contenedorErrores.innerHTML = error.join("");
}

function getClassName(clase) {
  let etiqueta = "";
  switch (clase) {
    case "1":
      etiqueta = "Ventoso";
      break;
    case "2":
      etiqueta = "Despejado";
      break;
    case "3":
      etiqueta = "Nublado";
      break;
    case "4":
      etiqueta = "Neblinoso";
      break;
    case "5":
      etiqueta = "Lluvia ligera";
      break;
    case "6":
      etiqueta = "Soleado";
      break;
    default:
      etiqueta = "Error";
      break;
  }
  return etiqueta;
}

function limpiarCampos() {
  $("#temp").val("");
  $("#hum").val("");
  $("#veloc").val("");
}

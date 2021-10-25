<?php

namespace API;

require_once '../../includes/app.php';

use Model\Historial;



$registroHistorial = new Historial($_POST['historial']);

$registroHistorial->guardar();

debuguear($registroHistorial);
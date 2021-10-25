<?php

namespace API;

require_once '../../includes/app.php';

use Model\Historial;


$id = $_POST['historial'] ?? 0;
$registros = Historial::getById(3, $id['usuario_id_usuario']);

echo json_encode($registros);
<?php

require_once "comunes.php";
require_once "db.class.php";
require_once "estructura.php";

function despachable_editar_entidad($parametros){
    global $modelo;
    $entidad_def=$modelo['entidades'][$parametros['entidad_id']];
    $pk=$parametros['pk'];
    $entidad_datos=leer_datos_entidad($entidad_def,$pk);
    armaFormulario($entidad_def,$entidad_datos);
}

?>
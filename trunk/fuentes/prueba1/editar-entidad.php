<?php

require_once "comunes.php";
require_once "db.class.php";
require_once "estructura.php";

function despachable_editar_entidad($parametros){
    global $modelo;
    $entidad_def=$modelo['entidades'][$parametros['entidad_id']];
    $pk=$parametros['pk'];
    armaFormulario(array(
        'entidad_def'=>$entidad_def, 
        'datos'=>leer_datos_entidad($entidad_def,$pk),
        'boton_accion'=>array(
            'hacer'=>'grabar_registro',
            'id'=>'grabar',
            'leyenda'=>'Grabar'
        )
    ));
}

?>
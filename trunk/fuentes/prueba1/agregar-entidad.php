<?php

require_once "comunes.php";
require_once "db.class.php";
require_once "estructura.php";

function despachable_agregar_entidad($parametros){
    global $modelo;
    armaFormulario(array(
        'entidad_def'=>$modelo['entidades'][$parametros['entidad_id']],
        'boton_accion'=>array('hacer'=>'grabar_entidad', 'id'=>'agregar', 'leyenda'=>'Agregar')
    ));
}

function despachable_grabar_entidad($parametros){
    global $modelo;
    $entidad_id=$parametros['entidad_id'];
    $estructura=$modelo['entidades'][$entidad_id];
    $db = abrir_conexion();
    foreach ($estructura['campos'] as $campo_id=>$dummy){
        $datos_a_insertar[$campo_id]=$_POST[$campo_id];            
    }        
    $sql_datos=array();
    $sql_columnas=array(); // lado izquierdo del insert
    $sql_placeholder=array(); // lado derecho del insert
    foreach ($datos_a_insertar as $columna=>$valor) {
        $placeholder=":$columna";
        $sql_columnas[]=$columna;
        $sql_placeholder[]=$placeholder;
        $sql_datos[$placeholder]=$valor;
    }
    $sql_insertar='insert into prin.'.$estructura['nombre_tabla'].
        ' ('.implode(',',$sql_columnas).') '.
        'values ('.implode(',',$sql_placeholder).');';
    echo "por ejecutar \n".$sql_insertar;
    $sentencia=$db->prepare($sql_insertar);
    $sentencia->execute($sql_datos);
    echo "\n<B>Listo";
}

?>
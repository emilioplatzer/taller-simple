<?php

require_once "comunes.php";
require_once "estructura.php";
require_once "db.class.php";

echo "entidades ".var_export($modelo['entidades'],true);
echo "\n\n\n\n";

foreach($modelo['entidades'] as $entidad_id=>$entidad_def){
    $sql_campos=array();
    foreach($entidad_def['campos'] as $campo_id=>$campo_def){
        $sql_campos[]="  $campo_id text";
    }

    $sql="CREATE TABLE prin.".$entidad_def['nombre_tabla']." (\n".implode(",\n",$sql_campos)."\n);\n";

    echo "por ejecutar:\n".$sql;

    $db=abrir_conexion();
    $db->exec($sql);
}

?>
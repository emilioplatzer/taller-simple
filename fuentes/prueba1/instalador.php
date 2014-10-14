<?php

require_once "estructura.php";
require_once "db.class.php";

$sql_campos=array();
foreach($estructura_personal as $campo_id=>$campo_def){
    $sql_campos[]="  $campo_id text";
}

$sql="CREATE TABLE prin.personal (\n".implode(",\n",$sql_campos)."\n);\n";

echo "por ejecutar:\n".$sql;

$db=abrir_conexion();
$db->exec($sql);

?>
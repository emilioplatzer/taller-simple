<?php

function abrir_conexion(){
    $dns = 'pgsql:dbname=taller_db;host=localhost';
    $pdo=new PDO($dns, 'taller_user', 'taller9431');
    $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    return $pdo;
}                
?>        

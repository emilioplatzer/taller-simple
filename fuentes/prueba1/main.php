<?php
// DB.class.php
//require_once("db.class.php");
    require_once("personal.php");
    
    require_once("estructura.php");
    armaFormulario('Personal de campo', $estructura_personal);
    $dsn = 'pgsql:dbname=rrpp_db;host=localhost';
    $usuario = 'tedede_php';
    $pass = '44php55';
    $host='localhost';
    $bd='rrpp_db';
    $conn = conectarPostgreSQL( $usuario, $pass, $host, $bd );     
    $sql = "SELECT * FROM prin.personal;";     
    foreach ($estructura_personal as $campo=>$valor){
            $datos_a_insertar[$campo]=$_POST[$campo];            
    }    
    $sql_valores='';
    $sql_columnas='';
    foreach ( $datos_a_insertar as $columna=>$valor) {
        $sql_columnas=$sql_columnas.$columna.',';
        $sql_valores=$sql_valores."'$valor',";
    }
    $sql_insertar='insert into prin.personal ('.sacarComaFinal($sql_columnas).') values ('.sacarComaFinal($sql_valores).');';
    if ($_POST["per_documento"]){
        print insertarRegistro($conn, $sql_insertar);
    }    
    function conectarPostgreSQL( $usuario, $pass, $host, $bd ){
        $conexion = pg_connect( "user=".$usuario." ".
                                 "password=".$pass." ".
                                 "host=".$host." ".
                                 "dbname=".$bd
                               ) or die( "Error al conectar: ".pg_last_error() );
        return $conexion;
    }
    function sacarComaFinal($registro){
        $registro=substr($registro, 0,-1);
        return $registro;            
    }
    function insertarRegistro($conn, $sql_insertar){
        if (pg_query($conn,$sql_insertar)){
            return 'Insercion finalizada';
        } else {
            return 'Insercion con Error';
        }
    }
?>
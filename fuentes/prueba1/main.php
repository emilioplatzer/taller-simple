<?php
// DB.class.php
//require_once("db.class.php");
    require_once("personal.html");
    $dsn = 'pgsql:dbname=rrpp_db;host=localhost';
    $usuario = 'tedede_php';
    $pass = '44php55';
    $host='localhost';
    $bd='rrpp_db';
    $conn = conectarPostgreSQL( $usuario, $pass, $host, $bd );     
    $sql = "SELECT * FROM prin.personal;"; 
    //$resultado=pg_fetch_array(pg_query($conn,$sql), NULL, PGSQL_ASSOC);
    $datos_a_insertar=array('per_documento'=>$_POST["documento"],
                            'per_cuil'=>'20227235555',
                            'per_nombre'=>$_POST["nombre"],
                            'per_apellido'=>$_POST["apellido"],
                            'per_telefono'=>'151515151',
                            'per_mail'=>'juanperez@gmail.com',
                            'per_direccion'=>'Don Bosco 3360');
    
    $sql_valores='';
    $sql_columnas='';
    foreach ( $datos_a_insertar as $columna=>$valor) {
        $sql_columnas=$sql_columnas.$columna.',';
        $sql_valores=$sql_valores."'$valor',";
    }
    $sql_insertar='insert into prin.personal ('.sacarComaFinal($sql_columnas).') values ('.sacarComaFinal($sql_valores).');';
    
    //print 'sql_insertar: '.$sql_insertar;       
    //print 'documento_de_post:_'.$_POST["documento"].'_';
    if ($_POST["documento"]){
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
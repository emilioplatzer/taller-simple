<?php
// DB.class.php
//require_once("db.class.php");
    $dsn = 'pgsql:dbname=rrpp_db;host=localhost';
    $usuario = 'tedede_php';
    $pass = '44php55';
    $host='localhost';
    $bd='rrpp_db';
//new PDO('pgsql:user=exampleuser dbname=exampledb password=examplepass');
    $conn = conectarPostgreSQL( $usuario, $pass, $host, $bd );     
    $sql = "SELECT * FROM prin.personal;"; 
    $resultado=pg_fetch_array(pg_query($conn,$sql), NULL, PGSQL_ASSOC);
 //pg_query($conn, "SELECT author, email FROM authors");  
    $datos_a_insertar=array('per_documento'=>'22723555',
                            'per_cuil'=>'20227235555',
                            'per_nombre'=>'Juan',
                            'per_apellido'=>'Perez',
                            'per_telefono'=>'151515151',
                            'per_mail'=>'juanperez@gmail.com',
                            'per_direccion'=>'Don Bosco 3360');
    $sql_insertar='insert into prin.personal (';
    foreach ( $datos_a_insertar as $columna=>$valor) {
        $sql_insertar=$sql_insertar.$columna.',';
    }
    $sql_insertar=sacarComaFinal($sql_insertar);
    $sql_insertar=$sql_insertar.') values (';
    foreach ( $datos_a_insertar as $columna=>$valor) {
        $sql_insertar=$sql_insertar."'$valor',";
    }
    $sql_insertar=sacarComaFinal($sql_insertar);
    $sql_insertar=$sql_insertar.');';    
    
    //print 'sql_insertar: '.$sql_insertar;       
    print insertarRegistro($conn, $sql_insertar);
    
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
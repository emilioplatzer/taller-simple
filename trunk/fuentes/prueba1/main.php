<?php
// DB.class.php
//require_once("db.class.php");
   $dsn = 'pgsql:dbname=rrpp_db;host=localhost';
   $usuario = 'tedede_php';
   $pass = '44php55';
   $host='localhost';
   $bd='rrpp_db';
//new PDO('pgsql:user=exampleuser dbname=exampledb password=examplepass');
   $conn = conectar_PostgreSQL( $usuario, $pass, $host, $bd );     
   $sql = "SELECT * FROM prin.personal;"; 
   $resultado=pg_fetch_array(pg_query($conn,$sql), NULL, PGSQL_ASSOC);
 //pg_query($conn, "SELECT author, email FROM authors");  
   foreach ( $resultado as $columna=>$valor) {
       print $columna.' '.$valor."\r\n";       
   }
   function conectar_PostgreSQL( $usuario, $pass, $host, $bd )
    {
        $conexion = pg_connect( "user=".$usuario." ".
                                 "password=".$pass." ".
                                 "host=".$host." ".
                                 "dbname=".$bd
                               ) or die( "Error al conectar: ".pg_last_error() );
        return $conexion;
    }
 
?>
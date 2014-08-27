<?php
	
	//la forma mySQL de hacerlo...
	echo '<h1>Sin PDO</h1>';
	$cnx = mysqli_connect('localhost', 'root', '', 'pregunta2');
	$res = mysqli_query($cnx, 'SELECT * FROM opcion');
	while( $o = mysqli_fetch_object( $res ) ){
		var_dump( $o );
	}

	//pdo.test.php
	echo '<h1>Con PDO</h1>';
	$dns = 'mysql:dbname=pregunta2;host=localhost';
	$db = new PDO($dns, 'root', '');
	$db->setAttribute( PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ );
	// ->query me devuelve siempre un PDOStatement
	$res = $db->query('SELECT * FROM opcion');
	foreach( $res as $o ){
		var_dump( $o );
	}
?>
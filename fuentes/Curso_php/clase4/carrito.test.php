<?php
	//main.php
	function __autoload( $nombre ){
		//da lo mismo que sea require_once, porque el __autoload se ejecuta una vez por clase
		//echo "<!-- cargando $nombre -->\r\n";
		require("lib/$nombre.class.php");
	}
	CarritoControl::control();
	
	echo '<pre>';
	var_dump( Carrito::getInstance() );
	echo '</pre>';
?>
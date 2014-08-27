<?php
	//main.php
	function __autoload( $nombre ){
		//da lo mismo que sea require_once, porque el __autoload se ejecuta una vez por clase
		//echo "<!-- cargando $nombre -->\r\n";
		require("lib/$nombre.class.php");
	}
	$opt1 = DB::getOpcion(1);	
	$opt2 = DB::getOpcion(1);
	echo '<pre>';
	var_dump($opt1, $opt2);
	echo '</pre>';
?>
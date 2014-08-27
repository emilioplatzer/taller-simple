<?php
	//main.php
	function __autoload( $nombre ){
		//da lo mismo que sea require_once, porque el __autoload se ejecuta una vez por clase
		//echo "<!-- cargando $nombre -->\r\n";
		require("lib/$nombre.class.php");
	}
	try{
		throw new Exception('probando');
		$todas = DB::getOpciones();
		var_dump($todas);	
	} catch ( PDOException $error ){
		echo '<p>Error de DB! '.$error->getMessage().'</p>';
	} catch ( Exception $error ){
		echo '<p>Otro tipo de error '.$error->getMessage().'</p>';
	}
	
	require_once('templates/body.template.html');
?>
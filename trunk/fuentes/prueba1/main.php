<?php
// DB.class.php
	require_once("db.class.php");
    /*
	try{
		throw new Exception('probando');
		$todas = DB::getOpciones();
		var_dump($todas);	
	} catch ( PDOException $error ){
		echo '<p>Error de DB! '.$error->getMessage().'</p>';
	} catch ( Exception $error ){
		echo '<p>Otro tipo de error '.$error->getMessage().'</p>';
	}
    */
    
    $conn=new DB();
   // function getFruit($conn) {
    $sql = "SELECT * FROM prin.personal;";
    foreach ($conn->query($sql) as $row) {
        print $row['name'] . "\t";
        print $row['color'] . "\t";
        print $row['calories'] . "\n";
    }
   
    
	//$res = self::getInstance()->query($sql, PDO::FETCH_CLASS, 'Producto');
//			return $res->fetchAll(); //devuelve un array
//    }

?>
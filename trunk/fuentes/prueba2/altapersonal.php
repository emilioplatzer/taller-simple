<?php
	require_once('altapersonal.template.php');
    echo "-----Para ver el contenido de las variables-----";
    echo "\n\r";
    var_dump( $_POST );
	$vengoForm = isset( $_POST['alta-personalsubmit'] ); /*es el name del submit, para identificar a mi formulario*/
	if( $vengoForm ){
     echo "Vengo del form"."\n\r";
    }
    echo "-----------------------------------------------"."\n\r";
?>
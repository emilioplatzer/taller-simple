<?php
	//require_once('Opcion.class.php');

	class OpcionView {

		public static function getHTML( Opcion $o ){
			//la vista puede decidir transformar el dato
			$texto = strtoupper( $o->getTexto() );
			$html = "<li>$texto</li>";
			return $html;
		}

	}
?>
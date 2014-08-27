<?php
	
	class CarritoControl {

		public static function control(){
			if( !isset($_GET['action']) ) return;
			switch( $_GET['action'] ){
				case 'add':
				$i = DB::getProducto( $_GET['id'] );
				Carrito::getInstance()->addItem( $i );
				break;

				case 'remove':
				Carrito::getInstance()->removeItem( $_GET['id'] );
				break;
			}

		}

	}

?>
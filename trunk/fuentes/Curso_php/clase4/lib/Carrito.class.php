<?php
	
	class Carrito {

		public static function getInstance(){
			//self es una palabra reservada que apunta a la clase que soy
			if(session_id() == '') {
			    session_start();
			}
			if( !isset($_SESSION['carrito']) ) $_SESSION['carrito'] = new self();
			return $_SESSION['carrito'];
		}

		private $items;

		private function Carrito(){
			$this->items = array();
		}
		function addItem( CarritoItem $i){
			if( isset($this->items[ $i->getId() ]) ){
				//uso al item que tengo adentro
				$this->items[ $i->getId() ]->add();
				return;
			}
			//la única vez que lo cargo es cuando no lo tengo adentro, para eso comparo por IDs
			$this->items[ $i->getId() ] = $i;
		}
		function removeItem( $id ){
			if( isset( $this->items[$id] ) ){
				$item = $this->items[$id];
				//para entender esto ver el chaining dentro de remove() que retorna $this
				if( $item->remove()->getCantidad() == 0 ){
					unset( $this->items[$id] );	
				}
			}
		}
		function getItems(){
			return $this->items;
		}

	}

?>
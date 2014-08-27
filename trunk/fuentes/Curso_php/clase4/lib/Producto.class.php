<?php
	
	class Producto implements CarritoItem {

		//mapeo la base
		private $idproducto;		
		private $precio;
		private $nombre;

		//mis variables de negocio
		private $cantidad;

		public function Producto(){
			$this->cantidad = 1;
		}
		
		public function getId(){
			return $this->idproducto;
		}
		public function getNombre(){
			return $this->nombre;
		}
		public function add(){
			$this->cantidad++;
			return $this;
		}
		public function remove(){
			$this->cantidad--;
			return $this;
		}
		public function getCantidad(){
			return $this->cantidad;
		}
		public function getPrecio(){
			return $this->precio;
		}
		public function getPrecioTotal(){
			return $this->precio * $this->cantidad;
		}

		// __sleep se ejecuta ANTES de guardarse en sesión o serializar un objeto
		function __sleep(){
			//retorno un array que enumera las propiedades que me interesan mantener en sesión o en el String si lo serializo a mano
			return array('idproducto', 'cantidad');
		}
		// __wakeup se ejecuta cuando el objeto se reconstruye de la sesión, se deserializa (cuando pasa de ser un String a un objeto de nuevo)
		function __wakeup(){
			$p = DB::getProducto( $this->idproducto );
			$this->nombre = $p->getNombre();
			$this->precio = $p->getPrecio();
		}

	}

?>
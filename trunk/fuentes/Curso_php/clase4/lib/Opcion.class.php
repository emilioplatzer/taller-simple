<?php
	//Opcion.class.php
	class Opcion {
		private $idopcion;
		private $texto;
		private $valor;

		public function Opcion(){
			
		}

		public function getValor(){
			return $this->valor > 0;
		}

		public function getTexto(){
			return $this->texto;
		}

	}
?>
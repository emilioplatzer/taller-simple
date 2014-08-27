<?php
	
	interface CarritoItem {
		
		public function getId();
		public function add();
		public function remove();
		public function getCantidad();
		//si está definido me obligaría a implentar
		//public function test();

	}

?>
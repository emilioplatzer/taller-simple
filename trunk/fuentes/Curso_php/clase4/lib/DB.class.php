<?php
	// DB.class.php

	//sino uso autocarga, es una buena práctica requerir los tipos que mi clase "conoce"
	//require_once('Opcion.class.php');

	class DB extends PDO {

		//acá voy a guardar la única instancia
		private static $instance;

		//esta función se fija si tiene que crear la unica instancia o devolverme la que ya está activa
		public static function getInstance(){
			//self es una palabra reservada que apunta a la clase que soy
			if( !self::$instance ) self::$instance = new self();
			return self::$instance;
		}

		public static function getProductos(){
			$sql = "SELECT * FROM producto";
			$res = self::getInstance()->query($sql, PDO::FETCH_CLASS, 'Producto');
			return $res->fetchAll(); //devuelve un array
		}

		public static function getProducto($id){
			$id = (int) $id;
			$sql = "SELECT * FROM producto WHERE idproducto = $id";
			$res = self::getInstance()->query($sql, PDO::FETCH_CLASS, 'Producto');
			return $res->fetch(); //devuelve un sólo registro
		}

		public static function getOpciones(){
			//dame todas las opciones!
			$sql = "SELECT * FROM opciones";
			$res = self::getInstance()->query($sql, PDO::FETCH_CLASS, 'Opcion');
			return $res->fetchAll(); //devuelve un array
		}
		public static function getOpcion($id){
			$sql = "SELECT * FROM opcion WHERE idopcion = $id";
			$res = self::getInstance()->query($sql, PDO::FETCH_CLASS, 'Opcion');
			//cuando se que el SELECT devuelve sólo un registro, puedo usar fetch()
			// ->fetch() es "dame el primero"
			return $res->fetch();
		}

		//al hacer privado el constructor, impido que alguien haga new() pero sigue habiendo una instancia del objeto posiblemente
		//es distinto a decir abstract class...
		private function DB(){
			$dns = 'mysql:dbname=pregunta2;host=localhost';
			//está es la forma de decir "reutilizo el constructor de mi padre", en este caso PDO
			parent::__construct($dns, 'root', '');
			$this->setAttribute( PDO::ATTR_DEFAULT_FETCH_MODE, 
				PDO::FETCH_OBJ );
			$this->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			//fuerzo la comunicación a utf8
			$this->query( 'SET NAMES utf8');
		}
	}
?>
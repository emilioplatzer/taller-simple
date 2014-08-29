<?php

date_default_timezone_set('America/Buenos_Aires');

function seguro($algo){
	if(!preg_match('/^[A-Za-z@.0-9 _]*$/',$algo)){
		throw new Exception("caracteres invalidos");
	}
	return $algo;
}

?>
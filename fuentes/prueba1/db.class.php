<?php
// DB.class.php

class DB extends PDO {
        public function DB(){
                    $dns = 'postgres:dbname=rrpp_db;host=localhost';
                    parent::__construct($dns, 'tedede_php', '44php55');
                    $this->setAttribute( PDO::ATTR_DEFAULT_FETCH_MODE, 
                        PDO::FETCH_OBJ );
                    $this->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
                    //$this->query( 'SET NAMES utf8');
                }
}                
?>        

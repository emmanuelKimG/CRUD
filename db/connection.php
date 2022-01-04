<?php

    class connection{
        private static $db ;
 
        public static function conexion(){
            if(empty(self::$db)){
                self::$db = new PDO("mysql:host=localhost;dbname=paisesdb;charset=utf8","root","");
            }
            return self::$db;
        }
    }


// singleton

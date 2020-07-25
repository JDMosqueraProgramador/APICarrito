<?php

    define("HOST", "localhost");
    define("USER", "root");
    define("PASS", "");
    define("DB", "carrito");

    abstract class Conexion{
        private static $host = HOST;
        private static $user = USER;
        private static $pass = PASS;
        private static $db = DB;

        protected function conn(){
            try{

                $txt = "mysql:host=" . self::$host . ";dbname=" . self::$db;
                $query = new PDO($txt, self::$user, self::$pass);
                $query->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $query->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
                $query->exec("set names utf8");
                return $query;
            }catch(PDOException $e){
                exit("ERROR ". $e->getMessage());
            }
        }

    }

    

?>
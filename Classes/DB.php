<?php
abstract class DB {
        private static $conn;
        private static function getConfig(){
            //Config file ophalen
            return parse_ini_file(__DIR__ . "/../config/config.ini");
        }
        

        public static function getInstance() {
            if(self::$conn != null) {
                //Connectie hergebruiken
                return self::$conn;
            }
            else {
                //data uit de configfile een eigen variabele geven
                $config = self::getConfig();
                $database = $config['database'];
                $user = $config['user'];
                $password = $config['password'];
                $port = $config['port'];
                $server = $config['server'];

                self::$conn = new PDO('mysql:host='.$server.':'.$port.';dbname='.$database.';charset=utf8mb4', $user, $password);
                return self::$conn;
            }
        }
    }
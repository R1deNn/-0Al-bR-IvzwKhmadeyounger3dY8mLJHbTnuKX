<?php

    // $user = 'root';
    // $passbd = '';
    // $dbname = 'made_young';
    // $host = 'localhost';

    // $pdo = new PDO('mysql:host='.$host.';dbname='.$dbname, $user, $passbd);

    // $pdo->query("set names utf8"); 

    class Connection{
        private static $conn;

        public function connect(){
            $params = parse_ini_file('db.ini');

            $con_str = sprintf('mysql:host=%s;dbname=%s;user=%s;password=%s',
                $params['host'],
                $params['database'],
                $params['user'],
                $params['password']
            );

            $pdo = new PDO($con_str);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $pdo;
        }

        // Возврат экземпляра объекта Connection
        public static function get(){
            if(static::$conn === null){
                static::$conn = new static;
            }
            return static::$conn;
        }

        protected function __construct(){}
    }

    $pdo = Connection::get()->connect();
    $pdo->query("set names utf8");
?>
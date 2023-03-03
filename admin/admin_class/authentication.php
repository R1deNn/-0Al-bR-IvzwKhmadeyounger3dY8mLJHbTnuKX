<?php
require '../vendor/connect.php';
class Authentication {
    private $pdo;

    public function __construct($pdo){
        $this->pdo = $pdo;
    }
}
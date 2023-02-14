<?php

    $user = 'root';
    $passbd = '';
    $dbname = 'made_young';
    $host = 'localhost';

    $pdo = new PDO('mysql:host='.$host.';dbname='.$dbname, $user, $passbd);

    $pdo->query("set names utf8"); 

?>
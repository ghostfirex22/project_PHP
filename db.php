<?php

    $host = 'localhost';
    $port = 3306 ;
    $dbname = 'products';
    $user = 'root' ;
    $password = '';

    $dsn = "mysql:host={$host};port={$port};dbname={$dbname};charset=utf8";

    try {

        $pdo = new PDO($dsn, $user, $password);
        // echo 'Connection successful';
    
    } catch (PDOException $e){
        echo 'Connection Failed: ' . $e->getMessage();
    }

?>
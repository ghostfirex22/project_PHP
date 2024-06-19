<?php
    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        require "db.php";

        $name = $_POST['name'];
        $type = $_POST['type'];
        $prix = $_POST['prix'];


        $sql = "INSERT INTO gaming_products (name, type, prix) VALUES (:name, :type, :prix)";
        $statement = $pdo->prepare($sql);
        
        $statement->execute([
            ':name' =>$name ,
            ':type' =>$type,
            ':prix' =>$prix
        ]);
        }

        header('Location: index.php')
    ?>
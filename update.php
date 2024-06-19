<?php
    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        require "db.php";

        $id_G = $_POST['id_G'];
        $name = $_POST['name'];
        $type = $_POST['type'];
        $prix = $_POST['prix'];

        $statement = $pdo->prepare('UPDATE gaming_products SET name=:name, type=:type, prix = :prix WHERE id_G = :id_G');
        
        $statement->execute([
            ':id_G' => $id_G,
            ':name' =>$name ,
            ':type' =>$type,
            ':prix' =>$prix
        ]);

        header('Location: index.php');
        exit;

        }

?>
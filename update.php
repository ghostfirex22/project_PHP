<?php
    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_FILES['image'])){
        require "db.php";

        $id_G = $_POST['id_G'];
        $name = $_POST['name'];
        $type = $_POST['type'];
        $prix = $_POST['prix'];

        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);

        move_uploaded_file($_FILES["image"]["tmp_name"],$target_file);

        $statement = $pdo->prepare('UPDATE gaming_products SET name=:name, type=:type, prix = :prix, image=:image WHERE id_G = :id_G');
        
        $statement->execute([
            ':id_G' => $id_G,
            ':name' =>$name ,
            ':type' =>$type,
            ':prix' =>$prix,
            ':image' =>$target_file
        ]);

        header('Location: index.php');
        exit;

    }
    
?>
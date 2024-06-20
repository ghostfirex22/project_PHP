<?php
    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_FILES['image'])){
        require "db.php";

        $name = $_POST['name'];
        $type = $_POST['type'];
        $prix = $_POST['prix'];

        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);

        move_uploaded_file($_FILES["image"]["tmp_name"],$target_file);


        $sql = "INSERT INTO gaming_products (name, type, prix, image) VALUES (:name, :type, :prix, :image)";
        $statement = $pdo->prepare($sql);
        
        $statement->execute([
            ':name' =>$name ,
            ':type' =>$type,
            ':prix' =>$prix,
            ':image' =>$target_file
        ]);
        }

        header('Location: index.php')
    ?>
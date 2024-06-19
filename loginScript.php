<?php

    require 'db.php';

    session_start();

    if($_SERVER['REQUEST_METHOD'] === 'POST' and !empty($_POST['email']) and !empty($_POST['password'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        $statement = $pdo->prepare("SELECT * FROM users WHERE email = :email and password = :password");
        $statement->execute([
            ':email' => $email,
            ':password' => $password
        ]);

        $LOGIN = $statement->fetch(PDO::FETCH_ASSOC);

        if (isset($LOGIN['email']) == $_POST['email'] and isset($LOGIN['password']) == $_POST['password']){
            $_SESSION['login'] = $LOGIN;

            header('Location: index.php');
        }
        else {
            header('Location: login.php');
            $a = "incorrect";
        }
    }
    else{
        header('Location: login.php');
        $a = "empty";
    }
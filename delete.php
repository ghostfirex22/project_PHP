<?php
require "db.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id_G = $_POST['id_G'];
    $statement = $pdo->prepare('DELETE FROM gaming_products WHERE id_G = :id_G');
    $statement->execute([
        ':id_G' => $id_G
    ]);
}

header('Location: index.php');
exit;
?>
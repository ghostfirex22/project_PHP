<?php

require 'db.php';

$id_G = $_POST['id_G'];

$statement = $pdo->prepare('SELECT * FROM gaming_products WHERE id_G = :id_G');
$statement->execute([
    ':id_G' => $id_G
]);

$product = $statement->fetch(PDO::FETCH_ASSOC);

?>
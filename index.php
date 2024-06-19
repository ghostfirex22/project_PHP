<?php 
    session_start();
    if (!isset($_SESSION['login'])){
        header('Location: login.php');
        exit;
    } 
?>

<?php

require 'db.php';

$sql = 'SELECT * FROM gaming_products';

$statement = $pdo->prepare($sql);

$statement->execute();

$products = $statement->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.tailwindcss.com">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Liste des Stagiaires</title>
</head>
<body class="bg-gray-100">
    <h1 class="w-full bg-blue-600 text-white font-bold text-5xl text-center py-4">Welcome to our shop</h1>

    <div class="container mx-auto mt-8">
        <table class="table-auto border-collapse w-full text-center">
            <thead>
                <?php
                    if ($_SESSION['login']['role'] == 'admin') {
                        echo 
                        '<tr class="bg-blue-700 text-white text-3xl">
                            <th colspan="6" class="py-4"><a href="InsererStagiaire.php" class="text-white">Ajouter</a></th>
                        </tr>' 
                        ;
                    }
                ?>
                <tr class="bg-blue-600 text-white">
                    <th class="border border-blue-500 p-4">id</th>
                    <th class="border border-blue-500 p-4">Name</th>
                    <th class="border border-blue-500 p-4">Type</th>
                    <th class="border border-blue-500 p-4">Prix</th>
                    <th class="border border-blue-500 p-4">image</th>
                <?php
                    if ($_SESSION['login']['role'] == 'admin') {
                        echo     
                    '<th class="border border-blue-500 p-4">Modifier</th>
                    <th class="border border-blue-500 p-4">Supprimer</th>' ;
                    }
                ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product) : ?>
                <tr class="bg-white text-gray-900">
                    <td class="border border-blue-500 p-4"><?php echo $product['id_G']; ?></td>
                    <td class="border border-blue-500 p-4"><?php echo $product['name']; ?></td>
                    <td class="border border-blue-500 p-4"><?php echo $product['type']; ?></td>
                    <td class="border border-blue-500 p-4"><?php echo $product['prix']; ?></td>
                    <td class="border border-blue-500 p-4"><image src="<?php echo $product['image']; ?>" alt="there is no image for this product"></td>
                    <img src="uploads\FIREX22.PNG" alt="khmoja">
                    <?php
                        if ($_SESSION['login']['role'] == 'admin') {
                            echo '
                            <td class="border border-blue-500 p-4">
                                <form action="modifier.php" method="post">
                                    <input type="hidden" name="id_G" value="' . $product['id_G'] . '">
                                    <button type="submit" name="modify" class="bg-green-500 text-white px-4 py-2 rounded">Modifier</button>
                                </form>
                            </td>
                            <td class="border border-blue-500 p-4">
                                <form action="delete.php" method="post">
                                    <input type="hidden" name="id_G" value="' . $product['id_G'] . '">
                                    <button type="submit" name="delete" id="delete" class="bg-red-500 text-white px-4 py-2 rounded" onclick="return confirmDelete()">Delete</button>
                                </form>
                            </td>';
                        }
                        ?>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="flex justify-center mt-8">
        <form action="logout.php">
            <button class="bg-red-500 text-white text-2xl px-8 py-4 rounded">LOG OUT</button>
        </form>
    </div>
    <script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete this item?");
        }
    </script>
</body>
</html>

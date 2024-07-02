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
    <title>shop</title>
</head>
<body class="bg-gray-100">
    <div>
        <h1 class="w-full bg-blue-600 text-white font-bold text-5xl text-center py-4">Welcome to our shop</h1>
        <div class="flex justify-between gap-5 shadow-black shadow-sm bg-blue-800 py-3 px-2 items-center rounded-b-sm">
            <p class="text-5xl text-white font-semibold">Name : <?php echo $_SESSION['login']['fullname'] ; ?></p>
            <div class="user flex gap-5 py-3 px-2">
                <div class="flex justify-center">
                    <form action="logout.php">
                        <button class="bg-red-500 text-white shadow-md shadow-black text-2xl px-8 py-4 rounded cursor-pointer hover:text-white hover:bg-red-700 transition ease-out duration-150">LOG OUT</button>
                    </form>
                </div>
                <?php
                    if ($_SESSION['login']['role'] == 'admin') {
                        echo 
                        '<div class=" text-white text-3xl py-3">
                            <a href="addproduct.php" class="bg-yellow-500 text-white text-2xl shadow-md shadow-black px-8 py-4 rounded cursor-pointer hover:text-white hover:bg-yellow-200 transition ease-out duration-150"> ajouter</a>
                        </div>' 
                        ;
                    }
                ?>
            </div>
        </div>
    </div>
    <div class="container mx-auto mt-8">
        <table class="table-auto border-collapse w-full text-center">
            <thead>
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
                    <th class="border border-blue-500 p-4">Comments</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product) : ?>
                <tr class="bg-white text-gray-900">
                    <td class="border border-blue-500 p-4"><?php echo $product['id_G']; ?></td>
                    <td class="border border-blue-500 p-4"><?php echo $product['name']; ?></td>
                    <td class="border border-blue-500 p-4"><?php echo $product['type']; ?></td>
                    <td class="border border-blue-500 p-4"><?php echo $product['prix']; ?></td>
                    <td class="border border-blue-500 p-4 w-48">
                        <div class="w-full h-full">
                            <image src="<?php echo $product['image']; ?>" alt="there is no image for this product" class="h-full w-full object-cover rounded">
                        </div>
                    </td>
                    <?php
                        if ($_SESSION['login']['role'] == 'admin') {
                            echo '
                            <td class="border border-blue-500 p-4">
                                <form action="modifier.php" method="post">
                                    <input type="hidden" name="id_G" value="' . $product['id_G'] . '">
                                    <button type="submit" name="modify" class="bg-green-500 text-white px-4 py-2 rounded cursor-pointer hover:bg-green-700 transition ease-out duration-150">Modifier</button>
                                </form>
                            </td>
                            <td class="border border-blue-500 p-4">
                                <form action="delete.php" method="post">
                                    <input type="hidden" name="id_G" value="' . $product['id_G'] . '">
                                    <button type="submit" name="delete" id="delete" class="bg-red-500 text-white px-4 py-2 rounded cursor-pointer hover:bg-red-700 transition ease-out duration-150" onclick="return confirmDelete()">Delete</button>
                                </form>
                            </td>';
                        }
                        ?>
                    <td class="border border-blue-500 p-4">
                        <form action="comments.php" method="post">
                            <input type="hidden" name="id_G" value="<?php echo $product['id_G']; ?>">
                            <button type="submit" class="bg-blue-400 text-white px-4 py-2 rounded cursor-pointe hover:bg-blue-600 transition ease-out duration-150">Comments</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete this item?");
        }
    </script>
</body>
</html>

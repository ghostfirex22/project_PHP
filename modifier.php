<?php 
    session_start();
    if (!isset($_SESSION['login'])){
        header('Location: login.php');
        exit;
    }
?>

<?php

require 'selectForEdit.php';


?>

<!DOCTYPE html> 
<html>
<head>
    <title>Modifier un Stagiaire</title>
    <link rel="stylesheet" href="https://cdn.tailwindcss.com">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <h1 class="text-4xl font-bold text-center w-full bg-blue-300 py-5 text-blue-600">UPDATE THE PRODUCT</h1>
    <form method="post" action="update.php" enctype="multipart/form-data" class="flex flex-col bg-blue-600 text-white gap-4 w-96 m-auto p-10 mt-12 items-center rounded-md shadow-lg ">
        <input type="hidden" name="id_G" value="<?php echo $product['id_G']; ?>">
        <label for="name" class="w-full  text-2xl text-center">Name :</label>
        <input type="text" id="name" name="name" required class="h-10 rounded-sm w-full px-2 text-gray-800" value="<?php echo $product['name']; ?>">
        <label for="type" class="w-full  text-2xl text-center">Type :</label>
        <input type="text" id="type" name="type" required class="h-10 rounded-sm w-full px-2 text-gray-800" value="<?php echo $product['type']; ?>">
        <label for="prix" class="w-full text-2xl text-center">Prix :</label>
        <input type="number" id="prix" name="prix" class="h-10 rounded-sm w-full px-2 text-gray-800" value="<?php echo $product['prix']; ?>">

        <label for=""></label>
        <input type="file" name="image" accept="image/*">

        <button type="submit" value="Upload Image" class="bg-yellow-500 text-gray-900 font-bold text-2xl mt-4 py-2 px-6 rounded hover:bg-yellow-600">Modifier</button>
    </form>

    <div class="flex justify-center mt-8">
        <form action="logout.php">
            <button class="bg-red-500 text-white text-2xl px-8 py-4 rounded">LOG OUT</button>
        </form>
    </div>
</body>
</html>

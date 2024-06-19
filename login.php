<?php 
    session_start();
    if (isset($_SESSION['login'])){
        header('Location: index.php');
        exit;
    } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.tailwindcss.com">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body class="bg-gray-300">

    <h1 class="text-7xl bg-blue-400 w-full text-yellow-200 font-bold h-28 text-center">GAMING SHOP</h1>

    <form action="loginScript.php" method="post" class="bg-gray-600 flex items-center flex-col gap-2 w-96 m-auto p-10 mt-9 rounded-md">
        <label for="email" class="text-white text-2xl">email</label>
        <input type="text" name="email" id="email" class="p-2">

        <label for="password" class="text-white text-2xl">password</label>
        <input type="password" name="password" id="password" class="p-2">

        <button type="submit" class="submit text-3xl text-yellow-200">Submit</button>
    </form>
</body>
</html>
<?php

session_status();

require 'db.php';

$id_G = $_POST['id_G'];

$sql = 'SELECT comments.description, users.id, users.user_image , users.fullname FROM comments
JOIN users ON comments.user_id = users.id
WHERE comments.id_G = :id_G' ;

$statement = $pdo->prepare($sql);

$statement->execute([
    ':id_G' => $id_G
]);

$posts = $statement->fetchAll(PDO::FETCH_ASSOC);
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
<body>
    <h1 class="w-full bg-blue-600 text-white font-bold text-5xl text-center py-4">Comments</h1>
    <h2 class="w-full bg-blue-300 text-white font-bold text-4xl py-4">Top comments</h2>
    <div class="w-full md:12 mx-auto p-4">
        <?php foreach ($posts as $post) : ?>
        <div class="bg-blue-200 shadow-md rounded-lg p-6 mb-4 ">
            <div class="w-16 flex flex-row gap-7 py-5 ">
                <img src="<?php echo $post['user_image'] ?>" alt="" class="w-full h-full object-cover rounded-full cursor-pointer">
                <h1 class="text-4xl font-semibold mb-2 self-center"><?php echo $post['fullname']; ?></h1>
            </div>
            <p class="text-white bg-blue-700 text-2xl py-10 px-2"><?php echo $post['description']; ?></p>
        </div>
        <?php endforeach; ?>
    </div>


</body>
</html>
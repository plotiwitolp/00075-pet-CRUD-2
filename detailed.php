<?php
require_once './config/connect.php';
$id = $_GET['id'];
$product = mysqli_query($connection, "SELECT * FROM `products` WHERE `id` = $id");
$comments = mysqli_query($connection, "SELECT * FROM `comments` WHERE `products_id` = $id");
$product = mysqli_fetch_assoc($product);
$comments = mysqli_fetch_all($comments);
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="wrapper">
        <?php require_once './nav.php' ?>
        <div>
            <h1>Product detail</h1>
            <h2>Title</h2>
            <p><?= $product['title'] ?></p>
            <h2>Description</h2>
            <p><?= $product['description'] ?></p>
            <h2>Price</h2>
            <p><?= $product['price'] ?></p>
        </div>
        <hr>
        <h2>Комментарии</h2>
        <ul>
            <?php foreach ($comments as $comment) {
            ?>
                <li><?= $comment[1] ?></li>
            <?php
            }
            ?>
        </ul>
        <h2>Добавить комментарий</h2>
        <form action="./vendor/comment/create.php?id=<?= $id ?>" method="POST">
            <textarea type="text" name="body" placeholder="comment" row="100"></textarea>
            <input type="submit" value="add comment">
        </form>
    </div>
</body>

</html>
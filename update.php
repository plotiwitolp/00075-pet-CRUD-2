<?php
require_once './config/connect.php';
$id = $_GET['id'];
$product = mysqli_query($connection, "SELECT * FROM `products` WHERE `id` = $id");
$product = mysqli_fetch_assoc($product);
$comments = mysqli_query($connection, "SELECT * FROM `comments` WHERE `products_id` = $id");
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
        <form action="./vendor/update.php?id='<?= $id ?>'" method="POST">
            <h1>Create product</h1>
            <h2>Title</h2>
            <input type="text" name="title" placeholder="title" value="<?= $product['title'] ?>">
            <h2>Description</h2>
            <input type="text" name="description" placeholder="description" value="<?= $product['description'] ?>">
            <h2>Price</h2>
            <input type="text" name="price" placeholder="price" value="<?= $product['price'] ?>">
            <input type="submit" value="UPDATE">
        </form>

        <div>
            <?php
            while ($с = mysqli_fetch_assoc($comments)) {
            ?>
                <form action="./vendor/comment/update.php?id=<?= $id ?>&id_comment=<?= $с['id'] ?>" method="post" style="display: flex; gap: 10px; align-items: center;">
                    <input type="text" value="<?= $с['body'] ?>" name='body'>
                    <input type="submit" value="сохранить">
                    <a href="./vendor/comment/delete.php?id=<?= $id ?>&id_comment=<?= $с['id'] ?>">удалить</a>
                </form>
            <?php
            }
            ?>
        </div>
    </div>
</body>

</html>
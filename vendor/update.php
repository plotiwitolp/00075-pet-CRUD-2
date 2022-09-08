<?php
require_once './../config/connect.php';
$id = $_GET['id'];
$title = $_POST['title'];
$description = $_POST['description'];
$price = $_POST['price'];
$product = mysqli_query($connection, "UPDATE `products` SET `title` = '$title', `description` = '$description', `price` = '$price' WHERE `products`.`id` = $id;");
header('Location: /');

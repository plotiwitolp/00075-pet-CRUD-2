<?php
require_once './../../config/connect.php';
$id = $_GET['id'];
$body = $_POST['body'];
print_r($id);
mysqli_query($connection, "INSERT INTO `comments` (`body`, `products_id`) VALUES ( '$body', '$id');");
header('Location: ./../../detailed.php?id=' . $id . ' ');

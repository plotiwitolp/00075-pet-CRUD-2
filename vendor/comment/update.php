<?php
require_once './../../config/connect.php';
$id = $_GET['id'];
$id_comment = $_GET['id_comment'];
$body = $_POST['body'];
print_r($id);
mysqli_query($connection, "UPDATE `comments` SET `body` = '$body' WHERE `comments`.`id` = $id_comment;");
header('Location: ./../../update.php?id=' . $id . ' ');

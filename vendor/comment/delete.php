<?php
require_once   './../../config/connect.php';

$id_comment = $_GET['id_comment'];
$id = $_GET['id'];
print_r($id);

mysqli_query($connection, "DELETE FROM `comments` WHERE `comments`.`id` = $id_comment ");

header('Location: ./../../update.php?id=' . $id . '');

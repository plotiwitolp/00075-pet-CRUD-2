<?php
require_once './config/connect.php';
$products = mysqli_query($connection, "SELECT * FROM `products`");
$products = mysqli_fetch_all($products);
?>
<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="./style.css" />
</head>

<body>
  <div class="wrapper">
    <?php require_once './nav.php' ?>
    <div>
      <form action="/" method="POST">
        <input type="text" name="login" placeholder="Login">
        <input type="password" name="password" placeholder="Password">
        <input type="submit" value="Войти">
      </form>
    </div>
    <div>
      <?php
      $login = $_POST['login'];
      $login = ($login);
      $password = $_POST['password'];
      $password = md5($password);
      $user = mysqli_query($connection, "SELECT * FROM `users` where `login` = '{$login}' and `password` = '{$password}'");
      $user = mysqli_fetch_assoc($user);
      ?>
      <div class="accaunt">
        <p>
          <?= $user['login'] ?>
          <?= $user['descript'] ?>
        </p>
      </div>
    </div>
    <table>
      <th>№</th>
      <th>ID</th>
      <th>Title</th>
      <th>Description</th>
      <th>Price</th>
      <th></th>
      <th></th>
      <th></th>
      <?php
      $i = 1;
      foreach ($products as $product) {
      ?>
        <tr>
          <td><?= $i ?></td>
          <td><?= $product[0] ?></td>
          <td><?= $product[1] ?></td>
          <td><?= $product[2] ?></td>
          <td><?= $product[3] ?><span>$</span></td>
          <td><a href="./detailed.php?id=<?= $product[0] ?>">Подробнее</a></td>
          <td><a href="./update.php?id=<?= $product[0] ?>">Изменить</a></td>
          <td><a href="./vendor/delete.php?id=<?= $product[0] ?>">Удалить</a></td>
        </tr>
      <?php
        $i++;
      }
      ?>
    </table>

    <form action="./vendor/create.php" method="POST">
      <h1>Create product</h1>
      <h2>Title</h2>
      <input type="text" name="title" placeholder="title">
      <h2>Description</h2>
      <textarea type="text" name="description" placeholder="description"></textarea>
      <h2>Price</h2>
      <input type="text" name="price" placeholder="price">
      <input type="submit" value="CREATE">
    </form>
  </div>
  <script src="./script.js"></script>
</body>

</html>
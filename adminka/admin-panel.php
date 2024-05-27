<?php
include '../components/core.php';
if(!isset($_SESSION['user'])){
    header("Location: login.php");
}

if(isset($_SESSION['user']['status'])!=1){
    header("Location: login.php");
}

$allowed_ips = array("127.0.0.1", "192.168.1.1"); // Разрешенные IP-адреса
$client_ip = $_SERVER['REMOTE_ADDR'];
if (!in_array($client_ip, $allowed_ips)) {
    die("Доступ запрещен!");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <title>Restaurant Admin Panel</title>
</head>
<style>
    body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
}

header {
  background-color: #333;
  color: #fff;
  padding: 10px;
  text-align: center;
}

nav {
  background-color: #f2f2f2;
  padding: 10px;
}

nav ul {
  list-style: none;
  padding: 0;
}

nav ul li {
  display: inline;
  margin-right: 20px;
}

nav ul li a {
  text-decoration: none;
  color: #333;
}

main {
  padding: 20px;
}

footer {
  background-color: #333;
  color: #fff;
  text-align: center;
  padding: 10px;
}
</style>
<body>
  <header>
    <h1>Админ панель</h1>
  </header>
  <nav>
    <ul>
      <li><a href="recipes.php">Управление меню</a></li>
      <li><a href="#">Управление резервированием</a></li>
      <li><a href="zayavki.php">Управление заявками</a></li>
      <li><a href="galery.php">Управление фотогалереей</a></li>
      <li><a href="logout.php">Выйти</a></li>
    </ul>
  </nav>
  <main>
    <h2>Добро пожаловать, Админ!</h2>
    <p>
Выберите раздел в меню навигации, чтобы управлять различными аспектами работы ресторана.</p>
  </main>

</body>
</html>
<?php
include "../components/core.php";
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>
<?php 

    if(isset($_POST['save_zav'])){
            $result = $mysqli->query("UPDATE `bronirovanie` SET `status_id`='{$_POST['status']}' WHERE `id` = '{$_POST['id']}'");
    }

    if(isset($_POST['delet_zav'])){
        $result = $mysqli->query("DELETE FROM `bronirovanie` WHERE `id` = '{$_POST['id']}'");
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Страница с заявками</title>
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
  margin-bottom: 20px;
}
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }

        .zag{
    text-align: center;
}

        .application {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 10px;
            width: 300px;
        }

        .save-button {
            padding: 5px 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
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
    </style>
</head>
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
  <h1 class="zag">Заявки на бронирование</h1>
    <div class="container">
        <?php
            $zayvki = $mysqli->query("SELECT `status`.*, `bronirovanie`.*
            FROM `bronirovanie` 
                LEFT JOIN `status` ON `bronirovanie`.`status_id` = `status`.`id`");
                $zayvki1 = $mysqli->query("SELECT * FROM `status`");
        ?>
        <?php foreach($zayvki as $key  => $value){ ?>
        <div class="application">
            <p><strong>Имя:</strong> <?= $value['name']?></p>
            <p><strong>Телефон:</strong><?= $value['phone']?></p>
            <p><strong>Дата:</strong> <?= $value['data']?></p>
            <p><strong>Статус:</strong> <?= $value['status']?></p>
            <p><strong>Выбери новый статус:</strong></p>
            <form action="" method="POST">
            <p><select name ="status">
            <?php foreach($zayvki1 as $key  => $val): ?>
                <option value = "<?= $val['id']?>"><?= $val['status']?></option>
            <?php endforeach; ?>
            </select></p>
            <input type ="hidden" name = "id" value="<?= $value['id']?>">
            <button name="save_zav" class="save-button">Сохранить</button>
            <button name="delet_zav" class="delete-button">Удалить</button>
            </form>
        </div>
        <?php } ?>
    </div>
</body>
</html>
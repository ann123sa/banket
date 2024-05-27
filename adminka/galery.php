<?php 
include "../components/core.php";
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Загрузка и отображение фотографий</title>
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
.zag{
    text-align: center;
}
nav {
  background-color: #f2f2f2;
  padding: 10px;
  margin-bottom: 20px;
}
.delete-button {
    background-color: #ff6347; /* Цвет фона кнопки */
    color: white; /* Цвет текста на кнопке */
    padding: 5px 10px; /* Внутренние отступы */
    border: none; /* Убираем границу */
    border-radius: 5px; /* Закругляем углы */
    margin-top: 5px; /* Отступ сверху */
    cursor: pointer; /* Изменяем курсор при наведении */
}

.delete-button:hover {
    background-color: #d9534f; /* Изменяем цвет фона при наведении */
}

.container {
            margin-left: 20px;
            margin-right: 20px;
            display: flex;
        }
        .form-container {
            width: 50%;
            padding: 20px;
            box-sizing: border-box;
        }
        .form-container h2 {
            margin-bottom: 20px;
        }
        .form-container input[type="file"],
        .form-container input[type="submit"] {
            margin-bottom: 10px;
        }
        .gallery-container {
            width: 50%;
            padding: 20px;
            box-sizing: border-box;
        }
        .gallery-container h2 {
            margin-bottom: 20px;
        }
        .gallery {
            display: flex;
            flex-wrap: wrap;
        }
        .gallery img {
            max-width: 100px;
            margin: 5px;
            border-radius: 5px;
        }
        .gallery-item {
  position: relative;
}

.delete-button {
  position: absolute;
  bottom: 0;
  left: 50%;
  transform: translateX(-50%);
  /* Остальные стили кнопки */
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
        <div class="form-container">
            <h2>Добавить фотографию</h2>
            <form method="post" enctype="multipart/form-data" action="upload.php">
                <input type="file" name="photo" accept="image/*">
                <input name="add_img" type="submit" value="Загрузить">
            </form>
        </div>
        <div class="gallery-container">
            <h2 class="zag">Галерея</h2>
            <div class="gallery">
            <?php 
      $image = mysqli_query($mysqli,"SELECT * FROM `gallery` ");
      while( $img = mysqli_fetch_assoc( $image) )
                {
    ?>
    <form action="del_img.php" method="POST">
   <div class="gallery-item">
    <input type="hidden" name="id" value="<?=$img['id'];?>">
   <img src="../img/<?=$img['image'];?>" alt="Фото банкетного зала">
    <button name="del_img" class="delete-button">Удалить</button>
  </div>
    </form>
    <?php
                }
    ?>
            </div>
        </div>
    </div>
</body>
</html>
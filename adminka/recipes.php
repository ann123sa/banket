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
table{
    text-align: center;
    margin: auto auto;
}

.zag{
    text-align: center;
}

nav {
  background-color: #f2f2f2;
  padding: 10px;
  margin-bottom: 20px;
}
 /* Скрыть модальное окно по умолчанию */
 .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.5);
        }

        /* Стили для контейнера формы в модальном окне */
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
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
.btn-container {
            text-align: right; /* Размещаем кнопки справа */
            margin-bottom: 10px; /* Добавляем отступ снизу */
        }
        .btn-container a {
            text-decoration: none;
        }
        .btn {
            color: black;
            padding: 10px 15px;
            border: 1px solid black;
            cursor: pointer;
            margin-right: 5px;

        }
</style>
<body>
<div id="myModal" class="modal">
    <div class="modal-content">
        <span id="closeModalBtn">&times;</span>
        <h2>Добавить рецепт</h2>
        <form action="recipes_add.php" method="POST">
            <label for="name">Название рецепта:</label><br>
            <input type="text" id="name" name="name"><br><br>
            <label for="ingredients">Ингредиенты:</label><br>
            <input type="text" id="ingredients" name="ingredients"><br><br>
            <label for="price">Цена:</label><br>
            <input type="text" id="price" name="price"><br><br>
            <label for="grams">Граммы:</label><br>
            <input type="text" id="grams" name="grams"><br><br>
            <label for="category">Категория:</label><br>
            <?php 
                $category = "SELECT * FROM `category`";
                    $res = $mysqli->query($category);
            ?>
            <select name="category">
            <?php while($value = $res->fetch_assoc()) { ?>
                <option value="<?=$value['id']?>"><?=$value['title']?></option>
                <?php } ?>
            </select><br><br>
            <input type="submit" name="add" value="Добавить">
        </form>
    </div>
</div>

<div id="myModal2" class="modal">
    <div class="modal-content">
        <span id="closeModalBtn2">&times;</span>
        <h2>Удалить рецепт</h2>
        <form action="recipes_delete.php" method="post">
            <label for="name2">Введите название рецепта</label><br>
            <input type="text" id="name2" name="name2"><br><br>
            <input type="submit" name="delete" value="Удалить">
        </form>
    </div>
</div>


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
  <h1 class="zag">Меню банкетного зала</h1>
  <div class="btn-container">
    <button id="openModalBtn" class="btn">Добавить</button>
    <button  class="btn">Изменить</button>
    <button id="openModalBtn2" class="btn">Удалить</button>
</div>
  <?php
// Запрос к базе данных
$sql = "SELECT `menu`.*, `category`.*
FROM `menu` 
	LEFT JOIN `category` ON `menu`.`categorie_id` = `category`.`id`;";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    echo "<table style='border: 1px solid black; border-collapse: collapse;'>";
    echo "<tr><th style='border: 1px solid black; padding: 8px;'>Название</th><th style='border: 1px solid black; padding: 8px;'>Описание</th><th style='border: 1px solid black; padding: 8px;'>Цена(в руб.)</th><th style='border: 1px solid black; padding: 8px;'>Граммы</th><th style='border: 1px solid black; padding: 8px;'>Категория</th></tr>";
    
    // Вывод данных каждого рецепта в виде строки таблицы
    while($row = $result->fetch_assoc()) {
        echo "<tr><td style='border: 1px solid black; padding: 8px;'>" . $row["name"] . "</td><td style='border: 1px solid black; padding: 8px;'>" . $row["ingredients"] . "</td>" . "<td style='border: 1px solid black; padding: 8px;'>" . $row["price"] . "</td>" ."<td style='border: 1px solid black; padding: 8px;'>" . $row["grams"] . "</td><td style='border: 1px solid black; padding: 8px;'>" . $row["title"] . "</td>" . "</tr>";
    }
    
    echo "</table>";
} else {
    echo "0 результатов";
}

$mysqli->close();
?>
<script>
    var modal = document.getElementById('myModal');
    var openBtn = document.getElementById('openModalBtn');
    var closeBtn = document.getElementById('closeModalBtn');

    openBtn.onclick = function() {
        modal.style.display = 'block';
    }

    closeBtn.onclick = function() {
        modal.style.display = 'none';
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    }
    window.onclick = function(event) {
        if (event.target == modal_del) {
            modal.style.display = 'none';
        }
    }
    var modal2 = document.getElementById('myModal2');
    var openBtn2 = document.getElementById('openModalBtn2');
    var closeBtn2 = document.getElementById('closeModalBtn2');

    openBtn2.onclick = function() {
        modal2.style.display = 'block';
    }

    closeBtn2.onclick = function() {
        modal2.style.display = 'none';
    }

    window.onclick = function(event) {
        if (event.target == modal2) {
            modal2.style.display = 'none';
        }
    }
</script>
</body>
</html>


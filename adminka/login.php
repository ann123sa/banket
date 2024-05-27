<?php
include "../components/core.php";
if($_POST['vhod']){
    $password = md5($_POST['password']);
    $result = $mysqli->query("SELECT * FROM `users` WHERE `login` = '{$_POST['username']}' AND `password` = '$password'");

    if($result->num_rows>0){
        foreach($result as $key => $value){
            $_SESSION['user']['id'] = $value['id'];
            $_SESSION['user']['status'] = $value['status'];
            header("Location: admin-panel.php");
        }
    }else{
        $errors = "Неправильный логин или пароль";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Форма входа в админ-панель</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; /* Устанавливаем красивый шрифт */
            background: linear-gradient(to right, #f0f2f5, #d9e1e8);
            animation: gradientAnimation 10s ease infinite;
            color: #333;
        }

        @keyframes gradientAnimation {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }

        .login-container {
            max-width: 400px;
            margin: 100px auto;
            padding: 20px;
            background-color: #fff; /* Нежно-розовый цвет фона */
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
        }

        .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo img {
            max-width: 100px;
            height: auto;
        }

        input[type="text"],
        input[type="password"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; /* Красивый шрифт для инпутов */
        }

        input[type="submit"] {
            background-color: #f08bb7; /* Нежно-розовый цвет кнопки */
            color: white;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="logo">
            <img src="../img/logo3.png" alt="Логотип">
        </div>
        <h2>Вход в админ-панель</h2>
        <form action="login.php" method="post">
            <input type="text" name="username" placeholder="Имя пользователя" required>
            <input type="password" name="password" placeholder="Пароль" required>
            <input type="submit" name="vhod" value="Войти">
        </form>
        <?= $errors ?>
    </div>
</body>
</html>

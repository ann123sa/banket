<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="modal.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="burger-menu.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Tinos:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <title>Банкетный ресторан</title>
</head>
<body>
<div id="myModal" class="modal">
  <div class="modal-content pink-gold">
    <span class="close">&times;</span>
    <h2>Форма бронирования</h2>
    <p class="opis">Заполните форму, и мы с вами свяжемся в течении часа для обсужденя бронирования</p>
    <form action="../add_bron.php" id="bookingForm" method="POST">
      <div class="form-group">
        <label for="name">Имя<span class="red">*</span></label>
        <input type="text" id="name" name="name" required>
      </div>
      <div class="form-group">
        <label for="phone">Номер телефона<span class="red">*</span></label>
        <input type="text" id="phone" name="phone" required>
      </div>
      <div class="form-group">
        <label for="date">Дата бронирования<span class="red">*</span></label>
        <input type="date" id="date" name="date" required>
      </div>
      <div class="button-center">
        <button type="submit" onclick="showNotification()" name="bron">Отправить</button>
      </div>
    </form>
  </div>
</div>
    <div class="header">
        <div class="container">
        <div class="header-line">
            <div class="header-logo">
                <a href="../index.php"><img src="img/logo3.png" alt="logo"></a>
                <p class="logo_name"><i>"На заозерной"</i></p>
            </div>
            <div class="nav">
                <a class="nav-item" href="../index.php">Главная</a>
                <a class="nav-item" href="../menu.php">Меню</a>
                <a class="nav-item" href="gallery.php">Галерея</a>
                <a class="nav-item" href="../index.php#history_nav">О нас</a>
                <a class="nav-item" href="../nav.php">Как добраться</a>
                <a class="nav-item" id="openModal">Бронь</a>
            </div>
            <div class="phone">
                <div class="phone-holder">
                <div class="phone-img">
                    <img class="trubka" src="img/phone.png" alt="">
                </div>
                <div class="number"><a class="num" href="tel:+73812282490">+7 (3812) 28-24-90</a>
                </div>
            </div>
                <div class="phone-text">
                    Свяжитесь с нами для <br> бронирования
                </div>
            </div>
            <div class="btn">
                <a class="button" href="tel:+73812282490">Забронировать зал</a>
            </div>

            <div id="menuToggle">
    <input type="checkbox" />
    <span></span>
    <span></span>
    <span></span>
    <ul id="menu">
      <a href="../index.php"><li>Главная</li></a>
      <a href="../menu.php"><li>Меню</li></a>
      <a href="gallery.php"><li>Галерея</li></a>
      <a href="../index.php#history_nav"><li>О нас</li></a>
      <a href="../nav.php"><li>Как добраться</li></a>
    </ul>
  </div>
        </div>
        <div class="header-down">
            <div class="header-title">
                Добро пожаловать в
                <div class="header-subtitle">
                    Наш банкетный ресторан
                </div>
                <div class="header-suptitle">
                  БАНКЕТНЫЙ ЗАЛ
                </div>
                <div class="header-btn">
                    <a href="#menu_nav" class="header-button">Посмотреть меню</a>
                </div>
            </div>
        </div>
        </div>
    </div>
<?php
    include 'components/core.php';


    include 'components/header2.php';

?>
    <style>
    .item-ingredients {
        font-style: italic;
        color: #808080; /* серый цвет */
        text-align: center;
    }

    .container_1 {
        display: flex;
        justify-content: center;
        align-items: flex-start;
        margin-top: 50px;
    }

    .categories {
        width: 20%;
        background-color: #ffebcd; /* золотистый оттенок */
        padding: 20px;
        border-radius: 5px;
    }

    .items {
        width: 70%;
        padding: 20px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    ul {
        list-style-type: none;
        padding: 0;
    }

    li {
        margin-bottom: 10px;
        
    }

    li a{
        text-decoration: none;
        color: black;
    }

    h2 {
        color: #e7cba7; /* розовый оттенок */
    }

    .item {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .underline-one {
	color: #000000; /* Цвет обычной ссылки */
    position: relative;
    cursor: pointer;
    text-decoration: none; /* Убираем подчеркивание */
}
.underline-one:after {
	content: "";
    display: block;
    position: absolute;
    right: 0;
    bottom: -3px;
    width: 0;
    height: 2px; /* Высота линии */
    background-color: black; /* Цвет подчеркивания при исчезании линии*/
    transition: width 0.5s; /* Время эффекта */
}

.underline-one:hover:after {
	content: "";
    width: 100%;
    display: block;
    position: absolute;
    left: 0;
    bottom: -3px;
    height: 2px; /* Высота линии */
    background-color: rgb(255, 255, 255); /* Цвет подчеркивания при появлении линии*/
    transition: width 0.5s;  /* Время эффекта */
}

    .item-price,
    .item-calories {
        color: #e7cba7; /* розовый оттенок */
        padding-right: 10px;
    }
    @media (max-width: 768px) {
        .container_1 {
            flex-direction: column;
            align-items: center;
        }
        
        .categories, .items {
            text-align: center;
            width: 100%;
            margin-bottom: 20px;
        }
        .item {
            flex-direction: column; /* Отображение блюд в столбик */
        }
        
        .item-name,
        .item-ingredients,
        .item-price,
        .item-calories {
            text-align: center; /* Центрирование текста в блоках с информацией о блюдах */
        }
    }
    .form{
        color: #000000;
    }
    </style>
        <div class="container_1">
        <?php
      $categories_q=mysqli_query($mysqli, "SELECT * FROM `category`");
      $categories = array();
      while($cat = mysqli_fetch_assoc($categories_q) )
                {
                $categories[] = $cat;
                }

        $dish = mysqli_query($mysqli, "SELECT * FROM `menu` WHERE `categorie_id` = 1");
      ?>
      
            <div class="categories">
                <h2>Категории меню</h2>
                <ul>
                <?php
                foreach($categories as $cat )
                {
                ?>
                 <li><a class="underline-one" href="menu_kat.php?categorie=<?= $cat['id']; ?>"><?= $cat['title']?></a></li>
            <?php
                }?>
                </ul>
            </div>
            <div class="items">
                <h2>Банкетное меню</h2>
                <ul>
                <?php foreach($dish as $key => $value){?>
                    <li class="item">
                        <span class="item-name"><?= $value['name']?></span>
                        <?php if($value['ingredients'] != NULL){?>
                        <span class="item-ingredients"><?=$value['ingredients'];?></span>
                        <?php }?>
                        <span>
                            <span class="item-price"><?= $value['price']?> руб.</span>
                            <?php if($value['grams'] == 1){?>
                                <span class="item-calories"><?= $value['grams']?> шт.</span>
                           <?php }else{?>
                            <span class="item-calories"><?= $value['grams']?> грамм</span>
                            <?php }?>
                        </span>
                    </li>
                <?php }?>
                </ul>
        
            </div>
            <script src="modal.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/inputmask/4.0.9/jquery.inputmask.bundle.min.js"></script>
<script>
$(document).ready(function() {
  $('#phone').inputmask("+7 (999) 999-99-99");
});
</script>

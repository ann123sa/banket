<?php
    include 'components/header2.php';
?>
<style>
        body {
            background-color: #f9f9f9;
    
        }
    
        .container_1 {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
    
        .container_1 h1 {
            color: #e7cba7 /* розовый оттенок */
        }
    
        .container_1 p {
            color: #000;
            margin-bottom: 10px;
        }
    
        .map {
            width: 100%;
            height: 300px;
            margin-top: 20px;
            border-radius: 5px;
        }
        body {
        margin: 0;
        font-family: Arial, sans-serif;
    }
    </style>
            <div class="container_1">
                <h1>Как добраться</h1>
                <p>Наш адрес: ул. Заозёрная, д.3в, г. Омск</p>
                <p>Вы можете добраться до нас на общественном транспорте или с помощью личного автомобиля.</p>
                
                <h2>Общественный транспорт:</h2>
                <p>Ближайшая автобусная остановка - Стрельникова </p>
                
                <h2>Приём гостей:</h2>
                <p>Круглосуточно</p>

                <h2>Автомобиль:</h2>
                <p>У нас есть бесплатная парковка для посетителей.</p>

                <div class="map">
                    <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A0588cf1e136620423d6a1622dad91e498cb3ca25e2a2c55c9ee595df665b573c&amp;width=350&amp;height=287&amp;lang=ru_RU&amp;scroll=true"></script>
                </div>
            </div>
<?php
    include 'components/footer.php';
?>
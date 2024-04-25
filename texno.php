<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Технологические карты</title>
    <link rel="stylesheet" href="style_new.css">
    <script src="./main.js"></script>
</head>
<body>
<?php 
// Проверяем, авторизован ли пользователь
if (!isset($_COOKIE['user'])) {
    header('Location: index.php'); // Перенаправляем на страницу входа, если пользователь не авторизован
    exit();
}
    include "./PHP/include/header_LogIn.php";
?>
      <main>
      <div class="aligment-elements"> <!--Выравнивание элементов до ссылок-->
            <div> <!--Контейнер с иллюстрацией-->
            <img src="./img/Vector/Технологические карты.svg" alt="" class="vector-size" style= "width:190%">
            </div>
            <div class="aligment-description"> <!--Выравнивание текста-->
                <p class="teor-h1">Технологические карты</p>
                <p class="ind-teor-p" style="color: white;">Раздел "Технологические карты" на нашем сайте предоставляет 
                полезные ресурсы для освоения практических аспектов технологий облицовки поверхностей. Здесь вы найдете широкий спектр 
                информации, помогающие применить теоретические знания на практике.
                Мы уделяем особое внимание тому, чтобы предоставить структурированный и понятный материал, 
                который поможет начинающим специалистам.
             </div>   
        </div>
        <div class="ind-teor-dek-rectangle"> <!--Декоративный прямоугольник-->
        </div>
        <div class="nav"><!--Контейнер заполняющий нижнюю часть страницы цветом-->
        <div style="padding-top: 30px;" class="teor-vraper"><!--Контейнер с 3-мя блоками-ссылками-->

<div>
            <a href="Card/Chapter-1.php">
            <div class="reactangle-teh" style="background-image: url(./img/Card-img/1.jpg); background-size: cover;">
            <div class="reactangle-text-teh"><p class="teor-h1" style="font-size: 25px;">Глава 1</p></div>
</div>
        <p class="teor-p">Подготовка керамических плиток к укладке</p></a>
</div>
<div>
        <a href="Card/Chapter-2.php">
        <div class="reactangle-teh" style="background-image: url(./img/Card-img/2.jpg); background-size: cover;">
            <div class="reactangle-text-teh"><p class="teor-h1" style="font-size: 25px;">Глава 2</p></div>
        </div>
        <p class="teor-p">Устройство плиточных полов</p></a>
</div>
<div>
        <a href="Card/Chapter-3.php">
            <div class="reactangle-teh" style="background-image: url(./img/Card-img/3.jpg); background-size: cover;">
                <div class="reactangle-text-teh"><p class="teor-h1" style="font-size: 25px;">Глава 3</p></div>
            </div>
            <p class="teor-p">Устройство мозаичных полов</p></a>
        </div>
</div>

        <div style="padding-top: 30px;" class="teor-vraper"><!--Контейнер с 3-мя блоками-ссылками-->
           <div>
                    <a href="Card/Chapter-4.php">        
                    <div class="reactangle-teh" style="background-image: url(./img/Card-img/4.jpg); background-size: cover;">
                        <div class="reactangle-text-teh"><p class="teor-h1" style="font-size: 25px;">Глава 4</p></div>
                    </div>
                    <p class="teor-p">Устройство бесшовных покрытий полов</p></a>
</div>
<div>
                    <a href="Card/Chapter-5.php">
                    <div class="reactangle-teh" style="background-image: url(./img/Card-img/5.jpg); background-size: cover;">
                        <div class="reactangle-text-teh"><p class="teor-h1" style="font-size: 25px;">Глава 5</p></div>
                    </div>
                    <p class="teor-p">Облицовка вертикальных поверхностей</p></a>
</div>
<div>
                    <a href="Card/Chapter-6.php">
                    <div class="reactangle-teh" style="background-image: url(./img/Card-img/6.jpg); background-size: cover;">
                        <div class="reactangle-text-teh"><p class="teor-h1" style="font-size: 25px;">Глава 5</p></div>
                    </div>
                    <p class="teor-p">Ремонт облицовочных покрытий</p></a>
</div>
</div>
        </div>
      </main>
</body>
</html>
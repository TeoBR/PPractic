<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Теоретический материал</title>
    <link rel="stylesheet" href="style.css">
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
            <img src="./img/Vector/Теоритические знания.svg" alt="" class="vector-size">
            </div>
            <div class="aligment-description"> <!--Выравнивание текста-->
                <p class="teor-h1">Теоретические знания</p>
                <p class="ind-teor-p" style="color: white;">Раздел 'Теоретические материалы' на нашем сайте предоставляет обширную информацию о технологиях облицовки поверхностей. Здесь вы найдете статьи, обзоры и демонстрации, помогающие понять основные принципы и новшества в этой области. Независимо от вашего уровня опыта, эти материалы обеспечат необходимую базу для успешной работы с материалами, проектированием и установкой поверхностей.</p>
            </div>   
        </div>
        <div class="ind-teor-dek-rectangle"> <!--Декоративный прямоугольник-->
        </div>
        <div class="nav"> <!--Контейнер заполняющий нижнюю часть страницы цветом-->
            <div style="padding-top: 30px;" class="teor-vraper"><!--Контейнер с 3-мя блоками-ссылками-->
                    <div class="teor-flex-content-rectangle">
                    <a href="./Teor-php/teor1.php"><div class="ind-teor-rectangle"  style="background-image: url(./img/Teor-img/1.jpg);"></div></a>
                    <a href="./Teor-php/teor1.php"><p class="teor-p">Общие сведения об облицовочных работах</p></a>
                    </div>
                    <div class="teor-flex-content-rectangle">
                    <a href="./Teor-php/teor2.php"><div class="ind-teor-rectangle" style="background-image: url(./img/Teor-img/2.jpg); 
                    background-position: right;"></div></a>
                    <a href="./Teor-php/teor2.php"><p class="teor-p">Инструменты и механизмы для производства плиточных работ</p></a>
                    </div>
                    <div class="teor-flex-content-rectangle">
                    <a href="./Teor-php/teor3.php"><div class="ind-teor-rectangle" style="background-image: url(./img/Teor-img/3.jpg);"></div></a>
                    <a href="./Teor-php/teor3.php"><p class="teor-p">Подготовка плиток к работе</p></a>
                    </div>
                    <div class="teor-flex-content-rectangle">
                    <a href="./Teor-php/teor4.php"><div class="ind-teor-rectangle" style="background-image: url(./img/Teor-img/4.jpg);"></div></a>
                    <a href="./Teor-php/teor4.php"><p class="teor-p">Приготовление растворов и мастик</p></a>
                    </div>
                </div>
                <div style="padding-top: 30px;" class="teor-vraper"><!--Контейнер с 3-мя блоками (2 картинки и 1 ссылка)-->
                    <div class="teor-flex-content-rectangle">
                        <img src="./img/Vector/Теоритические знания(1 боковое изображение).svg" style="width: 300px;" class="filter-icon">
                    </div>
                    <div class="teor-flex-content-rectangle">
                    <a href="./Teor-php/teor5.php"><div class="ind-teor-rectangle" style="
                        background-image: url(./img/Teor-img/5.jpg); background-position: bottom"></div></a>
                    <a href="./Teor-php/teor5.php"><p class="teor-p">Охрана труда и окружающей среды</p></a>
                    </div>
                    <div class="teor-flex-content-rectangle">
                        <img src="./img/Vector/Теоритические знания(2 боковое изображение).svg" style="width: 300px;" class="filter-icon">
                    </div>
                </div>
                <div style="padding-top: 30px;" class="teor-vraper"><!--Контейнер с 3-мя блоками-ссылками-->
                    <div class="teor-flex-content-rectangle">
                    <a href="./Teor-php/teor6.php"><div class="ind-teor-rectangle" style="background-image:url(./img/Teor-img/6.jpg);"></div></a>
                    <a href="./Teor-php/teor6.php"><p class="teor-p">Подготовка вертикальных поверхностей под облицовку</p></a>
                    </div>
                    <div class="teor-flex-content-rectangle">
                    <a href="./Teor-php/teor7.php"><div class="ind-teor-rectangle" style="background-image:url(./img/Teor-img/7.jpg);"></div></a>
                    <a href="./Teor-php/teor7.php"><p class="teor-p">Отделка и уход за облицовкой</p></a>
                    </div>
                    <div class="teor-flex-content-rectangle">
                    <a href="./Teor-php/teor8.php"><div class="ind-teor-rectangle" style="background-image:url(./img/Teor-img/8.jpg);"></div></a>
                    <a href="./Teor-php/teor8.php"><p class="teor-p">Технология ремонта разрушенных поверхностей</p></a>
                    </div>
                    <div class="teor-flex-content-rectangle">
                    <a href="./Teor-php/teor9.php"><div class="ind-teor-rectangle" style="background-image:url(./img/Teor-img/9.jpg);"></div></a>
                    <a href="./Teor-php/teor9.php"><p class="teor-p">Особенности выполнения облицовочных работ зимой</p></a>
                    </div>
                </div>
        </div>
      </main>
</body>
</html>
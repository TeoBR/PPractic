<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Контроль знаний</title>
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
            <img src="./img/Vector/Контроль знаний.svg" alt="" class="vector-size" style= "width:200%">
            </div>
            <div class="aligment-description"> <!--Выравнивание текста-->
                <p class="teor-h1">Контроль знаний</p>
                <p class="ind-teor-p" style="color: white;">Раздел "Контроль знаний" на нашем сайте предоставляет полезные ресурсы для проверки и укрепления вашего понимания ключевых концепций и навыков в области облицовки поверхностей. Мы стремимся предоставить структурированный и понятный контент, который обеспечит эффективное освоение материала и поможет вам достичь успеха в данной области.
             </div>   
        </div>

        <div class="ind-teor-dek-rectangle"> <!--Декоративный прямоугольник-->
        </div>

        <div class="nav"><!--Контейнер заполняющий нижнюю часть страницы цветом-->
        
            <div class="icon-contr-flex" style="padding-top:30px"> <!--Контейнер с 5-ю тестами-->
                <a href=""><img src="./img/VectorIcon/КонтрольЗнаний/1.svg" class="icon-contr"></a>
                <a href=""><img src="./img/VectorIcon/КонтрольЗнаний/2.svg" class="icon-contr"></a>
                <a href=""><img src="./img/VectorIcon/КонтрольЗнаний/3.svg" class="icon-contr"></a>
                <a href=""><img src="./img/VectorIcon/КонтрольЗнаний/4.svg" class="icon-contr"></a>
                <a href=""><img src="./img/VectorIcon/КонтрольЗнаний/5.svg" class="icon-contr"></a>
            </div>
            <div class="icon-contr-flex"> <!--Контейнер с 5-ю тестами-->
                <a href=""><img src="./img/VectorIcon/КонтрольЗнаний/6.svg" class="icon-contr"></a>
                <a href=""><img src="./img/VectorIcon/КонтрольЗнаний/7.svg" class="icon-contr"></a>
                <a href=""><img src="./img/VectorIcon/КонтрольЗнаний/8.svg" class="icon-contr"></a>
                <a href=""><img src="./img/VectorIcon/КонтрольЗнаний/9.svg" class="icon-contr"></a>
                <a href=""><img src="./img/VectorIcon/КонтрольЗнаний/10.svg" class="icon-contr"></a>
            </div>
            <div class="icon-contr-flex"> <!--Контейнер с 5-ю тестами-->
                <a href=""><img src="./img/VectorIcon/КонтрольЗнаний/11.svg" class="icon-contr"></a>
                <a href=""><img src="./img/VectorIcon/КонтрольЗнаний/12.svg" class="icon-contr"></a>
                <a href=""><img src="./img/VectorIcon/КонтрольЗнаний/13.svg" class="icon-contr"></a>
                <a href=""><img src="./img/VectorIcon/КонтрольЗнаний/14.svg" class="icon-contr"></a>
                <a href=""><img src="./img/VectorIcon/КонтрольЗнаний/15.svg" class="icon-contr"></a>
            </div>
        </div>
    </div>
      </main>
</body>
</html>
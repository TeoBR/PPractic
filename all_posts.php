<!DOCTYPE html>
<html  style="background-image: url(./img/фон_посты.jpg); background-repeat: no-repeat; background-size:cover;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_new.css" />
    <script src="./main.js"></script>
    <title>Просмотр постов</title>
</head>
<?php 
    if($_COOKIE['user'] == ''):
 ?>
 <?php include "./PHP/include/header_all.php"; ?>
 <?php else: 
   include "./PHP/include/header_LogIn.php";
 ?>
 <?php endif; ?>
<body>
<?php
include "./PHP/include/check_whois.php";
    // Подключаемся к базе данных
    $db_connection = mysqli_connect("localhost", "root", "", "register");

    // Проверяем соединение с базой данных
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

    // Подготавливаем запрос для извлечения всех постов из базы данных с информацией о пользователе
    $query = "SELECT posts.*, users.name AS author_name
    FROM posts
    LEFT JOIN users ON posts.user_id = users.id
    ORDER BY posts.created_at DESC";

    $result = mysqli_query($db_connection, $query);
?>

<div style="display:flex; flex-direction: column;">
<div class="background-theme">
<p class="teor-h1" style="font-size: 20px">Темы</p>
<div class="posts-container">
<?php
    // Проверка соединения
    if ($db_connection->connect_error) {
        die("Connection failed: " . $db_connection->connect_error);
    }

    // Запрос для получения списка тем
    $sql = "SELECT `id-theme`, `name` FROM themes"; // Используем обратные кавычки для id-theme
    $result_theme = $db_connection->query($sql);

    if ($result_theme->num_rows > 0) {
        // Вывод списка тем
        while($row = $result_theme->fetch_assoc()) {
            // Добавляем атрибут onclick для вызова JavaScript функции при клике на тему
            echo "<div id='theme-{$row["id-theme"]}' class='theme-item' style='width:100%; min-height:50px; background-color:#1f2022; 
    box-shadow: 0px 0px 11px 0px #000000;margin-bottom:2px;
    display:flex;justify-content: space-between; align-items: center;flex-direction:row;' data-theme-id='{$row["id-theme"]}'>";
            echo "<a href='javascript:void(0);' onclick='setActiveTheme({$row["id-theme"]});' style='color:white;'>".$row["name"]."</a><br>";
            if ($isTeacher):
            echo "<a href=./PHP/delete_theme.php?id-theme={$row['id-theme']}\'><img src='./img/VectorIcon/close.svg' class='close-modal'></a>";
            endif;
            echo "</div>";
        }
    } else {
        echo "0 results";
    }    
?>    
</div>
<?php if ($isTeacher): ?>
<div style="position:absolute; bottom:0">
     <button style="width:auto; margin-right:5px; border-radius: 10px" onclick="openModal('add_theme')">Новая тема</button>
     <button style="width:auto; border-radius: 10px" onclick="openModal('add_post')">Новый пост</button>
</div>
<?php endif; ?>
</div>
  <!-- Полупрозрачный фон -->
  <div class="overlay" onclick="closeAllModals()"></div>
  <!--Модальное окно 1-->
  <div id="add_theme" class="modal">
    <img src="./img/add_theme.jpg" class="modal-img">
    <div class="modal-txt modal-font" style="width:300px">
      <p style="font-family: steamy; font-size: 25px;">Добавить тему</p>  
      <img src="./img/VectorIcon/close.svg" class="close-modal" onclick="closeModal('add_theme')">
      <form action="./PHP/theme_add.php" method="post">
        <label for="theme_name">Название темы:</label>
        <input type="text" id="theme_name" name="theme_name">
        <input type="submit" value="Добавить">
    </form>
    </div>
  </div>
   <!--Модальное окно 2-->
   <div id="add_post" class="modal">
    <img src="./img/add_theme.jpg" class="modal-img">
    <div class="modal-txt modal-font" style="width:400px">
      <p style="font-family: steamy; font-size: 25px;">Добавить пост</p>  
      <img src="./img/VectorIcon/close.svg" class="close-modal" onclick="closeModal('add_post')">
      <form action="./post.php" method="post" enctype="multipart/form-data">
    <textarea name="post_content" rows="4" cols="50" placeholder="Введите ваш пост здесь..." style="border-radius:5px"></textarea><br>
    <p>Изображение</p>
    <input type="file" name="post_image" style="border-radius:5px; width:386.4px"> <!-- Добавляем поле для загрузки изображения -->
    <p>Файл</p>  
    <input type="file" name="post_file" style="border-radius:5px; width:386.4px">
    <input type="hidden" name="id-theme" id="id-theme" value="">
    <input type="submit" value="Опубликовать" style="border-radius:5px;width:386.4px">
</form>
    </div>
  </div>
<div style="margin-top: 20px">
<div id="posts-container">
    <?php include 'view_posts.php'; ?>
</div>
</div>
</div>
<?php
// Закрываем соединение с базой данных
mysqli_close($db_connection);
?>
<script>

    // Функция для обработки клика на тему
    function setActiveTheme(themeId) {
        document.getElementById("id-theme").value = themeId;
        // Получаем все элементы с классом "theme-item"
        var themeItems = document.getElementsByClassName("theme-item");

        // Проходимся по всем элементам и сбрасываем стиль
        for (var i = 0; i < themeItems.length; i++) {
            themeItems[i].style.backgroundColor = "#1f2022";
        }

        // Устанавливаем цвет для выбранной темы
        var selectedTheme = document.getElementById("theme-" + themeId);
        selectedTheme.style.backgroundColor = "#616161";

        // Отправляем AJAX запрос на сервер с id выбранной темы
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "view_posts.php?id-theme=" + themeId, true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // При успешном ответе заменяем содержимое контейнера с постами новым содержимым
                document.getElementById("posts-container").innerHTML = xhr.responseText;
            }
        };
        xhr.send();
    }
</script>


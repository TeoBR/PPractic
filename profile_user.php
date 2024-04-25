<?php
// Проверяем, авторизован ли пользователь
if (!isset($_COOKIE['user'])) {
    header('Location: index.php'); // Перенаправляем на страницу входа, если пользователь не авторизован
    exit();
}

$userId = $_COOKIE['user'];

$mysql = new mysqli('localhost', 'root', '', 'register');

if ($mysql->connect_error) {
    die("Ошибка подключения к базе данных: " . $mysql->connect_error);
}

// Получаем информацию о пользователе из таблицы `users`
$result = $mysql->query("SELECT * FROM `users` WHERE `id` = '$userId'");
if (!$result) {
    die("Ошибка выполнения запроса: " . $mysql->error);
}
$user = $result->fetch_assoc();

// Проверяем, является ли пользователь преподавателем
$isTeacher = ($user['regcode'] == 1);

// Получаем дополнительную информацию о пользователе из соответствующей таблицы
if ($isTeacher) {
    // Если пользователь - преподаватель
    $infoResult = $mysql->query("SELECT * FROM `profile_teacher` WHERE `id` = '$userId'");
} else {
    // Если пользователь - студент
    $infoResult = $mysql->query("SELECT * FROM `profile_student` WHERE `id` = '$userId'");
}
if (!$infoResult) {
    die("Ошибка выполнения запроса: " . $mysql->error);
}
$info = $infoResult->fetch_assoc();

$mysql->close();
?>

<!DOCTYPE html>
<html lang="en" style = "background-color:#D0CCB3">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_new.css" />
    <script src="./main.js"></script>
    <title>Профиль пользователя</title>
    <style>
        span{
  font-size: 20px;
  color:#1f2022;
  font-family: steamy;
        }
        p{
            color:#1f2022;
            
        }
    </style>
</head>
<body>
    <div style="background-image: url(./img/фон_профиль.jpg); background-size:contain;">
    <?php include "./PHP/include/header_LogIN.php"; ?>
    <p class = "teor-h1" style = "justify-content: start; margin-left: 20px">Профиль пользователя <?php echo $user['name'] ?></p>
     <!-- Добавляем вывод аватара пользователя, если он есть -->
     <?php if (!empty($info['avatar'])): ?>
        <img src="<?php echo $info['avatar']; ?>" alt="Аватар" style = 'border-radius: 50px; width: 200px; height:200px; 
        object-fit: cover; margin-left:20px; margin-bottom:0'>
    <?php endif; ?>
     </div>
    <div style = "margin-left:20px; color: rgba(83, 80, 25, 0.6980392157);font-size: 20px">
    <p><span>ФИО пользователя:</span> <?php echo $user['surname']; ?> <?php echo $user['name']; ?> <?php echo $user['patronymic']; ?></p>
    <p><span>Email: </span><?php echo $user['email']; ?></p>
    <?php if ($isTeacher): ?>
        <p><span>Группа, которую ведет: </span><?php echo $info['supervised_group']; ?></p>
        <p><span>Аудитория: </span><?php echo $info['classroom']; ?></p>
    <?php else: ?>
        <p><span>Группа студента: </span><?php echo $info['student_group']; ?></p>
        <p><span>Преподаватель: </span><?php echo $info['tutor']; ?></p>
    <?php endif; ?>
    <?php if ($isTeacher){
      echo '<button style= "width: 100px;" onclick="openModal(`Edit_profile_Teacher`)">Изменить</button>';
    }
    else{
        echo '<button style= "width: 100px;" onclick="openModal(`Edit_profile_Student`)">Изменить</button>';
    }
    ?>
    <a href="./PHP/Validation-forms/exit.php"><button style= "width: 100px;">Выйти</button></a> <!-- Добавьте ссылку на страницу выхода --> 
     </div>

     <!--Редактирование-->
          <!-- Первое модальное окно учащегося-->
  <div id="Edit_profile_Teacher" class="modal" style="height: auto;">
    <img src="./img/фон_профиль.jpg" class="modal-img">
    <p style="font-family: steamy; font-size: 25px; position: absolute; top: -22%; right: 5%;color: white">Редактирование</p>  
    <div class="modal-txt modal-font" style="display: flex; flex-direction: column; align-items: end;">
      <img src="./img/VectorIcon/close.svg" class="close-modal" onclick="closeModal('Edit_profile_Teacher')">
      <form action="edit_profile_teacher.php" method="post" enctype="multipart/form-data">
    <?php if ($isTeacher): ?>
        <label for="supervised_group">Группа, которую ведет:</label>
        <input type="text" name="supervised_group" value="<?php echo $info['supervised_group']; ?>"><br>

        <label for="classroom">Аудитория:</label>
        <input type="text" name="classroom" value="<?php echo $info['classroom']; ?>"><br>
    <?php else: ?>
        <label for="student_group">Группа:</label>
        <input type="text" name="student_group" value="<?php echo $info['student_group']; ?>"><br>

        <label for="tutor">Преподаватель:</label>
        <input type="text" name="tutor" value="<?php echo $info['tutor']; ?>"><br>
    <?php endif; ?>

    <label for="avatar">Аватар:</label>
    <input type="file" name="avatar"><br>

    <input type="submit" value="Сохранить изменения">
    </form>
    </div>
  </div>
  <!-- Полупрозрачный фон -->
  <div class="overlay" onclick="closeAllModals()"></div>
  <div id="Edit_profile_Student" class="modal" style="height: auto;">
    <img src="./img/фон_профиль.jpg" class="modal-img">
    <p style="font-family: steamy; font-size: 25px; position: absolute; top: -22%; right: 5%;color: white">Редактирование</p>  
    <div class="modal-txt modal-font" style="display: flex; flex-direction: column; align-items: end;">
      <img src="./img/VectorIcon/close.svg" class="close-modal" onclick="closeModal('Edit_profile_Student')">
      <form action="edit_profile.php" method="post" enctype="multipart/form-data">
    <label for="student_group">Группа:</label>
    <input type="text" name="student_group" value="<?php echo $info['student_group']; ?>"><br>

    <label for="tutor">Преподаватель:</label>
    <input type="text" name="tutor" value="<?php echo $info['tutor']; ?>"><br>

    <label for="avatar">Аватар:</label>
    <input type="file" name="avatar"><br>

    <input type="submit" value="Сохранить изменения">
    </form>
    </div>
  </div>
</body>
</html>

<?php
$userId = $_COOKIE['user'];

$mysql = new mysqli('localhost', 'root', '', 'register');

if ($mysql->connect_error) {
    die("Ошибка подключения к базе данных: " . $mysql->connect_error);
}

// Получаем информацию о пользователе из таблицы `users`
$whois = $mysql->query("SELECT * FROM `users` WHERE `id` = '$userId'");
if (!$whois) {
    die("Ошибка выполнения запроса: " . $mysql->error);
}
$user = $whois->fetch_assoc();

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
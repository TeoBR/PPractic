<?php
$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);

$password = md5($password . "oiuyak");

$mysql = new mysqli('localhost', 'root', '', 'register');

if ($mysql->connect_error) {
    die("Ошибка подключения к базе данных: " . $mysql->connect_error);
}

$result = $mysql->query("SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password'");

if (!$result) {
    die("Ошибка выполнения запроса: " . $mysql->error);
}

$user = $result->fetch_assoc();

if (!$user) {
    echo "Такой пользователь не найден";
    exit();
}

    setcookie('user', $user['id'], time() + 3600 * 24 * 30, "/");


$mysql->close();

header('Location: ../../index.php');
?>

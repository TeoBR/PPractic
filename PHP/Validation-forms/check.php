<?php
$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING); 
$surname = filter_var(trim($_POST['surname']), FILTER_SANITIZE_STRING); 
$patronymic = filter_var(trim($_POST['patronymic']), FILTER_SANITIZE_STRING); 
$age = filter_var(trim($_POST['age']), FILTER_SANITIZE_STRING); 
$gender = filter_var(trim($_POST['gender']), FILTER_SANITIZE_STRING); 
$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING); 
$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);
$regcode = filter_var(trim($_POST['regcode']), FILTER_SANITIZE_STRING);  
if(mb_strlen($password)<5){
    echo "Пароль слишком маленький!";
    exit();
} else if(mb_strlen($name)>50){
    echo "Недопустимая длина имени";
    exit();
} else if(mb_strlen($surname)>50){
    echo "Недопустимая длина Фамилии";
    exit();
} else if(mb_strlen($patronymic)>50){
    echo "Недопустимая длина отчества";
    exit();
}
$regcodeValue = ($regcode === "teachkst") ? 1 : 0;

$password = md5($password . "oiuyak");

$mysql = new mysqli('localhost','root','','register');

$query = $mysql->query("SELECT * FROM `users` WHERE `email` = '$email'");
if ($query->num_rows > 0) {
    echo "Этот адрес электронной почты уже используется.";
    exit();
}

$mysql->query("INSERT INTO `users` (`name`, `surname`, `patronymic`, `age`, `gender`, `email`, `password`,`regcode`)
VALUES ('$name', '$surname', '$patronymic', '$age', '$gender', '$email', '$password', '$regcodeValue')");

header('Location: ../../index.php');

$mysql->close();

?>
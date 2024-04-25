<?php
// Подключение к базе данных
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "register";

$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка соединения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Обработка запроса на добавление новой темы
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $theme_name = $_POST["theme_name"];
    
    // Подготовка SQL запроса
    $sql = "INSERT INTO themes (name) VALUES ('$theme_name')";

    if ($conn->query($sql) === TRUE) {
        header('Location: ../all_posts.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

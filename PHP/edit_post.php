<?php
// Подключаемся к базе данных
$db_connection = mysqli_connect("localhost", "root", "", "register");

// Проверяем соединение с базой данных
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

// Проверяем, была ли отправлена форма для изменения поста
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edited_post_content'])) {
    $edited_post_content = $_POST['edited_post_content'];
    $edit_post_id = $_POST['edit_post_id'];
    
    // Подготавливаем запрос для обновления содержания поста в базе данных
    $edit_query = "UPDATE posts SET content='$edited_post_content' WHERE id='$edit_post_id'";
    
    // Выполняем запрос
    if (mysqli_query($db_connection, $edit_query)) {
        // Перенаправляем пользователя на страницу с постами
        header('Location: ../all_posts.php');
    } else {
        echo "Ошибка при выполнении запроса на изменение: " . mysqli_error($db_connection);
    }
}

// Закрываем соединение с базой данных
mysqli_close($db_connection);
?>

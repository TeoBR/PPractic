<?php
// Подключение к базе данных
$db_connection = mysqli_connect("localhost", "root", "", "register");

// Проверка соединения с базой данных
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

// Проверяем, был ли отправлен запрос на удаление темы
if (isset($_GET['id-theme'])) {
    // Получаем ID темы из параметра
    $theme_id = intval($_GET['id-theme']);

    // Удаляем все посты связанные с этой темой
    $delete_posts_query = "DELETE FROM `posts` WHERE `id-theme` = $theme_id";
    if (!mysqli_query($db_connection, $delete_posts_query)) {
        echo "Ошибка при удалении постов: " . mysqli_error($db_connection);
    }

    // Запрос на удаление темы из базы данных
    $delete_theme_query = "DELETE FROM `themes` WHERE `id-theme` = $theme_id";
    // Выполняем запрос на удаление
    if (mysqli_query($db_connection, $delete_theme_query)) {
        // Если удаление прошло успешно, перенаправляем на страницу со всеми постами
        header('Location: ../all_posts.php');
    } else {
        echo "Ошибка при удалении темы: " . mysqli_error($db_connection);
    }
}

// Закрываем соединение с базой данных
mysqli_close($db_connection);
?>

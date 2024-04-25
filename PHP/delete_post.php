<?php
// Подключаемся к базе данных
$db_connection = mysqli_connect("localhost", "root", "", "register");

// Проверяем соединение с базой данных
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

// Проверяем, был ли отправлен запрос на удаление поста
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_post_id'])) {
    // Получаем ID пользователя из cookie
    $user_id = $_COOKIE['user'];

    // Получаем ID поста, который нужно удалить
    $post_id = $_POST['delete_post_id'];

    // Подготавливаем запрос для получения информации о посте
    $query = "SELECT user_id FROM posts WHERE id = $post_id";

    // Выполняем запрос
    $result = mysqli_query($db_connection, $query);

    // Проверяем, был ли найден пост
    if (mysqli_num_rows($result) > 0) {
        $post = mysqli_fetch_assoc($result);
        $post_author_id = $post['user_id'];

        // Проверяем, совпадает ли ID пользователя с ID автора поста
        if ($user_id == $post_author_id) {
            // Подготавливаем запрос для удаления поста из базы данных
            $delete_query = "DELETE FROM posts WHERE id = $post_id";

            // Выполняем запрос на удаление
            if (mysqli_query($db_connection, $delete_query)) {
                // Пост успешно удалён
                header('Location: ../all_posts.php');
            } else {
                // Возникла ошибка при удалении
                echo "Ошибка при удалении поста: " . mysqli_error($db_connection);
            }
        } else {
            // Пользователь не авторизован для удаления этого поста
            echo "<h2>Вы не можете удалить этот пост, так как вы не являетесь его автором.</h2>";
        }
    } else {
        // Пост с указанным ID не найден
        echo "<h2>Пост с указанным ID не найден.</h2>";
    }
}

// Закрываем соединение с базой данных
mysqli_close($db_connection);
?>

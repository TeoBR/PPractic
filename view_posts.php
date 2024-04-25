<?php
// Подключаемся к базе данных
$db_connection = mysqli_connect("localhost", "root", "", "register");

// Проверяем соединение с базой данных
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}
// Проверяем, была ли выбрана тема
if (isset($_GET['id-theme'])) {
    // Получаем id темы из GET параметра
    $id_theme = $_GET['id-theme'];

    // Подготавливаем запрос для извлечения постов с определенной темой
    $query = "SELECT posts.*, users.name AS author_name
              FROM posts
              LEFT JOIN users ON posts.user_id = users.id
              WHERE posts.`id-theme` = '$id_theme'
              ORDER BY posts.created_at DESC";

    $result = mysqli_query($db_connection, $query);

    // Проверяем, есть ли посты
    if ($result && mysqli_num_rows($result) > 0) {
        // Выводим каждый пост
        while ($row = mysqli_fetch_assoc($result)) {
            // Получаем ID текущего пользователя из cookie
            $current_user_id = $_COOKIE['user'];
            
            // Получаем ID автора текущего поста
            $post_author_id = $row['user_id'];
    
            // Переменная для отслеживания наличия изображения в текущем посте
            $hasImageInCurrentPost = !empty($row['image_path']);
            
            // Выводим изображение, если оно есть
            if ($hasImageInCurrentPost) {
                echo '<div style="margin-bottom: 30px; display:flex; align-items: center;justify-content: center;">'; // Контейнер для поста с изображением
                echo '<div style = "background-color: #1f2022; width: 500px; border-radius: 30px; display:flex;
                align-items: center; padding: 15px; justify-content: center; ">';
                echo '<div style = "display:flex; flex-direction: column;">';
                echo '<div style = "display:flex; flex-direction: row; justify-content: space-around;">';
                echo '<p style = "color: white;"><strong>Автор:</strong> ' . $row['author_name'] . "</p>";
                echo '<p style = "color: white;"><strong>Дата и время:</strong> ' . $row['created_at'] . "</p>";
                if ($current_user_id == $post_author_id) {
                    echo '<form method="post" action="./PHP/delete_post.php">';
                    echo '<input type="hidden" name="delete_post_id" value="' . $row['id'] . '">';
                    echo '<button type="submit" style = "background-color: #880e2c;">Х</button>';
                    echo '</form>';
                }
                echo '</div>';
                echo '<div style = "display:flex; flex-direction: column; align-items: center;">';
                echo '<img src="' . $row['image_path'] . '" alt="Изображение поста" style = "width: 450px; border-radius: 20px; height: 250px; object-fit: cover">';
                echo '<p style = "color: white;">' . $row['content'] . "</p>";
                echo '</div>';
                echo "</div>";
                echo "</div>";
                echo "</div>"; // Закрываем контейнер для поста с изображением
            } else {
                echo '<div style="margin-bottom: 30px; display:flex; align-items: center;justify-content: center;">'; // Контейнер для поста без изображения
                echo '<div style = "background-color: #1f2022; width: 500px; border-radius: 30px; display:flex;
                align-items: center; padding: 15px; justify-content: center; ">';
                echo '<div style = "display:flex; flex-direction: column;">';
                echo '<div style = "display:flex; flex-direction: row; justify-content: space-around;">';
                echo '<p style = "color: white;"><strong>Автор:</strong> ' . $row['author_name'] . "</p>";
                echo '<p style = "color: white;"><strong>Дата и время:</strong> ' . $row['created_at'] . "</p>";
                if ($current_user_id == $post_author_id) {
                    echo '<form method="post" action="./PHP/delete_post.php">';
                    echo '<input type="hidden" name="delete_post_id" value="' . $row['id'] . '">';
                    echo '<button type="submit" style = "background-color: #880e2c;">Х</button>';
                    echo '</form>';
                }
                echo '</div>';
                echo '<div style = "display:flex; flex-direction: column; align-items: space-around;">';
                echo '<p style = "color: white;">' . $row['content'] . "</p>";
                echo '</div>';
                echo "</div>";
                echo "</div>"; // Закрываем контейнер для поста без изображения
                echo "</div>";
            }
        }
    } else {
        echo "<p>Постов с выбранной темой пока нет.</p>";
    }
} else {
    echo "<p>Тема не выбрана.</p>";
}
?>
<?php
// Путь для сохранения загруженных изображений
$upload_directory = "./uploads/post/";

// Проверяем, был ли загружен файл
if(isset($_FILES['post_image']) && $_FILES['post_image']['error'] === UPLOAD_ERR_OK) {
    // Получаем информацию о загруженном файле
    $file_name = $_FILES['post_image']['name'];
    $file_tmp = $_FILES['post_image']['tmp_name'];
    $file_size = $_FILES['post_image']['size'];
    
    // Перемещаем файл из временной директории в заданную
    $destination = $upload_directory . $file_name;
    move_uploaded_file($file_tmp, $destination);
    
    // Теперь $destination содержит путь к загруженному файлу, который вы можете сохранить в базе данных или использовать в вашем приложении
}

// Подключаемся к базе данных
$db_connection = mysqli_connect("localhost", "root", "", "register");

// Проверяем соединение с базой данных
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}
// Проверяем, была ли отправлена форма и значение theme_id установлено
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id-theme']) && !empty($_POST['id-theme'])) {
    // Получаем данные из формы
    $post_content = $_POST['post_content'];
    $user_id = $_COOKIE['user']; // Получаем ID пользователя из cookie
    $id_theme = $_POST['id-theme']; // Получаем ID выбранной темы из скрытого поля

    // Проверяем, является ли значение theme_id целым числом
    if (!is_numeric($id_theme)) {
        echo "Ошибка: ID темы должен быть целым числом.";
        exit;
    }

    // Подготавливаем запрос для вставки данных поста в базу данных
    $query = "INSERT INTO posts (`content`, `user_id`, `image_name`, `image_path`, `id-theme`) 
              VALUES ('$post_content', '$user_id', '$file_name', '$destination', '$id_theme')";

    // Выполняем запрос
    if (mysqli_query($db_connection, $query)) {
        header('Location: ./all_posts.php');
    } else {
        echo "Ошибка при выполнении запроса: " . mysqli_error($db_connection);
    }
} else {
    echo "Ошибка: ID темы не передан или пуст.";
    exit;
}

// Закрываем соединение с базой данных
mysqli_close($db_connection);
?>

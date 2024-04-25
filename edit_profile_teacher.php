<?php
// Подключение к базе данных
$mysql = new mysqli('localhost', 'root', '', 'register');
if ($mysql->connect_error) {
    die("Ошибка подключения к базе данных: " . $mysql->connect_error);
}

// Проверка наличия данных из формы
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получение данных из формы
    $userId = $_COOKIE['user']; // Предполагается, что ID пользователя хранится в cookie

    $supervisedGroup = $_POST['supervised_group'];
    $classroom = $_POST['classroom'];

    // Проверка наличия записи в таблице profile_teacher для данного пользователя
    $checkQuery = "SELECT * FROM `profile_teacher` WHERE `id` = '$userId'";
    $checkResult = $mysql->query($checkQuery);
    
    // Если запись отсутствует, выполнить INSERT-запрос
    if ($checkResult->num_rows == 0) {
        $insertQuery = "INSERT INTO `profile_teacher` (`id`, `supervised_group`, `classroom`) VALUES ('$userId', '$supervisedGroup', '$classroom')";
        if ($mysql->query($insertQuery) !== TRUE) {
            echo "Ошибка при добавлении новой записи: " . $mysql->error;
        }
    } else {
        // Если запись существует, выполнить UPDATE-запрос
        $updateQuery = "UPDATE `profile_teacher` SET `supervised_group` = '$supervisedGroup', `classroom` = '$classroom' WHERE `id` = '$userId'";
        if ($mysql->query($updateQuery) !== TRUE) {
            echo "Ошибка при обновлении информации: " . $mysql->error;
        }
    }

 

    // Обработка загрузки аватара, если он был выбран
    if ($_FILES['avatar']['name']) {
        $avatarName = $_FILES['avatar']['name'];
        $avatarTmpName = $_FILES['avatar']['tmp_name'];

        // Путь к директории для загрузки аватара
        $uploadDir = "./uploads/avatar/";
        $avatarPath = $uploadDir . $avatarName;

        // Перемещение загруженного файла в указанную директорию
        if (move_uploaded_file($avatarTmpName, $avatarPath)) {
            // SQL-запрос на обновление пути к аватару в таблице profile_teacher
            $avatarUpdateQuery = "UPDATE `profile_teacher` SET `avatar` = '$avatarPath' WHERE `id` = '$userId'";

            // Выполнение SQL-запроса на обновление пути к аватару
            if ($mysql->query($avatarUpdateQuery) === TRUE) {
                echo "Аватар успешно загружен";
            } else {
                echo "Ошибка при загрузке аватара: " . $mysql->error;
            }
        } else {
            echo "Ошибка загрузки файла.";
        }
    }
} else {
    echo "Ошибка: данные не получены из формы.";
}


// Закрытие соединения с базой данных
$mysql->close();

// Перенаправление на страницу профиля пользователя
header('Location: ./profile_user.php');
?>

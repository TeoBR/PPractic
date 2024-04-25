<!DOCTYPE html>
<html  style="background-image: url(./img/фон.jpg); background-repeat: no-repeat; background-size:cover;">
  <head>
        <link rel="stylesheet" href="style_new.css" />
        <script src="./main.js"></script>
        <title>Обучающий ресурс</title>
        <style>
          form {
  background-color: #A79474;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  padding: 20px;
  border-radius: 8px;
  width: auto;
  opacity: 90%;
}
        </style>
      </head>
      <body>
      <?php 
// Проверяем, авторизован ли пользователь
if (isset($_COOKIE['user'])) {
    header('Location: index.php'); // Перенаправляем на страницу входа, если пользователь не авторизован
    exit();
}
    include "./PHP/include/header_all.php";

?>
      <div style="display: flex; justify-content: center; margin-top: 10px;">
    <form action="./PHP/Validation-forms/check.php" method="post">
      <div style="font-size: 25px; font-family: Steamy; display: flex; justify-content: center;color: #ffffff;">
        <p>Регистрация</p>
      </div>
      <div style="display: flex; flex-wrap: nowrap;">
        <div style="display: flex; flex-direction: column;">
      <label for="name">Имя:</label>
      <input type="text" id="name" name="name" required>
        </div>
        <div  style="display: flex; flex-direction: column; margin-left: 20px;">
      <label for="surname">Фамилия:</label>
      <input type="text" id="surname" name="surname" required>
        </div>
      </div>
      <label for="patronymic">Отчество:</label>
      <input type="text" id="patronymic" name="patronymic">
    <div style="display: flex; flex-wrap: nowrap;">
      <div style="display: flex; flex-direction: column;">
        <label for="age">Возраст:</label>
      <input type="number" id="age" name="age" required>
      </div>
      <div style="display: flex; flex-direction: column; margin-left: 20px;">
      <label for="gender">Пол:</label>
      <select id="gender" name="gender" required>
        <option value="male">Мужской</option>
        <option value="female">Женский</option>
      </select>
      </div>
    </div>
      <label for="email">E-mail:</label>
      <input type="email" id="email" name="email" required>
    
      <label for="password">Пароль:</label>
      <input type="password" id="password" name="password" required>
      <label for="regcode">Код (не обязательно):</label>
      <input type="regcode" id="regcode" name="regcode" style="margin-bottom: 20px;">
      <button type="submit" name="register">Зарегистрироваться</button>
    </form>
  </div>
  
    </body>
</html>
<header>
      <div>
      <img src="Card/img/logo.svg" alt="" style="width: 70px;">
      </div>
      <ul class="nav-list">
      <li><a href="../index.php">Главная</a></li>
      <div class="dropdown">
      <li><a href="../teor.php">Теоретический материал</a></li>
      <div class="dropdown-content">
          <a href="../Teor-php/teor1.php">Общие сведения...</a>
          <a href="../Teor-php/teor2.php">Инструменты, присп... </a>
          <a href="../Teor-php/teor3.php">Подготовка плит...</a>
          <a href="../Teor-php/teor4.php">Приготовление рас...</a>
          <a href="../Teor-php/teor5.php">Подготовка вер...</a>
          <a href="../Teor-php/teor6.php">Отделка и уход...</a>
          <a href="../Teor-php/teor7.php">Технология рем...</a>
          <a href="../Teor-php/teor8.php">Выполнение обли...</a>
          <a href="../Teor-php/teor9.php">Охрана труда...</a>
      </div>
      </div>
      <div class="dropdown">
      <li><a href="../texno.php">Технологические карты</a></li>
      <div class="dropdown-content">
          <a href="../Card/Chapter-1.php">Глава 1</a>
          <a href="../Card/Chapter-2.php">Глава 2</a>
          <a href="../Card/Chapter-3.php">Глава 3</a>
          <a href="../Card/Chapter-4.php">Глава 4</a>
          <a href="../Card/Chapter-5.php">Глава 5</a>
          <a href="../Card/Chapter-6.php">Глава 6</a>
      </div>
      </div>
      <li><a href="../slovar.php">Словарь</a></li>
      <li><a href="../contr.php">Контроль знаний</a></li>
      <li><a href="../all_posts.php" class="last-chield">Темы</a></li>
      </ul>
      <div style = "display: flex; flex-direction: row; align-items: center;justify-content: spase-around;">
      <a href = "../profile_user.php"><img src="../img/VectorIcon/reg-user.svg" style="width: 50px; margin-right: 30px"  class="filter-icon"></a>

        <div style = "width: 70px; background-color: #1f2022; height: 50px; border-radius: 20px; display: flex; 
        align-items: center; justify-content: center"><a href="../PHP/Validation-forms/exit.php"><p style="color: white;">Выход</p></a></div>
      
      </div>
      <?php 
// Проверяем, авторизован ли пользователь
if (!isset($_COOKIE['user'])) {
    header('Location: ../../index.php'); // Перенаправляем на страницу входа, если пользователь не авторизован
    exit();
}
?>
      
  </header>
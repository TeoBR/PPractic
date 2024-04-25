<header>
      <div>
      <img src="Card/img/logo.svg" alt="" style="width: 70px;">
      </div>
      <ul class="nav-list">
      <li><a href="index.php">Главная</a></li>
      <li><a href="./slovar.php">Словарь</a></li>
      </ul>
      <ul>
        <a href="register.php"><img src="./img/VectorIcon/user-add.svg" style="width: 40px;"  class="filter-icon"></a> 
      </ul>
      <ul>
        <img src="./img/VectorIcon/user.svg" style="width: 40px;cursor:pointer;"  class="filter-icon" onclick="openModal('LogIN')">
      </ul>

           <!-- Первое модальное окно -->
  <div id="LogIN" class="modal" style="height: 35%;">
    <img src="./img/фон.jpg" class="modal-img">
    <p style="font-family: steamy; font-size: 25px; position: absolute; top: -30%; right: 5%;">Вход</p>  
    <div class="modal-txt modal-font" style="display: flex; flex-direction: column; align-items: end;">
      <img src="./img/VectorIcon/close.svg" class="close-modal" onclick="closeModal('LogIN')">
      <form action="./PHP/Validation-forms/LogIN.php" method="post">
        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required>
      
        <label for="password">Пароль:</label>
        <input type="password" id="password" name="password" required>
      
        <button type="submit">Войти</button>
      </form>
    </div>
  </div>
   <!-- Полупрозрачный фон -->
   <div class="overlay" onclick="closeAllModals()"></div>
  </header>
  
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="style_new.css" />
    <script src="./main.js"></script>
    <!--Подключение JQ и слайдера -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
  
    <title>Обучающий ресурс</title>
  </head>
  <body style="background-image: url(./img/back_index.jpg); background-size:contain;">
  <!--Если не в аккаунте-->
 <?php 
    if($_COOKIE['user'] == ''):
 ?>
 <?php include "./PHP/include/header_all.php"; ?>
 <?php else: 
   include "./PHP/include/header_LogIn.php";
 ?>
 <?php endif; ?>


    <main>
      <div>
        <div class="text-1"><p>Технология облицовки<br>поверхностей</p></div>
        <div class="text-2"><p>Электронный обучающий курс</p></div>
        <div class="tile"> <img src="img/Tile.png" alt=""></div>
      </div>
      <div class="nav">
        <div class="teor-vraper" style="padding-top: 50px;"> <!--Использованы стили из Теоритических материалов-->
          <div class="teor-flex-content-rectangle"> <!--Тут тоже использованы стили из теор.мат.-->
            <a href="register.php"><img src="img/VectorIcon/Теоритический материал 1.svg" alt="" class="index-icon-href"></a>
            <a href="register.php"><p class="teor-p" style="text-align: center;">Теоретический<br>материал</p></a>
          </div>
          <div class="teor-flex-content-rectangle">
            <a href="register.php"><img src="img/VectorIcon/ТехнологическиеКарты.svg" alt="" class="index-icon-href"></a>
            <a href="register.php"><p class="teor-p" style="text-align: center;">Технологические<br>карты</p></a>
          </div>
          <div class="teor-flex-content-rectangle">
            <a href="slovar.php"><img src="img/VectorIcon/Словарь.svg  " alt="" class="index-icon-href"></a>
            <a href="slovar.php"><p class="teor-p" style="text-align: center;">Словарь</p></a>
          </div>
          <div class="teor-flex-content-rectangle">
            <a href="register.php"><img src="img/VectorIcon/Контроль знаний.svg" alt="" class="index-icon-href"></a>
            <a href="register.php"><p class="teor-p" style="text-align: center;">Контроль<br>знаний</p></a>
          </div>
        </div>
        <div class="text-1" style="margin-bottom: 50px;"><p style="color:#535019B2;text-align: center;">О курсе</p></div>
        <!--Слайдер с фотками-->
        <div class="index-flex-inf">
        <div class="content">
          <div class="slider single-item">
            <div>
            <img src="./img/Index-slider/1.jpg" class="index-img-slider">
            </div>
            <div>
              <img src="./img/Index-slider/2.jpg" class="index-img-slider">
            </div>
            <div>
              <img src="./img/Index-slider/3.jpg" class="index-img-slider">
            </div>
            <div>
              <img src="./img/Index-slider/4.jpg" class="index-img-slider">
            </div>
            <div>
              <img src="./img/Index-slider/9.jpg" class="index-img-slider">
            </div>
            <div>
              <img src="./img/Index-slider/8.jpg" class="index-img-slider">
            </div>
          </div>
        </div>
        <!--Скрипт для слайдера-->
        <script>
            $(".single-item").slick({
              dots: true,
              infinite: true,
              speed: 500,
              slidesToShow: 1,
              slidesToScroll: 1
            });
        </script>
          <p class="ordinary-p-text">
            Электронный учебный курс предназначен для изучения технологии облицовочных работ при подготовке квалифицированных 
            рабочих по квалификации "Облицовщик-плиточник".<br>
            Современное строительство при проведении облицовочных работ применяет индустриальные методы, 
            но достаточно большое число работ выполняют с помощью ручного труда, что влияет на конечную стоимость.<br>
            Качество выполнения работ зависит не только от применяемых материалов и изделий, но и от знаний и умений 
            специалиста-отделочника, его квалификации. Специалист должен знать технологическую последовательность выполнения работ, 
            необходимость применения определённых клеёв и мастик для крепления различных материалов, нужную толщину клеящей прослойки, 
            соблюдать необходимые технологические перерывы для высокого качества работ. 
          </p>
        </div>


        <div  class="text-1"><p style="text-align: center; color: #535019B2; margin-bottom: 40px;">Интересные факты</p></div>
            <div class="index-facts-flex">
          <div class="index-facts" style="background-image: url(./img/Index-facts/1.jpg);cursor:pointer;" onclick="openModal('fact1')"></div>
          <div class="index-facts" style="background-image: url(./img/Index-facts/2.jpg);cursor:pointer;" onclick="openModal('fact2')"></div>
          <div class="index-facts" style="background-image: url(./img/Index-facts/3.jpg);cursor:pointer;" onclick="openModal('fact3')"></div>
          <div class="index-facts" style="background-image: url(./img/Index-facts/4.jpg);cursor:pointer;" onclick="openModal('fact4')"></div>
          <div class="index-facts" style="background-image: url(./img/Index-facts/5.jpg);cursor:pointer;" onclick="openModal('fact5')"></div>
            </div>
      </div>
    </main>

  <!-- Полупрозрачный фон -->
  <div class="overlay" onclick="closeAllModals()"></div>
  <!--ФАКТЫ-->
  <!--Модальное окно 1-->
  <div id="fact1" class="modal">
    <img src="./img/Index-facts/1.jpg" class="modal-img">
    <div class="modal-txt modal-font">
      <p style="font-family: steamy; font-size: 25px;">Лазерная обработка</p>  
      <img src="./img/VectorIcon/close.svg" class="close-modal" onclick="closeModal('fact1')">
      <p>Лазеры используются для точной обработки поверхностей, создания текстур, 
        нанесения рисунков или маркировки материалов. Эта технология обеспечивает высокую точность и повышенную 
        эффективность процесса облицовки.
      </p>
    </div>
  </div>
  <!--Модальное окно 2-->
  <div id="fact2" class="modal">
    <img src="./img/Index-facts/2.jpg" class="modal-img">
    <div class="modal-txt modal-font">
      <p style="font-family: steamy; font-size: 25px;">Плазменное напыление</p>  
      <img src="./img/VectorIcon/close.svg" class="close-modal" onclick="closeModal('fact2')">
      <p>Плазменное напыление — это метод облицовки, при котором материал в виде порошка распыляется в плазменном пламени и 
        наносится на поверхность. Этот процесс позволяет создавать тонкие и стойкие покрытия на различных материалах.
      </p>
    </div>
  </div>
  <!--Модальное окно 3-->
  <div id="fact3" class="modal">
    <img src="./img/Index-facts/3.jpg" class="modal-img">
    <div class="modal-txt modal-font">
      <p style="font-family: steamy; font-size: 25px;">Подводная облицовка</p>  
      <img src="./img/VectorIcon/close.svg" class="close-modal" onclick="closeModal('fact3')">
      <p>Технология подводной облицовки используется для защиты подводных конструкций, таких как нефтяные платформы или морские 
        трубопроводы, от коррозии. Этот процесс позволяет наносить защитные покрытия под водой, обеспечивая долговечность и 
        надежность сооружений.
      </p>
    </div>
  </div>
  <!--Модальное окно 4-->
  <div id="fact4" class="modal">
    <img src="./img/Index-facts/4.jpg" class="modal-img">
    <div class="modal-txt modal-font">
      <p style="font-family: steamy; font-size: 25px;">Измельчение материалов</p>  
      <img src="./img/VectorIcon/close.svg" class="close-modal" onclick="closeModal('fact4')">
      <p> Современные технологии облицовки поверхностей включают использование специализированных методов измельчения материалов 
        для создания уникальных текстур и отделочных эффектов. Например, мельчайшие частицы керамики или стекла могут быть 
        интегрированы в покрытия, придавая им особую текстуру или светоотражающие свойства. Этот процесс позволяет достичь 
        высокой декоративности и функциональности поверхностей.
      </p>
    </div>
  </div>
  <!--Модальное окно 5-->
  <div id="fact5" class="modal">
    <img src="./img/Index-facts/5.jpg" class="modal-img">
    <div class="modal-txt modal-font">
      <p style="font-family: steamy; font-size: 25px;">Термообработка</p>  
      <img src="./img/VectorIcon/close.svg" class="close-modal" onclick="closeModal('fact5')">
      <p>Термообработка поверхностей применяется для изменения структуры материала и улучшения его механических свойств. Этот процесс 
        может включать нагревание, охлаждение или нанесение тепловых покрытий, что делает материал более прочным, твердым или стойким 
        к износу.
      </p>
    </div>
  </div>
  </body>
</html>

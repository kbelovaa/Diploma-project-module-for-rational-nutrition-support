  <?php
  session_start();
  require_once 'connect.php';
  ?>

  <!-- Navigation -->
  <!DOCTYPE html>
  <html lang="ru">
      
    <head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Foodie</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" type="text/css" media="screen" href="assets/css/index.css" />
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <link rel="icon" href="images/foodie.jpg" type="image/jpg">

      <!-- jQuery library -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

      <!-- Latest compiled JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    </head>
    
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-red fixed-top">
          <div class="container">
            <a class="navbar-brand" href="index.php" style="padding: 0; margin-top: -10px;"><img src="images/logo.png" alt="Logo" style="width: 50px;"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
              <ul class="nav navbar-nav">
                <li>
                  <a href="index.php" style="width: 84px;">Главная</a>
                </li>
                <li>
                    <a href="faq.php" style="width: 58px;">FAQ</a>
                </li>
                <li>
                    <a href="about_us.php" style="width: 68px;">О нас</a>
                </li>
                <li>
                    <a href="contact_us.php" style="width: 170px;">Свяжитесь с нами</a>
                </li>
                <li>
                    <a href="all_restaurants.php" style="width: 160px;">Все рестораны</a>
                </li>
              </ul>

              <?php

              if(isset($_SESSION['valid'])!=true){
                ?>
                <ul class="nav navbar-nav navbar-right">
                <li><a href="sign_in.php" style="width: 70px;">Вход</a></li>
                <li><a href="sign_up.php" style="width: 92px;">Регистрация</a></li>
                </ul>
              <?php
              }
              else{
                ?>
                <ul class="nav navbar-nav navbar-right">
                <li><a href="profile.php" style="width: 91px;">Профиль</a></li>
                <li><a href="checkout.php" style="width: 84px;">Корзина</a></li>
                <li><a href="logout.php" style="width: 72px;">Выйти</a></li>
                </ul>
                <?php
              }
              ?>

            </div>
          </div>
        </nav>  
    </body>
  </html>
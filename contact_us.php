<!DOCTYPE html>
<html lang="ru">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/foodie.jpg" type="image/jpg">

    <title>Foodie</title>
    
  </head>

  <body>
    <div class="content">
<?php
  include "nav.php";
?>

    <header>
    <?php
      include "carousel.php";
    ?>   
    </header>

    <!-- Page Content -->
    <section class="py-5">
      <div class="container">
        <h1 style="text-align: center;">Оставьте Ваши данные, и мы свяжемся с Вами!</h1>
        
          <!-- Contact us form-->
          <div class="container">
            <div class="col-md-5" id="contact_form" style="margin-left: 310px;">
               <div class="form-area">  
                  <form action="send.php" method="post" role="form">
                    <br style="clear:both;">
                    <h3 style="margin-bottom: 25px; text-align: center;"></h3>
                    <div class="form-group">
                       <input type="text" class="form-control" id="name" name="name" placeholder="* Имя" required>
                    </div>
                    <div class="form-group">
                       <input type="email" class="form-control" id="email" name="email" placeholder="* E-mail" onchange="email_validate(this.value);" required>
                    </div>
                    <div class="form-group">
                       <input type="tel" class="form-control" id="mobile" name="mobile" placeholder="* Телефон" required>
                    </div>
                    <div class="form-group">
                       <input type="text" class="form-control" id="subject" name="subject" placeholder="* Тема" required>
                    </div>
                    <div class="form-group">
                       <textarea class="form-control" type="textarea" id="message" name="text" placeholder="Сообщение" maxlength="140" rows="7"></textarea>
                       <!-- <span class="help-block"><p id="characterLeft" class="help-block ">You have reached the limit</p></span> -->
                    </div>
                    <input type="submit" id="submit" name="submit" class="btn btn-success pull-right" value="Отправить">
                  </form>
               </div>
            </div>
          </div>
      </div>     
    </section>
    </div>

      <!-- Contact us form ends Here-->
<?php
include "footer.php";
?>


  </body>

</html>

<!-- assets -->    
    
    <!-- <script src="assets/js/bootstrap.bundle.js"></script> -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="assets/js/bootstrap.js"></script> -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/source.bootstrap.min.js"></script>
    <!-- <script src="assets/js/contact_us.js"></script> -->
    <!-- <script src="assets/js/dropdown.js"></script> -->
    <!-- <script src="assets/js/jquery.js"></script> -->
    <script src="assets/js/jquery.min.js"></script>
    <!-- <script src="assets/js/payment.js"></script> -->
    <!-- <script src="assets/js/restaurant.js"></script> -->
    <!-- <script src="assets/js/result.js"></script> -->
    <!-- <script src="assets/js/review.js"></script> -->
    <!-- <script src="assets/js/sign_in.js"></script> -->
    <script src="assets/js/sign_up.js"></script>

    <!-- <link href="assets/css/account_header.css" rel="stylesheet"> -->
    <!-- <link href="assets/css/animate.css" rel="stylesheet"> -->
    <!-- <link href="assets/css/bootstrap.css" rel="stylesheet"> -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/source.bootstrap.min.css" rel="stylesheet">
    <!-- <link href="assets/css/bootstrap-grid.css" rel="stylesheet"> -->
    <!-- <link href="assets/css/bootstrap-grid.min.css" rel="stylesheet"> -->
    <!-- <link href="assets/css/bootstrap-reboot.css" rel="stylesheet"> -->
    <!-- <link href="assets/css/bootstrap-reboot.min.css" rel="stylesheet"> -->
    <!-- <link href="assets/css/checkout.css" rel="stylesheet"> -->
    <!-- <link href="assets/css/check-radio.css" rel="stylesheet"> -->
    <!-- <link href="assets/css/contact_us.css" rel="stylesheet"> -->
    <!-- <link href="assets/css/delivery.css" rel="stylesheet"> -->
    <link href="assets/css/half-slider.css" rel="stylesheet">
    <link href="assets/css/index.css" rel="stylesheet">
    <!-- <link href="assets/css/payment.css" rel="stylesheet"> -->
    <!-- <link href="assets/css/profile.css" rel="stylesheet"> -->
    <!-- <link href="assets/css/result.css" rel="stylesheet"> -->
    <!-- <link href="assets/css/review.css" rel="stylesheet"> -->
    <!-- <link href="assets/css/sign_in.css" rel="stylesheet"> -->
    <!-- <link href="assets/css/sign_up.css" rel="stylesheet"> -->
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
        <h1 style="text-align: center; margin-bottom: 30px;">Регистрация</h1>
        
        <!-- Sign up form-->
        <div class="container" style="display:flex; justify-content: center;">
          <div class="row" style="width: 570px; margin-right: 20px;">
              <div class="col-md-12">
                  <form action="regProcess.php" method="post" id="signup" role="form" enctype="multipart/form-data">
                    <fieldset><legend><span class="req"><small>* - обязательные поля для заполнения</small></span></legend>

                    <div class="form-group">
                    <label for="phonenumber"><span class="req">* </span> Номер телефона: </label>
                            <input type="text" name="phone" id="phone" class="form-control phone" maxlength="28" placeholder="не используется для маркетинга" onkeyup="validate_phone(this);" required /> 
                    </div>

                    <div class="form-group">   
                        <label for="firstname"><span class="req">* </span> Имя: </label>
                            <input class="form-control" type="text" name="fname" id = "txt" required /> 
                                <div id="errFirst"></div>    
                    </div>

                    <div class="form-group">
                        <label for="lastname"><span class="req">* </span> Фамилия: </label> 
                            <input class="form-control" type="text" name="lname" id = "txt" required />  
                                <div id="errLast"></div>
                    </div>

                    <div class="form-group">
                        <label for="address"><span class="req">* </span> Адрес: </label> 
                            <input class="form-control" type="text" name="address" id = "address" required />
                    </div>

                    <div class="form-group">
                        <label for="email"><span class="req">* </span> E-mail: </label> 
                            <input class="form-control" type="text" name="email" id = "email" onchange="email_validate(this.value);" required />   
                                <div class="status" id="emstatus"></div>
                    </div>

                    <div class="form-group">
                        <label for="username"><span class="req">* </span> Логин:  <small>Это будет ваше имя пользователя для входа в систему</small> </label> 
                            <input class="form-control" type="text" name="username" id = "txt" onkeyup = "Validate(this)" placeholder="минимум 3 символа" required />  
                                <div id="errLast"></div>
                    </div>

                    <div class="form-group">
                        <label for="password"><span class="req">* </span> Пароль: </label>
                            <input name="password" type="password" class="form-control inputpass" minlength="4" maxlength="16"  id="pass1" required/>
                    </div>

                    <div class="form-group">
                        <label for="image"><span class="req">* </span> Фото: </label>
                        <div class="input__wrapper">
                            <input id="uploadBtn" type="file" name="image" accept="image/*" class="input input__file" required/>
                            <label for="uploadBtn" class="input__file-button">
                                <span class="input__file-icon-wrapper"><img class="input__file-icon" src="./images/add.svg" alt="Выбрать файл" width="20"></span>
                                <span class="input__file-button-text">Выберите файл</span>
                            </label>
                        </div>
                    </div>

                    <div class="form-group" style="width: 158px; margin: 30px auto 0;">
                        <input class="btn btn-success" type="submit" name="submit_reg" value="Зарегистрироваться"/>
                    </div> 

                    </fieldset>
                  </form> <!-- ends register form -->

      <script>
          let inputs = document.querySelectorAll('.input__file');
          Array.prototype.forEach.call(inputs, function (input) {
            let label = input.nextElementSibling,
              labelVal = label.querySelector('.input__file-button-text').innerText;
        
            input.addEventListener('change', function (e) {
              let countFiles = '';
              if (this.files && this.files.length >= 1)
                countFiles = this.files.length;
        
              if (countFiles)
                label.querySelector('.input__file-button-text').innerText = 'Выбран 1 файл';
              else
                label.querySelector('.input__file-button-text').innerText = labelVal;
            });
          });
      </script>
              </div><!-- ends col-6 -->


          </div>
        </div>
      </div>
    </section>
        
<br>
<br>

      <!-- Contact us form ends Here-->

      </div>
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
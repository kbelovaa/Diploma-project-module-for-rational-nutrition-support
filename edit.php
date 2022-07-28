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
include_once 'connect.php';
$sql = "SELECT * FROM user WHERE username = '$_SESSION[username]'" ;
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);
?>
    <!-- Page Content -->
    <section class="py-5">
      <div class="container">
      <button type="button" class="btn btn-primary btn-sm btn-block" onclick="window.location.href = 'profile.php'" style="background: #a6b0b3; border-color: #a6b0b3; width: 200px; margin-left:650px;">
            <span class="glyphicon glyphicon-share-alt"></span> Вернуться в личный кабинет
    </button>
        <h1 style="text-align: center; margin-bottom: 30px;">Введите Ваши актуальные данные</h1>
        
        <!-- Sign up form-->
        <div class="container" style="display:flex; justify-content: center;">
          <div class="row" style="width: 570px; margin-right: 20px;">
              <div class="col-md-12">
                  <form action="editProcess.php" method="post" id="signup" role="form" enctype="multipart/form-data">
                    <fieldset><legend><span class="req"><small>* - обязательные поля для заполнения</small></span></legend>

                    <div class="form-group">
                    <label for="phonenumber"><span class="req">* </span> Номер телефона: </label>
                            <?php echo '<input value="'.$row['phone'].'" type="text" name="phone" id="phone" class="form-control phone" maxlength="28" placeholder="не используется для маркетинга" onkeyup="validate_phone(this);" required />'; ?> 
                    </div>

                    <div class="form-group">   
                        <label for="firstname"><span class="req">* </span> Имя: </label>
                            <?php echo '<input value="'.$row['fname'].'" class="form-control" type="text" name="fname" id = "txt" required />'; ?>
                                <div id="errFirst"></div>    
                    </div>

                    <div class="form-group">
                        <label for="lastname"><span class="req">* </span> Фамилия: </label> 
                            <?php echo '<input value="'.$row['lname'].'" class="form-control" type="text" name="lname" id = "txt" required />'; ?>
                                <div id="errLast"></div>
                    </div>

                    <div class="form-group">
                        <label for="address"><span class="req">* </span> Адрес: </label> 
                            <?php echo '<input value="'.$row['address'].'" class="form-control" type="text" name="address" id = "address" onchange="add_validate(this.value)" required />'; ?>
                                <div class="status" id="addstatus"></div>
                    </div>

                    <div class="form-group">
                        <label for="email"><span class="req">* </span> E-mail: </label> 
                            <?php echo '<input value="'.$row['email'].'" class="form-control" type="text" name="email" id = "email" onchange="email_validate(this.value);" required />'; ?>
                                <div class="status" id="emstatus"></div>
                    </div>

                    <div class="form-group">
                        <label for="image">Фото: </label>
                        <div class="input__wrapper">
                            <input id="uploadBtn" type="file" name="image" accept="image/*" class="input input__file"/>
                            <label for="uploadBtn" class="input__file-button">
                                <span class="input__file-icon-wrapper"><img class="input__file-icon" src="./images/add.svg" alt="Выбрать файл" width="20"></span>
                                <span class="input__file-button-text">Выберите файл</span>
                            </label>
                        </div>
                    </div>

                    <div class="form-group" style="width: 96px; margin: 30px auto 0;">
                        <input class="btn btn-success" type="submit" name="submit_edit" value="Сохранить"/>
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
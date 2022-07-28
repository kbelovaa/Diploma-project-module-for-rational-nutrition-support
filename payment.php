<?php
include_once 'connect.php';
?>
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
    <!-- CheckOut-->
    <div class="container">
        <form action="payment.php" method="post" role="form">
            <fieldset>
            <div class="row" style="justify-content:center">
                        <div class="col-xs-8">
                            <div class="panel panel-info" style="border-color:#a8dca4;">
                                <div class="panel-heading" style="background:#e5fde7; border-color:#e5fde7;">
                                    <div class="panel-title">
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <h5 style="color: #000;"><span class=""></span>Пожалуйста, выберите способ оплаты:</h5>
                                            </div>
                                            <div class="col-xs-6">
                                                    <button type="button" class="btn btn-primary btn-sm btn-block" onclick="window.location.href = 'checkout.php'" style="background: #a6b0b3; border-color: #a6b0b3;">
                                                            <span class="glyphicon glyphicon-share-alt"></span> Вернуться к корзине
                                                    </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-xs-1"></div>
                                        <div class="col-xs-4">
                                        <label class="b-radio">
                                                <input type="radio" class="b-radio_native" name="payment_type" value="Оплата онлайн">
                                                <span class="b-radio_check"></span>
                                                <span>Оплата картой</span>
                                            </label><br>
                                             <img src="images/visa_mastercard.jpg" alt="" width="220">
                                        </div>
                                        <div class="col-xs-2"></div>
                                        <div class="col-xs-4">
                                             <label class="b-radio">
                                                <input type="radio" class="b-radio_native" name="payment_type" value="Оплата курьеру при доставке" checked>
                                                <span style="margin:0 10px 0 0" class="b-radio_check"></span>
                                                <span>Оплата наличными</span>
                                            </label><br>
                                             <img src="images/cash_on_delivery.png"  width="120">
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                                <div class="panel-heading" style="background:#e5fde7; border-color:#e5fde7;">
                                    <div class="panel-title">
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <h5 style="color: #000;"><span class=""></span>Пожалуйста, введите адрес доставки:</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-xs-1"></div>
                                        <div class="col-xs-4">
                                            <div class="form-group">
                                                <?php
                                                $arr = explode(" ", $row['address']);
                                                $c = substr($arr[1], 0, -1);
                                                echo "<label class='label form__label text-left' for='city'>* Город</label><input name='city' id='city' class='form-control' value='$c' required>";
                                                ?>
                                            </div>

                                            <div class="form-group">
                                                <?php
                                                $s = substr($arr[3], 0, -1);
                                                echo "<label class='label form__label text-left' for='street'>* Улица</label><input name='street' id='street' class='form-control' value='$s' required>";
                                                ?>
                                            </div>

                                            <div class="form-group">
                                                <?php
                                                $h = substr($arr[5], 0, -1);
                                                echo "<label class='label form__label text-left' for='building'>* Дом, корпус</label><input name='building' id='building' class='form-control' value='$h' required>";
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-xs-2"></div>
                                        <div class="col-xs-4">
                                            <div class="form-group">
                                                <?php
                                                $f = $arr[7];
                                                echo "<label class='label form__label text-left' for='flat'>* Квартира</label><input name='flat' id='flat' class='form-control' value='$f' required>";
                                                ?>
                                            </div>
                                        
                                            <div class="form-group">
                                                <label class='label form__label text-left' for='porch'>Подъезд</label>
                                                <input name="porch" id="porch" class="form-control">
                                            </div>
                                        
                                            <div class="form-group">
                                                <label class='label form__label text-left' for='floor'>Этаж</label>
                                                <input name="floor" id="floor" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                                    <div class="panel-footer">
                                        <div class="row text-center">
                                            <div class="col-xs-9"></div>
                                            <div class="col-xs-3">
                                                <input name="conf" type="submit" class="btn btn-success btn-block" value="Оформить заказ">
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
            
            </fieldset>
          </form>
        
    </div>
    </div>
<?php
    include "footer.php";
?>
</body>

</html>
<?php
    // получение данных с элементов формы

  if(isset($_POST['conf']) != 0 ){
    $city = $_POST['city'];
    $street = $_POST['street'];
    $building = $_POST['building'];
    $flat = $_POST['flat'];
    $porch = $_POST['porch'];
    $floor = $_POST['floor'];
            
    // обработка полученных данных
    
    $city = stripslashes($city);
    $street = stripslashes($street);
    $building = stripslashes($building);
    $flat = stripslashes($flat);
    $porch = stripslashes($porch);
    $floor = stripslashes($floor);
        
    $city = htmlspecialchars($city);  // преобразование символов в сущности (мнемоники)
    $street = htmlspecialchars($street);
    $building = htmlspecialchars($building);
    $flat = htmlspecialchars($flat);
    $porch = htmlspecialchars($porch);
    $floor = htmlspecialchars($floor);
        
    $city = urldecode($city); // декодирование URL
    $street = urldecode($street);
    $building = urldecode($building);
    $flat = urldecode($flat);
    $porch = urldecode($porch);
    $floor = urldecode($floor);
        
    $city = trim($city); // удаление пробельных символов с обеих сторон
    $street = trim($street);
    $building = trim($building);
    $flat = trim($flat);
    $porch = trim($porch);
    $floor = trim($floor);
     
        
    if ((strlen($city) == 0) || (strlen($street) == 0) || (strlen($building) == 0) || (strlen($flat) == 0)) {
      echo '<script language="javascript">';
      echo 'alert("Пожалуйста, заполните все обязательные поля")';
      echo '</script>';
      header("Refresh: 0; URL = payment.php");
    }

    else {
      $addr = "г. ".$city.", ул. ".$street.", д. ".$building.", кв. ".$flat.", подъезд ".$porch.", этаж ".$floor;
      $payment_type = $_POST['payment_type']; 
      
      if($payment_type ==  "Оплата онлайн"){
          $pay = "Карта";
      }
      if($payment_type == "Оплата курьеру при доставке"){
          $pay = "Наличные";
      }
      $query = "UPDATE cart SET address = '$addr', payment = '$pay', date = '".date('Y-m-d')."' WHERE username = '$_SESSION[username]'";

      mysqli_query($conn,$query);
      
  }
  }
?>
<?php
if(isset($_POST['conf']) != 0){
    
    $sql = "UPDATE cart SET delivery = '1' WHERE username = '$_SESSION[username]'" ;
    $result = mysqli_query($conn,$sql);

    echo '<script language="javascript">';
    echo 'alert("Спасибо за Ваш заказ!")';
    echo '</script>';
    header('Refresh: 0; URL = success.php');
    
    $query_1 = "SELECT email FROM user WHERE username = '$_SESSION[username]'" ;
    $row = mysqli_fetch_array(mysqli_query($conn,$query_1));
    $email = $row['email'];
    
    $query_2 = "SELECT fname FROM user WHERE username = '$_SESSION[username]'" ;
    $row = mysqli_fetch_array(mysqli_query($conn,$query_2));
    $name = $row['fname'];

    mail($email,
        "Ваш заказ принят! – Foodie",
        $name.", Ваш заказ успешно оформлен!"."\n"."\n".
        "В течение часа курьер прибудет по указанному Вами адресу."."\n"."\n".
        "Если Вы хотите аннулировать заказ, пожалуйста, свяжитесь с нашим оператором по телефону горячей линии: 7755."."\n"."\n".
        "Спасибо за Ваш заказ!"."\n"."\n"."\n"."\n".
        "С уважением,"."\n".
        "администрация сервиса доставки еды Foodie."."\n".
        "E-mail: info@foodie.by"."\n"."\n"."\n"."\n".
        "Письмо сгенерировано автоматически. Пожалуйста, не отвечайте на него.",
        "From: randomailspo@gmail.com \r\n");
    
}
?>
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
    <link href="assets/css/calculator.css" rel="stylesheet">
    <!-- <link href="assets/css/payment.css" rel="stylesheet"> -->
    <link href="assets/css/profile.css" rel="stylesheet">
    <!-- <link href="assets/css/result.css" rel="stylesheet"> -->
    <!-- <link href="assets/css/review.css" rel="stylesheet"> -->
    <!-- <link href="assets/css/sign_in.css" rel="stylesheet"> -->
    <!-- <link href="assets/css/sign_up.css" rel="stylesheet"> -->
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

        <!--Search Button-->
    <br>
    
    <div class ="col-md-1"></div>
    <div class="col-md-11">
    <?php
        include "search.php";
    ?>
    </div>
    <br>

    <div class="container">
        <div class="row">  
          <?php
            if(isset($_POST['search']) != 0 ){
              $location = $_POST['area'];
              if ($location==NULL) {
                echo '<script language="javascript">';
                echo 'alert("Пожалуйста, выберите район")';
                echo '</script>';
                header("Refresh: 0; URL = index.php");
              }
              else{
                $search = mysqli_real_escape_string($conn, trim($location));
                echo "<div class='gallery col-lg-12 col-md-12 col-sm-12 col-xs-12'><h1 class='gallery-title'>Результаты поиска в районе $search</h1><br><br></div>";
                $sql = "SELECT * FROM restaurant WHERE location LIKE '%$search%'";
                $fetch = mysqli_query($conn,$sql);
                $restaurant = mysqli_fetch_assoc($fetch);
                if ($restaurant!=0) {
                  $sql = "SELECT * FROM restaurant WHERE location LIKE '%$search%'";
                  $result = mysqli_query($conn,$sql);
                  $response = array();
                  while($row = mysqli_fetch_array($result))
                  {
                  ?>
                  <div class="gallery_product col-lg-2 col-md-4 col-sm-4 col-xs-6 filter hdpe">
                    <?php
                    echo "<br><a class='rest' href=\"restaurant.php?id=$row[0]\">";
                    echo '<img src="data:images/jpeg;base64,'.base64_encode($row['image']).'" height="100" width="100" style="border-radius: 30%; box-shadow: 5px 5px 10px #6c6c6c;"/>';
                    echo "<p class='restname'>".$row['name']."</p></a>";
                    ?>
                  </div>
                  <?php
                  }
                }
                else{
                  echo "Ничего не найдено!";
                }
              }                  
            }
          ?>  
                
        </div>
    </div>
<br><br> 
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
<!-- <script src="assets/js/sign_up.js"></script> -->

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
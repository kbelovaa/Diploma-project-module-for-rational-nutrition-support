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
    
    <!-- Navigation -->
<?php
include "nav.php";
?>

    <header>            
        <div class="carousel-inner" role="listbox">
          <!-- Slide One - Set the background image for this slide in the line below -->
          <?php
          $rid = intval($_GET['id']);
          $sql= "SELECT * FROM restaurant WHERE sl = ".$rid."";
          $result = mysqli_query($conn,$sql);
          $row = mysqli_fetch_assoc($result);
          $image = $row['image'];
          ?>
          <div class="carousel-item active">
            <?php
            echo '<div style="width: 450px; margin: 0 auto"><img src="data:images/jpeg;base64,'.base64_encode($image).'" height="450" width="450" align="center"/></div>';
            ?>
            <div class="carousel-caption d-none d-md-block">
              <h3></h3>
              <p></p>
            </div>
          </div>
        </div>
    </header>

 
    <div class="col-md-3"></div>

    <!-- Page Content -->

<?php
    include_once 'connect.php';
    $id = intval($_GET['id']);
    $sql = 'SELECT * FROM restaurant WHERE sl = '.$id.' ';
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
    $restaurant = $row['name'];
?>    

    <section class="py-5">
        <div class="container">
            <h1 style="text-align:center;"><?php echo "$restaurant"; ?></h1>
        </div>
    </section>


      <!--Comment box ends here-->
      
    <br>

    <!-- Bootstrap core JavaScript -->


    <!-- View Deliverables-->
    <form method="POST" action="process.php">
        <div class="container">
          <h2 style="text-align:center; margin-bottom:20px">Меню</h2>
          <div class="row">
            <div class="col-xs-12">
              <div class="panel panel-info">
                <div class="panel-body">
        <?php
        $sql = "SELECT * FROM menu WHERE restaurant = '$restaurant'" ;
        $result = mysqli_query($conn,$sql);
        $n=0;
        while($row = mysqli_fetch_array($result)){
          echo '<div class="row"><div class="col-xs-3 text-center"><img src="data:images/jpeg;base64,'.base64_encode($row['image']).'" height="200" width="200" style="border-radius: 30%; box-shadow: 5px 5px 10px #6c6c6c;"></div>';
        ?>
                        <div class="col-xs-2">
                            <h4 class="product-name"><strong><?php echo "$row[item]"; ?></strong></h4>
                        </div>
                        <div class="col-xs-2 text-center">
                            <h5><?php echo "$row[details]"; ?><span class="text-muted"></span></h5><br>
                            <h5><?php echo "$row[calories]"; ?> ккал<span class="text-muted"></span></h5>
                            <h5>белки: <?php echo "$row[proteins]"; ?> г <span class="text-muted"></span></h5>
                            <h5>жиры: <?php echo "$row[fats]"; ?> г<span class="text-muted"></span></h5>
                            <h5>углеводы: <?php echo "$row[carbohydrates]"; ?> г<span class="text-muted"></span></h5>
                        </div> 
                        <div class="col-xs-2 text-center">
                            <h5><strong><?php echo "$row[price]"; ?> руб <span class="text-muted"></span></strong></h5>
                        </div>
                        <div class="col-xs-2 text-center">
                            <h5><strong>Количество <input style="margin-left: 10px; text-align:center" type="number" name="quantity[]" min="1" max="10" value="1"><span class="text-muted"></span></strong></h5>
                        </div>
                        
                        <div class="col-xs-1 text-center">
                        <label class="b-radio">
                            <input type="checkbox" class="b-radio_native" name="ordered_item[]" value="<?php echo "".$row['sl']."x".$n.""; ?>">
                            <span class="b-radio_check"></span>
                        </label>
                        </div>
                    </div>
                    <hr>
                  <?php
                  $n++;  
        }
        ?>
                </div>
                <div class="panel-footer">
                  <div class="row text-center">
                    <div class="col-xs-9">
                    </div>
                    <div class="col-xs-3">
                      <button name="order" type="submit" class="btn btn-success btn-block">
                        Добавить в корзину
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

    </form>
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
<link href="assets/css/calculator.css" rel="stylesheet">
<!-- <link href="assets/css/payment.css" rel="stylesheet"> -->
<!-- <link href="assets/css/profile.css" rel="stylesheet"> -->
<!-- <link href="assets/css/result.css" rel="stylesheet"> -->
<!-- <link href="assets/css/review.css" rel="stylesheet"> -->
<!-- <link href="assets/css/sign_in.css" rel="stylesheet"> -->
    <!-- <link href="assets/css/sign_up.css" rel="stylesheet"> -->
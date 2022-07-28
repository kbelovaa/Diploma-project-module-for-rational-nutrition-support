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

  if(isset($_SESSION['valid'])!=true){
        echo '<script language="javascript">';
        echo 'alert("Пожалуйста, сначала войдите или зарегистрируйтесь!")';
        echo '</script>';
        header('Refresh: 0; URL = sign_in.php');
  }
  else{

	$sql = "SELECT * FROM cart WHERE username = '$_SESSION[username]' and delivery = 0" ;
	$result = mysqli_query($conn,$sql);
?> 
	<!-- CheckOut-->
    <div class="container">
            <div class="row">
                    <div class="col-xs-12">
                            <div class="panel panel-info" style="border-color:#a8dca4;">
                                    <div class="panel-heading" style="background:#e5fde7; border-color:#e5fde7;">
                                            <div class="panel-title">
                                                    <div class="row">
                                                            <div class="col-xs-9">
                                                                    <h5 style="color: #000;"><span class="glyphicon glyphicon-shopping-cart"></span> Корзина</h5>
                                                            </div>
                                                            <div class="col-xs-3">
                                                                    <button type="button" class="btn btn-primary btn-sm btn-block" onclick="window.location.href = 'index.php'" style="background: #a6b0b3; border-color: #a6b0b3;">
                                                                            <span class="glyphicon glyphicon-share-alt"></span> Вернуться к меню
                                                                    </button>
                                                            </div>
                                                    </div>
                                            </div>
                                    </div>
                                    <div class="panel-body">

                                            <?php
                                            $response = array();
                                            $total=0;
                                            $cal=0;
                                            $prot=0;
                                            $f=0;
                                            $carb=0;
                                            $count = 0;
                                            while($row = mysqli_fetch_array($result)){
                                            ?>
                                            <div class="row">
                                                    <div class="col-xs-3 text-center">
                                                            <?php
                                                            $a = mysqli_query($conn,"SELECT * FROM menu WHERE item = '$row[item]'");
                                                            $b = mysqli_fetch_assoc($a);
                                                            $image = $b['image'];
                                                            echo '<img src="data:images/jpeg;base64,'.base64_encode($image).'" height="200" width="200" style="border-radius: 30%; box-shadow: 5px 5px 10px #6c6c6c;" />';
                                                            ?>
                                                    </div>
                                                    <div class="col-xs-3">
                                                            <h4 class="product-name"><strong><?php echo "$row[item]"; ?></strong></h4>
                                                            <h4 class="product-name"><?php echo "из $row[restaurant]"; ?></h4>
                                                    </div>
                                                    <div class="col-xs-2 text-center">
                                                        <h5><strong><?php echo "$row[price]"; ?> руб <span class="text-muted">&nbsp; x &nbsp;</span><?php echo "$row[quantity]"; ?></strong></h5>
                                                    </div>
                                                    <div class="col-xs-2 text-center">
                                                        <h5><?php echo "$row[calories]"; ?> ккал<span class="text-muted"></span></h5>
                                                        <h5>белки: <?php echo "$row[proteins]"; ?> г <span class="text-muted"></span></h5>
                                                        <h5>жиры: <?php echo "$row[fats]"; ?> г<span class="text-muted"></span></h5>
                                                        <h5>углеводы: <?php echo "$row[carbohydrates]"; ?> г<span class="text-muted"></span></h5>
                                                    </div>
                                                    <div class="col-xs-2 text-center">
                                                            <form method="post" action="delete.php"><a href="delete.php?id=<?php echo $row['sl'];?>" class="delete"><input type="button" class="btn btn-default" value="Удалить"></a></form>
                                                    </div>
                                                    
                                            </div>
                                            <hr>
                                            <?php
                                            $total=$total+($row['price']*$row['quantity']);
                                            $cal=$cal+($row['calories']*$row['quantity']);
                                            $prot=$prot+($row['proteins']*$row['quantity']);
                                            $f=$f+($row['fats']*$row['quantity']);
                                            $carb=$carb+($row['carbohydrates']*$row['quantity']);
                                            $count++;
                                            }
                                            ?>

                                    </div>
                                    <div class="panel-footer">
                                            <div class="row text-center">
                                                    <div class="col-xs-9">
                                                            <h4 class="text-right">Итого: <strong><?php echo "$total"; ?></strong> РУБ</h4>
                                                                <h5 class="text-right">КБЖУ: <strong><?php echo "$cal"; ?></strong> ккал, <strong><?php echo "$prot"; ?></strong> г белков, <strong><?php echo "$f"; ?></strong> г жиров, <strong><?php echo "$carb"; ?></strong> г углеводов</h5>
                                                                <?php 
                                                                $query = "SELECT * FROM user WHERE username = '$_SESSION[username]'";
                                                                $res = mysqli_query($conn,$query);
                                                                $r = mysqli_fetch_array($res);
                                                                if ($cal > $r['calories'] && $r['calories'] != 0) {
                                                                        echo "<h5 class='text-right' style='color: red;'><strong>Внимание! Суммарная калорийность блюд превышает Вашу норму ($r[calories] ккал)!</strong></h5>";
                                                                }
                                                                else if ($cal < $r['calories'] && $r['calories'] != 0) {
                                                                        echo "<h5 class='text-right' style='color: #50C648;'><strong>Суммарная калорийность блюд не превышает Вашу норму ($r[calories] ккал)</strong></h5>";
                                                                }
                                                                ?>
                                                    </div>
                                                    <div class="col-xs-3">
                                                            <button type="button" class="btn btn-success btn-block" onclick="window.location.href = 'payment.php'">
                                                                    Заказать
                                                            </button>
                                                    </div>
                                            </div>
                                    </div>
                            </div>
                    </div>
            </div>
    </div>

<?php
}
?>
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
    <link href="assets/css/profile.css" rel="stylesheet">
    <!-- <link href="assets/css/result.css" rel="stylesheet"> -->
    <!-- <link href="assets/css/review.css" rel="stylesheet"> -->
    <!-- <link href="assets/css/sign_in.css" rel="stylesheet"> -->
    <!-- <link href="assets/css/sign_up.css" rel="stylesheet"> -->
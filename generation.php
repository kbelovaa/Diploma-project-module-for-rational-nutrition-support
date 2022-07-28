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

            $q = "SELECT * FROM user WHERE username = '$_SESSION[username]'" ;
            $r = mysqli_query($conn,$q);
            $str = mysqli_fetch_array($r);

            $sql = "SELECT * FROM menu";
            $result = mysqli_query($conn,$sql);
            $num = mysqli_num_rows($result);

            $id = array();

            for ($l = 0; $l < 10; $l++) {
                $a = random_int(1, $num);
                $id[] = $a;
            }

            function powerSet(array $in, int $minLength = 0): \Generator
            {
                if ($minLength === 0) {
                    yield [];
                }

                for ($i = 1 << count($in); --$i;) {
                    $out = [];

                    foreach ($in as $j => $u) {
                        if ($i >> $j & 1) {
                            $out[] = $u;
                        }
                    }

                    if (count($out) >= $minLength) {
                        yield $out;
                    }
                }
            }

            $maxprice = 0;
            $mindiff = $str['calories'];
            $goal = array();

            foreach (powerSet($id) as $value) {
                $sum = 0;
                $price = 0;
                for ($k = 0; $k < count($value); $k++) {
                    $query = "SELECT * from menu WHERE sl = $value[$k]";
                    $res = mysqli_query($conn,$query);
                    $st = mysqli_fetch_array($res);
                    $sum += $st['calories'];
                    $price += $st['price'];
                }
                $diff = $str['calories'] - $sum;
                if ($sum <= $str['calories'] and $price > $maxprice and $diff < $mindiff) {
                    $maxprice = $price;
                    $mindiff = $diff;
                    $goal = $value;
                    $cal = $sum;
                }
            }
            ?>

            <button type="button" class="btn btn-primary btn-sm btn-block" onclick="window.location.href = 'profile.php'" style="background: #a6b0b3; border-color: #a6b0b3; width: 200px; margin:30px 0 0 980px;">
                <span class="glyphicon glyphicon-share-alt"></span> Вернуться в личный кабинет
            </button>
            <form method="POST" action="process_edit.php">
                <div class="container">
                    <h2 style="text-align:center; margin-bottom:20px">Рацион, подходящий Вам по калорийности</h2>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="panel panel-info">
                                <div class="panel-body">
                                        <?php
                                        $prot = $f = $carb = 0;
                                        for($i = 0; $i < count($goal); $i++) {
                                            $sql = "SELECT * FROM menu WHERE sl = $goal[$i]" ;
                                            $result = mysqli_query($conn,$sql);
                                            $row = mysqli_fetch_array($result);
                                            $prot += $row['proteins'];
                                            $f += $row['fats'];
                                            $carb += $row['carbohydrates'];
                                            echo '<div class="row"><div class="col-xs-3 text-center"><img src="data:images/jpeg;base64,'.base64_encode($row['image']).'" height="200" width="200" style="border-radius: 30%; box-shadow: 5px 5px 10px #6c6c6c;"/>';
                                        ?>
                                        </div>
                                        <div class="col-xs-3">
                                            <h4 class="product-name"><strong><?php echo "$row[item]"; ?></strong></h4>
                                            <h4 class="product-name"><?php echo "из $row[restaurant]"; ?></h4>
                                        </div>
                                        <div class="col-xs-2 text-center">
                                            <h5><?php echo "$row[details]"; ?><span class="text-muted"></span></h5>
                                        </div> 
                                        <div class="col-xs-2 text-center">
                                            <h5><?php echo "$row[calories]"; ?> ккал<span class="text-muted"></span></h5>
                                            <h5>белки: <?php echo "$row[proteins]"; ?> г <span class="text-muted"></span></h5>
                                            <h5>жиры: <?php echo "$row[fats]"; ?> г<span class="text-muted"></span></h5>
                                            <h5>углеводы: <?php echo "$row[carbohydrates]"; ?> г<span class="text-muted"></span></h5>
                                        </div> 
                                        <div class="col-xs-2 text-center">
                                            <h5><strong><?php echo "$row[price]"; ?> руб <span class="text-muted"></span></strong></h5><br>
                                            <input style="hidden" type="checkbox" class="b-radio_native" name="ordered_item[]" checked value="<?php echo "".$row['sl']."x1"; ?>">
                                        </div>                            
                                    </div>
                                    <hr>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="panel-footer">
                                    <div class="row text-center">
                                        <div class="col-xs-9">
                                                <h4 class="text-right">Суммарная стоимость: <strong><?php echo "$maxprice"; ?></strong> РУБ</h4>
                                                <h5 class="text-right">КБЖУ: <strong><?php echo "$cal"; ?></strong> ккал, <strong><?php echo "$prot"; ?></strong> г белков, <strong><?php echo "$f"; ?></strong> г жиров, <strong><?php echo "$carb"; ?></strong> г углеводов</h5>
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

<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/source.bootstrap.min.js"></script>
<script src="assets/js/jquery.min.js"></script>
<link href="assets/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/css/source.bootstrap.min.css" rel="stylesheet">
<link href="assets/css/half-slider.css" rel="stylesheet">
<link href="assets/css/index.css" rel="stylesheet">
<link href="assets/css/calculator.css" rel="stylesheet">
<link href="assets/css/profile.css" rel="stylesheet">
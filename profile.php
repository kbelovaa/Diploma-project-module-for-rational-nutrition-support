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
        <!--profile code-->
        <div class="container">
            <div class="fb-profile">
                <div class="photo">
                <?php
                    echo '<img src="data:images/png;base64,'.base64_encode($row['image']).'" height="200" width="200" style="border-radius: 50%;"/>';
                ?>
                </div>
                <div class="fb-profile-text">
                    <h1>Профиль пользователя <?php echo "$row[fname]"; ?></h1>
                    <br>
                    <table style="border: none; font-weight: bold">
                        <tr>
                                <td> Имя:</td>
                                <td style="padding-left: 10px;"> <?php echo "$row[fname] $row[lname]"; ?></td>
                        </tr>
                        <tr>
                                <td> E-mail:</td>
                                <td style="padding-left: 10px;"><?php echo "$row[email]"; ?></td>
                                <td>
                                    <a href="edit.php" class="edit">Редактировать</a>
                                </td>
                        </tr>
                        <tr>
                            <td> Телефон:</td>
                            <td style="padding-left: 10px;"><?php echo "$row[phone]"; ?></td>
                        </tr>
                        <tr>
                            <td> Адрес:</td>
                            <td style="padding-left: 10px;"><?php echo "$row[address]"; ?></td>
                        </tr>
                        <tr>
                            <td class="b-calc_result-text" style="vertical-align: top;"> Норма калорий:</td>
                            <td style="padding-left: 10px;" class="b-calc_result-text">
                                <?php 
                                    $res = ($row['calories'] == 0) ? "Ещё не рассчитана" : "$row[calories] ккал<br><button type='button' class='btn btn-xl btn-success' onclick='window.location.href=".'"'."generation.php".'"'."' style='margin-top:10px;'>Получить готовый рацион</button>";
                                    echo $res;
                                ?>
                            </td>
                        </tr>
                    </table>        
                </div>
            </div>
            <div class="calculator">
              <form class="calc-container form" method="post" action="calculator.php">
                  <div class="calc-row__form">
                    <h3>Индивидуальный калькулятор питания</h3>
                      <div class="calc-container__row">
                          <label class="label form__label">Пол</label>
                          <div class="labels">
                            <label class="b-radio">
                                <?php if ($row['gender'] == "муж") {
                                    echo '<input type="radio" class="b-radio_native" name="sex" value="муж" checked>';
                                } else {
                                    echo '<input type="radio" class="b-radio_native" name="sex" value="муж">';
                                }
                                ?>
                                <span class="b-radio_circle"></span>
                                <span class="b-radio_text"> Мужчина </span>
                            </label>
                            <label class="b-radio">
                                <?php if($row['gender'] == "жен") {
                                    echo '<input type="radio" class="b-radio_native" name="sex" value="жен" checked>';
                                } else {
                                    echo '<input type="radio" class="b-radio_native" name="sex" value="жен">';
                                }
                                ?>
                                <span class="b-radio_circle"></span>
                                <span class="b-radio_text"> Женщина </span>
                            </label>
                          </div>
                      </div>
                      <div class="form__row">
                          <div class="form__col">
                              <label class="label form__label" for="weight">Вес, кг</label>
                              <?php if($row['weight'] == 0) {
                                  echo '<input type="text" class="b-input-custom num" name="weight" id="weight">';
                              } else {
                                  echo '<input type="text" class="b-input-custom num" name="weight" id="weight" value="'.$row['weight'].'">';
                              }
                              ?>
                          </div>
                          <div class="form__col">
                              <label class="label form__label" for="height">Рост, см:</label>
                              <?php if($row['height'] == 0) {
                                    echo '<input type="text" class="b-input-custom num" name="height" id="height">';
                                } else {
                                    echo '<input type="text" class="b-input-custom num" name="height" id="height" value="'.$row['height'].'">';
                                }
                                ?>
                          </div>
                      </div>
                      <div class="form__row">
                          <div class="form__col">
                              <label class="label form__label" for="age">Возраст, полных лет:</label>
                              <?php if($row['age'] == 0) {
                                    echo '<input type="text" class="b-input-custom num" name="age" id="age">';
                                } else {
                                    echo '<input type="text" class="b-input-custom num" name="age" id="age" value="'.$row['age'].'">';
                                }
                                ?>
                          </div>
                          <div class="form__col">
                              <label class="label form__label" for="activity">Тип физической активности:</label>
                              <select name="activity" id="activity" class="b-select-custom">
                                <?php if($row['activity'] == 1.2000) {
                                    echo '<option value="1.2" selected>Минимальные нагрузки (сидячая работа)</option>';
                                } else {
                                    echo '<option value="1.2">Минимальные нагрузки (сидячая работа)</option>';
                                }
                                if($row['activity'] == 1.3750) {
                                    echo '<option value="1.375" selected>Немного дневной активности и лёгкие упражнения 1–3 раза в неделю</option>';
                                } else {
                                    echo '<option value="1.375">Немного дневной активности и лёгкие упражнения 1–3 раза в неделю</option>';
                                }
                                if($row['activity'] == 1.4625) {
                                    echo '<option value="1.4625" selected>Тренировки 4–5 раз в неделю (или работа средней тяжести)</option>';
                                } else {
                                    echo '<option value="1.4625">Тренировки 4–5 раз в неделю (или работа средней тяжести)</option>';
                                }
                                if($row['activity'] == 1.5500) {
                                    echo '<option value="1.55" selected>Интенсивные тренировки 4–5 раз в неделю</option>';
                                } else {
                                    echo '<option value="1.55">Интенсивные тренировки 4–5 раз в неделю</option>';
                                }
                                if($row['activity'] == 1.6375) {
                                    echo '<option value="1.6375" selected>Ежедневные тренировки</option>';
                                } else {
                                    echo '<option value="1.6375">Ежедневные тренировки</option>';
                                }
                                if($row['activity'] == 1.7250) {
                                    echo '<option value="1.725" selected>Ежедневные интенсивные тренировки или тренировки два раза в неделю</option>';
                                } else {
                                    echo '<option value="1.725">Ежедневные интенсивные тренировки или тренировки два раза в неделю</option>';
                                }
                                if($row['activity'] == 1.9000) {
                                    echo '<option value="1.9" selected>Тяжёлая физическая работа или интенсивные тренировки два раза в день</option>';
                                } else {
                                    echo '<option value="1.9">Тяжёлая физическая работа или интенсивные тренировки два раза в день</option>';
                                }
                                ?>
                              </select>
                          </div>
                      </div>
                      <div class="form__row">
                          <div class="form__col">
                              <label class="label form__label" for="goal">Цель питания:</label>
                              <select name="goal" id="goal" class="b-select-custom">
                              <?php if($row['goal'] == 0) {
                                    echo '<option value="0" selected>Поддержание веса</option>';
                                } else {
                                    echo '<option value="0">Поддержание веса</option>';
                                }
                                if($row['goal'] == 250) {
                                    echo '<option value="250" selected>Медленное похудение</option>';
                                } else {
                                    echo '<option value="250">Медленное похудение</option>';
                                }
                                if($row['goal'] == 500) {
                                    echo '<option value="500" selected>Быстрое похудение</option>';
                                } else {
                                    echo '<option value="500">Быстрое похудение</option>';
                                }
                                ?>
                              </select>
                          </div>
                          <div class="calc-row__btn-wrap">
                            <button name="submit_calc" type="submit" class="b-btn b-btn_green-filled">Рассчитать</button>
                        </div>
                      </div>
                      <div class="form__row" style="width: 558px; margin: 40px auto 0;">
                          <p class="notice">Рассчитанная норма калорий отобразится в Вашем профиле под личными данными</p>
                        </div>
                  </div>
                </div>
              </form>
            </div>
        </div> <!-- /container -->  
        
    </section>


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
<?php
session_start();
include_once 'connect.php';

    // получение данных с элементов формы

  if(isset($_POST['submit_calc']) != 0 ){
    $sex = $_POST['sex'];
    $weight = $_POST['weight'];
    $height = $_POST['height'];
    $age = $_POST['age'];
    $activity = $_POST['activity'];
    $goal = $_POST['goal'];
    
    // обработка полученных данных
    
    $weight = stripslashes($weight);
    $height = stripslashes($height);
    $age = stripslashes($age);
        
    $weight = htmlspecialchars($weight);  // преобразование символов в сущности (мнемоники)
    $height = htmlspecialchars($height);
    $age = htmlspecialchars($age);
        
    $weight = urldecode($weight); // декодирование URL
    $height = urldecode($height);
    $age = urldecode($age);
        
    $weight = trim($weight); // удаление пробельных символов с обеих сторон
    $height = trim($height);
    $age = trim($age);
    
    if ((strlen($sex) == 0) || (strlen($weight) == 0) || (strlen($height) == 0) || (strlen($age) == 0) || (strlen($activity) == 0) || (strlen($goal) == 0)) {
      echo '<script language="javascript">';
      echo 'alert("Пожалуйста, заполните все поля")';
      echo '</script>';
      header("Refresh: 0; URL = profile.php");
    }

    else {
      if ($age >= 13 && $age <= 80) {
        if ($sex == 'муж') {
          $calories = (10 * $weight + 6.25 * $height - 4.92 * $age + 5) * $activity;
          $calories = (($calories - $goal) > 1400) ? round($calories - $goal) : 1400;
        }
        else {
          $calories = (10 * $weight + 6.25 * $height - 4.92 * $age - 161) * $activity;
          $calories = (($calories - $goal) > 1200) ? round($calories - $goal) : 1200;
        }
        $query = "UPDATE user SET gender = '$sex', age = '$age', weight = '$weight', height = '$height', activity = '$activity', goal = '$goal', calories = '$calories' WHERE username = '$_SESSION[username]'";
        mysqli_query($conn,$query);
  
        header("Refresh: 0; URL = profile.php");
      }
      else {
        echo '<script language="javascript">';
        echo 'alert("Извините, калькулятор питания работает только для пользователей в возрасте от 13 до 80 лет")';
        echo '</script>';
        header("Refresh: 0; URL = profile.php");
      }
    }

  }
?>
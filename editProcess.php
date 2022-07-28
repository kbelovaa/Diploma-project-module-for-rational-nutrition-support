<?php
session_start();
include_once 'connect.php';

    // получение данных с элементов формы

  if(isset($_POST['submit_edit']) != 0 ){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    if($_FILES['image']['tmp_name']) {
        $image=addslashes(file_get_contents($_FILES['image']['tmp_name'])) ;
        $image_name=addslashes($_FILES['image']['name']);
        $q = ", image = '$image', imagename = '$image_name'";
    } else {
        $q = ""; 
    }
    
    // обработка полученных данных
    
    $fname = stripslashes($fname);
    $lname = stripslashes($lname);
    $address = stripslashes($address);
    $email = stripslashes($email);
        
    $fname = htmlspecialchars($fname);  // преобразование символов в сущности (мнемоники)
    $lname = htmlspecialchars($lname);
    $address = htmlspecialchars($address);
    $email = htmlspecialchars($email);
        
    $fname = urldecode($fname); // декодирование URL
    $lname = urldecode($lname);
    $address = urldecode($address);
    $email = urldecode($email);
        
    $fname = trim($fname); // удаление пробельных символов с обеих сторон
    $lname = trim($lname);
    $address = trim($address);
    $email = trim($email);
    $phone = trim($phone);
    
    if ((strlen($fname) == 0) || (strlen($lname) == 0) || (strlen($address) == 0) || (strlen($email) == 0) || (strlen($phone) == 0)) {
      echo '<script language="javascript">';
      echo 'alert("Пожалуйста, заполните все поля")';
      echo '</script>';
    }

    else {
  // check username exist or not
       
    $query2 = "SELECT username FROM user WHERE email='$email'";
    $result2 = mysqli_query($conn,$query2);
    
    $row = mysqli_fetch_array($result2);
    
    $count2 = mysqli_num_rows($result2);
               
    if ($count2==0 or ($count2==1 and $row['username'] == $_SESSION['username'])){
        $query = "UPDATE user SET fname = '$fname', lname = '$lname', address = '$address', email = '$email', phone = '$phone'".$q." WHERE username = '$_SESSION[username]'";
        mysqli_query($conn,$query);

        echo '<script language="javascript">';
        echo 'alert("Ваши данные успешно обновлены!")';
        echo '</script>';
        
        header('Refresh: 0; URL = profile.php');
    }
    else {
        echo '<script language="javascript">';
        echo 'alert("Извините, пользователь с таким e-mail уже существует :( Пожалуйста, попробуйте использовать другой e-mail.")';
        echo '</script>';
        
        header('Refresh: 0; URL = edit.php');
    }
  }

  }
?>
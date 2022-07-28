<?php
include_once 'connect.php';

    // получение данных с элементов формы

  if(isset($_POST['submit_reg']) != 0 ){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $image=addslashes(file_get_contents($_FILES['image']['tmp_name'])) ;
    $image_name=addslashes($_FILES['image']['name']) ;
    
    // обработка полученных данных
    
    $fname = stripslashes($fname);
    $lname = stripslashes($lname);
    $address = stripslashes($address);
    $email = stripslashes($email);
    $username = stripslashes($username);
    $password = stripslashes($password);
        
    $fname = htmlspecialchars($fname);  // преобразование символов в сущности (мнемоники)
    $lname = htmlspecialchars($lname);
    $address = htmlspecialchars($address);
    $email = htmlspecialchars($email);
    $username = htmlspecialchars($username);
    $password = htmlspecialchars($password);
        
    $fname = urldecode($fname); // декодирование URL
    $lname = urldecode($lname);
    $address = urldecode($address);
    $email = urldecode($email);
    $username = urldecode($username);
    $password = urldecode($password);
        
    $fname = trim($fname); // удаление пробельных символов с обеих сторон
    $lname = trim($lname);
    $address = trim($address);
    $email = trim($email);
    $phone = trim($phone);
    $username = trim($username);
    $password = trim($password);
    
    if ((strlen($fname) == 0) || (strlen($lname) == 0) || (strlen($address) == 0) || (strlen($email) == 0) || (strlen($phone) == 0) || (strlen($username) == 0) || (strlen($password) == 0)) {
      echo '<script language="javascript">';
      echo 'alert("Пожалуйста, заполните все поля")';
      echo '</script>';
    }

    else {
  // check username exist or not
    $query1 = "SELECT username FROM user WHERE username='$username'";
    $result1 = mysqli_query($conn,$query1);
    
    $count1 = mysqli_num_rows($result1);
    
    $query2 = "SELECT username FROM user WHERE email='$email'";
    $result2 = mysqli_query($conn,$query2);
    
    $count2 = mysqli_num_rows($result2);
    
    if ($count1==0) {
        
        if ($count2==0){
            $query = 'INSERT INTO user(fname, lname, address, email, phone, username, password, image, imagename) VALUES ("'.$fname.'","'.$lname.'","'.$address.'","'.$email.'","'.$phone.'","'.$username.'","'.$password.'","'.$image.'","'.$image_name.'")';

            mysqli_query($conn,$query);

            echo '<script language="javascript">';
            echo 'alert("Регистрация произведена успешно!")';
            echo '</script>';

            session_start();
            $_SESSION['valid'] = true;
            $_SESSION['timeout'] = time();
            $_SESSION['username'] = $username;
            $_SESSION['type'] = "user";
            header('Refresh: 0; URL = index.php');
        }
        else {
          echo '<script language="javascript">';
          echo 'alert("Извините, пользователь с таким e-mail уже существует. Пожалуйста, попробуйте использовать другой e-mail.")';
          echo '</script>';

          header('Refresh: 0; URL = sign_up.php');
        }
    
    }
    else {
        echo '<script language="javascript">';
        echo 'alert("Извините, данное имя пользователя уже существует. Пожалуйста, попробуйте использовать другой логин.")';
        echo '</script>';

      header('Refresh: 0; URL = sign_up.php');
    }
  }

  }
?>
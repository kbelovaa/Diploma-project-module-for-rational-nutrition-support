<?php

    // получение данных с элементов формы

    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $subject = $_POST['subject'];
    $text = $_POST['text'];
    
    // обработка полученных данных
    
    $name = htmlspecialchars($name);  // преобразование символов в сущности (мнемоники)
    $email = htmlspecialchars($email);
    $mobile = htmlspecialchars($mobile);
    $subject = htmlspecialchars($subject);
    $text = htmlspecialchars($text);
    
    $name = urldecode($name); // декодирование URL
    $email = urldecode($email);
    $mobile = urldecode($mobile);
    $subject = urldecode($subject);
    $text = urldecode($text);
    
    $name = trim($name); // удаление пробельных символов с обеих сторон
    $email = trim($email);
    $mobile = trim($mobile);
    $subject = trim($subject);
    $text = trim($text);
       
    // отправление данных на почту
    
    if (mail("kbelovaa17@gmail.com",
            "Новое письмо с сайта",
            "Имя: ".$name."\n".
            "E-mail: ".$email."\n".
            "Телефон: ".$mobile."\n".
            "Тема письма: ".$subject."\n".
            "Текст письма: ".$text,
            "From: randomailspo@gmail.com \r\n")
            
    ) {
        echo '<script language="javascript">';
        echo 'alert("Письмо успешно отправлено!")';
        echo '</script>';

    }
    
    else {
        echo '<script language="javascript">';
        echo 'alert("Есть ошибки! Проверьте данные...")';
        echo '</script>';
    }

    header('Refresh: 0; URL = index.php');

?>
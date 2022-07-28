<?php
require_once "connect.php";
session_start();
	$ref = $_GET['ref'];
	if ($ref==5) {
	echo '<script language="javascript">';
	echo 'alert("Товар успешно помечен как отправленный!");';
	echo '</script>';
	header("Refresh: 1; URL = index.php?adp=".$ref."");
	}

	elseif ($ref==4) {
	echo '<script language="javascript">';
	echo 'alert("Товар успешно добавлен!");';
	echo '</script>';
	header("Refresh: 1; URL = index.php?adp=".$ref."");
	}

	elseif ($ref==3) {
	echo '<script language="javascript">';
	echo 'alert("Ресторан успешно добавлен!");';
	echo '</script>';
	header("Refresh: 1; URL = index.php?adp=".$ref."");
	}

	elseif ($ref==2) {
	echo '<script language="javascript">';
	echo 'alert("Ресторан успешно удалён!");';
	echo '</script>';
	header("Refresh: 1; URL = index.php?adp=".$ref."");
	}

	elseif ($ref==1) {
	echo '<script language="javascript">';
	echo 'alert("Пользователь успешно удалён!");';
	echo '</script>';
	header("Refresh: 1; URL = index.php?adp=".$ref."");
	}
        
    elseif ($ref==7) {
	echo '<script language="javascript">';
	echo 'alert("Данные успешно выгружены в файл в формате json!");';
	echo '</script>';
	header("Refresh: 1; URL = index.php?adp=0");
	}
?>
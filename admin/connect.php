<?php

$conn = mysqli_connect("localhost","root","","db_foodie");

if (!$conn) {
	die("Сбой подключения: " . mysqli_connect_error());
}
?>
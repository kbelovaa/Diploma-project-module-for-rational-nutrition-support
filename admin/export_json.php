<?php
require_once "connect.php";
session_start();
	$quer = "SELECT JSON_OBJECT
                ('order_id', sl,
                 'username', username, 
                 'restaurant', restaurant,
                 'item', item,
                 'price', price,
                 'quantity', quantity, 
                 'imagename', imagename,
                 'address', address,
                 'payment', payment, 
                 'date', date) 
                  INTO OUTFILE 'C:/xampp/htdocs/Foodie_healthy/json_export/orders.json' FROM cart WHERE delivery = 2 ;";
	mysqli_query($conn, $quer);
	header("location:success.php?ref=7");
?>
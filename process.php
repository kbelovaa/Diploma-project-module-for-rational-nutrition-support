<?php
include "nav.php";
include_once 'connect.php';

if(isset($_POST['order']) != 0){
if(!empty($_POST['ordered_item'])) {
// $checked_count = count($_POST['ordered_item']);
foreach($_POST['ordered_item'] as $selected) {
$temp = explode("x", $selected);

$sl = $temp[0];
$q = $temp[1];

$sql = "SELECT * FROM menu WHERE sl = '$sl'" ;
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);
$user=$_SESSION['username'];
$item=$row['item'];
$price=$row['price'];
$calories=$row['calories'];
$proteins=$row['proteins'];
$fats=$row['fats'];
$carbohydrates=$row['carbohydrates'];
$restaurant=$row['restaurant'];
$quantity=$_POST['quantity'][$q];
$image_name=$row['imagename'];

$query = 'INSERT INTO cart(username, restaurant, item, price, calories, proteins, fats, carbohydrates, quantity, imagename) VALUES ("'.$user.'","'.$restaurant.'","'.$item.'","'.$price.'","'.$calories.'","'.$proteins.'","'.$fats.'","'.$carbohydrates.'","'.$quantity.'","'.$image_name.'")';
mysqli_query($conn,$query);
}

header('Location: checkout.php');
}
else{
    echo '<script language="javascript">';
    echo 'alert("Вы ничего не выбрали, пожалуйста, отметьте желаемые позиции!")';
    echo '</script>';
    header('Refresh: 0; URL = ' . $_SERVER['HTTP_REFERER']);
}
}
?>
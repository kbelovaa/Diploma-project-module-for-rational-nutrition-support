<?php
session_start();
include_once 'connect.php';
session_destroy();
header('Refresh: 1; URL = index.php');
?>
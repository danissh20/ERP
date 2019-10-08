<?php
	$connect=mysqli_connect('localhost','root', '' ,'erp');
	if (session_status() == PHP_SESSION_NONE) {
    session_start();
	}
    if($connect->connect_errno > 0){
        die('Unable to connect to database [' . $connect->connect_error . ']');
    }
?>
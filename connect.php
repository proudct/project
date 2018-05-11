<?php

$host = "localhost";
$user = "root";
$passwd = "";
$db_name = "projectdb";
$con = mysqli_connect($host, $user, $passwd, $db_name) or die("Error" . mysqli_error($con));
mysqli_query($con, "SET NAMES 'utf8' ");

?>  
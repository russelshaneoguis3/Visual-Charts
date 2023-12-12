<?php

$sname= "localhost";
$uname= "root";
$password = "123456";

$db_name = "dengue";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}
<?php

session_start();
ob_start();
$hostname = "localhost";
$username = "root";
$password = "password";
$dbname = "sms_dump";

$con = mysqli_connect($hostname, $username, $password, $dbname);

if (!$con) {
	echo "Not";
}

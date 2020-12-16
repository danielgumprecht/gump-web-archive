<?php
header("Access-Control-Allow-Origin: *");

$servername = "e106545-mysql.services.easyname.eu";
$usn = "u167735db1";
$dbname = "u167735db1";
$password = "123456";

$conn = new mysqli($servername, $usn, $password, $dbname);

$GLOBALS['conn'] = $conn;
?>

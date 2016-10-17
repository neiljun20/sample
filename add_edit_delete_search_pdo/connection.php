<?php

$user = "root";
$pass = "";
$hostname = "localhost"; 
$database_name = 'sample';

$dbh = new PDO('mysql:host='.$hostname.';dbname='.$database_name, $user, $pass);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

session_start();

?>
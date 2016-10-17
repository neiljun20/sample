<?php
session_start();

$_SESSION['sample_name'] = '';
$_SESSION['sample_email'] = '';
$_SESSION['sample_sex'] = '';
$_SESSION['sample_important'] = '';

header("Location:index.php");
?>
<?php
session_start();
$_SESSION['sample_search'] = $_POST['search'];
header("Location:index.php");
?>
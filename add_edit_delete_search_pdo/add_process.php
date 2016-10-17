<?php

require_once 'connection.php';

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$password2 = $_POST['password2'];
$sex = $_POST['sex'];
$important = isset($_POST['important']) ? $_POST['important'] : '' ;

$new_password = md5($password);

$_SESSION['sample_name'] = $name;
$_SESSION['sample_email'] = $email;
$_SESSION['sample_sex'] = $sex;
$_SESSION['sample_important'] = $important;

if($password != $password2){
	header("Location:add.php?msg=Invalid password");
}
else{
	$q = $dbh->prepare("INSERT INTO user SET usr_name = ?, usr_email = ?, usr_password = ?, usr_sex = ?, usr_important = ?");
	$q->execute(array($name,$email,$new_password,$sex,$important));
	
	$_SESSION['sample_name'] = '';
	$_SESSION['sample_email'] = '';
	$_SESSION['sample_sex'] = '';
	$_SESSION['sample_important'] = '';
	
	header("Location:add.php?msg=Success");
}

?>
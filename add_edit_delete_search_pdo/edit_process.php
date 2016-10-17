<?php

require_once 'connection.php';

$id = $_GET['id'];
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
	header("Location:edit.php?msg=Invalid password&id=".$id);
}
else{
	$q = $dbh->prepare("UPDATE user SET usr_name = ?, usr_email = ?, usr_password = ?, usr_sex = ?, usr_important = ? WHERE usr_id = ?");
	$q->execute(array($name,$email,$new_password,$sex,$important,$id));
	
	$_SESSION['sample_name'] = '';
	$_SESSION['sample_email'] = '';
	$_SESSION['sample_sex'] = '';
	$_SESSION['sample_important'] = '';
	
	header("Location:edit.php?msg=Success");
}

?>
<?php

require_once '../inc/connection.php';

$id = $_GET['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$password2 = $_POST['password2'];
$sex = $_POST['sex'];
$important = isset($_POST['important']) ? $_POST['important'] : '' ;

$new_password = md5($password);

if($password != $password2){
	echo "Invalid password";
}
else{
	$q = $dbh->prepare("UPDATE user SET usr_name = ?, usr_email = ?, usr_password = ?, usr_sex = ?, usr_important = ? WHERE usr_id = ?");
	$q->execute(array($name,$email,$new_password,$sex,$important,$id));
	echo "edited";
}

?>
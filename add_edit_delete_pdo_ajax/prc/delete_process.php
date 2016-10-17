<?php

require_once '../inc/connection.php';

$id = $_GET['id'];

$q = $dbh->prepare("SELECT * FROM user WHERE usr_id = ?");
$q->execute(array($id));

$q->bindColumn(6, $important);

$q->fetch();

if($important == 'on'){
	echo "The user you want to delete is impotant. It can't be delete";
}
else{
	$q = $dbh->prepare("DELETE FROM user WHERE usr_id = ?");
	$q->execute(array($id));
	echo "User has been deleted";
}
?>
<?php

require_once 'connection.php';

$id = $_GET['id'];

$q = $dbh->prepare("SELECT * FROM user WHERE usr_id = ?");
$q->execute(array($id));

$q->bindColumn(6, $important);

$q->fetch();

if($important == 'on'){
	header("Location:index.php?msg=The user you want to delete is impotant. It can't be delete");
}
else{
	$q = $dbh->prepare("DELETE FROM user WHERE usr_id = ?");
	$q->execute(array($id));
	header("Location:index.php?msg=User has been deleted");
}
?>
<?php

require_once 'header.php';
require_once 'connection.php';

$q = $dbh->prepare('SELECT * FROM user WHERE usr_id = ?');
$q->execute(array($_GET['id']));

$q->bindColumn(2, $name);
$q->bindColumn(3, $email);
$q->bindColumn(5, $sex);
$q->bindColumn(6, $important);

$q->fetch();

?>

<form action="edit_process.php?id=<?php echo $_GET['id']; ?>" method="post">
	<?php echo isset($_GET['msg']) ? '<p>'.$_GET['msg'].'</p>' : '' ; ?>
	Name:
	<input type="text" name="name" required="required" value="<?php echo isset($_SESSION['sample_name']) && $_SESSION['sample_name'] != '' ? $_SESSION['sample_name'] : $name; ?>"><br/>
	Email:
	<input type="email" name="email" required="required" value="<?php echo isset($_SESSION['sample_email']) && $_SESSION['sample_email'] != '' ? $_SESSION['sample_email'] : $email; ?>"><br/>
	Password:
	<input type="password" name="password" required="required"><br/>
	Confirm Password:
	<input type="password" name="password2"><br/>
	Sex:
	<select name="sex" required="required">
		<option></option>
		<option <?php
		
		if(isset($_SESSION['sample_sex']) && ($_SESSION['sample_sex'] == 'Male')){ echo "selected"; }
		else{ if($sex == 'Male'){ echo "selected"; } }
				
		?>>Male</option>
		<option <?php
		
		if(isset($_SESSION['sample_sex']) && ($_SESSION['sample_sex'] == 'Female')){ echo "selected"; }
		else{ if($sex == 'Female'){ echo "selected"; } }
		
		?>>Female</option>
	</select><br/>
	<input type="checkbox" name="important" <?php
	
	if(isset($_SESSION['sample_important']) && ($_SESSION['sample_important'] == 'on')){ echo 'checked="yes"'; }
	else{ if($important == 'on'){ echo 'checked="yes"'; } }
	
	?> >Important<br/>
	<input type="submit" value="Save">
	<button><a href="back_process.php">Back</a></button>
</form>

<?php require_once 'footer.php'; ?>
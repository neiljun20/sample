<?php

require_once 'connection.php';

$q = $dbh->prepare('SELECT * FROM user WHERE usr_id = ?');
$q->execute(array($_GET['id']));

$q->bindColumn(2, $name);
$q->bindColumn(3, $email);
$q->bindColumn(5, $sex);
$q->bindColumn(6, $important);

$q->fetch();

?>

<form id="redcord">
	Name:
	<input type="text" name="name" required="required" value="<?php echo $name; ?>"><br/>
	Email:
	<input type="email" name="email" required="required" value="<?php echo $email; ?>"><br/>
	Password:
	<input type="password" name="password" required="required"><br/>
	Confirm Password:
	<input type="password" name="password2"><br/>
	Sex:
	<select name="sex" required="required">
		<option></option>
		<option <?php if($sex == 'Male'){ echo "selected"; } ?>>Male</option>
		<option <?php if($sex == 'Female'){ echo "selected"; } ?>>Female</option>
	</select><br/>
	<input type="checkbox" name="important" <?php if($important == 'on'){ echo 'checked="yes"'; } ?> >Important<br/>
	
	<input type="submit" value="Save" onClick="save('prc/edit_process.php?id=<?php echo $_GET['id']; ?>')">
	<input type="button" value="Back" onClick="ajaxMe('inc/index.php')">
</form>

<?php require_once 'footer.php'; ?>
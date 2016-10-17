<?php

require_once 'header.php';
require_once 'connection.php';

$search = isset($_SESSION['sample_search']) ? $_SESSION['sample_search'] : '' ;

?>

<p><a href="../">Back</a></p>

<p>PDO is an acronym for PHP Data Objects.<br/>
PDO is a lean, consistent way to access databases.<br/>
This means developers can write portable code much easier.<br/>
PDO is not an abstraction layer like PearDB.<br/>
PDO is a more like a data access layer which uses a unified<br/>
API (Application Programming Interface).</p>

<form action="search_process.php" method="post">
	Search:
	<input type="text" name="search" value="<?php echo $search ?>" />
	<input type="submit" value="Search">
</form>

<p>
	<a href="add.php">Add</a>
</p>

<?php echo isset($_GET['msg']) ? '<p>'.$_GET['msg'].'</p>' : '' ; ?>

<table>
	<tr>
		<th>ID</th>
		<th>Name</th>
		<th>Email Address</th>
		<th>Sex</th>
		<th>Important</th>
		<th></th>
		<th></th>
	</tr>
	<?php
	
	$q = $dbh->prepare('SELECT * FROM user WHERE usr_name LIKE ?');
	$q->execute(array("%$search%"));
	
	$q->bindColumn(1, $id);
	$q->bindColumn(2, $name);
	$q->bindColumn(3, $email);
	$q->bindColumn(5, $sex);
	$q->bindColumn(6, $important);
	
	while($q->fetch()){
		
	?>
	<tr>
		<td><?php echo $id ?></td>
		<td><?php echo $name ?></td>
		<td><?php echo $email ?></td>
		<td><?php echo $sex ?></td>
		<td><?php echo $important == 'on' ? 'This user is important' : '' ; ?></td>
		<td><a href="edit.php?id=<?php echo $id ?>">Edit</a></td>
		<td><a href="delete_process.php?id=<?php echo $id ?>">Delete</a></td>
	</tr>
	<?php } ?>
</table>

<?php require_once 'footer.php'; ?>
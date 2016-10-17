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

require_once 'connection.php';

$search = $_GET['search'];

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
	<td><input type="button" onClick="editButton('inc/edit.php?id=<?php echo $id ?>')" value="Edit"></td>
	<td><input type="button" onClick="deleteMe('prc/delete_process.php?id=<?php echo $id ?>')" value="Delete"><a href="delete_process.php?id=<?php echo $id ?>"></td>
</tr>
<?php } ?>
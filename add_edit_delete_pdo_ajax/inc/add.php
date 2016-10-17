<form id="redcord">
	Name:
	<input type="text" name="name" required="required"><br/>
	Email:
	<input type="email" name="email" required="required"><br/>
	Password:
	<input type="password" name="password" required="required"><br/>
	Confirm Password:
	<input type="password" name="password2"><br/>
	Sex:
	<select name="sex" required="required">
		<option></option>
		<option>Male</option>
		<option>Female</option>
	</select><br/>
	<input type="checkbox" name="important">Important<br/>
		
	<input type="submit" value="Save" onClick="save('prc/add_process.php')">
	<input type="button" value="Back" onClick="ajaxMe('inc/index.php')">
</form>
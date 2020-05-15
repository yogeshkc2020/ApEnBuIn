<?php
	include "navbar.php";
	include "connection.php";
?>
<!DOCTYPE html>
<html>
<head>
<title>Edit Profile</title>
<style type="text/css">
.form-control {
  width:250px;
  height: 38px;
}
.form1 {
	margin:0 595px;
	text-align: center;
}
label {
  color: black;
</style>
</head>
<body>
	<h2 style="text-align: center;color: black;">Edit Information</h2>&nbsp
	<?php
		$sql = "SELECT * FROM librarian WHERE username='$_SESSION[login_user]'";
		$result = mysqli_query($db,$sql) or die (mysql_error());
		while ($row = mysqli_fetch_assoc($result)) 
		{
			$firstname=$row['firstname'];
			$surname=$row['surname'];
			$username=$row['username'];
			$password=$row['password'];
			$email=$row['email'];
			$contact=$row['contact'];
		}
	?>

	<div class="form1">
		<form action="" method="post" enctype="multipart/form-data">

		<label><h4><b>First Name:</b></h4></label>
		<input class="form-control" type="text" name="firstname" value="<?php echo $firstname; ?>">

		<label><h4><b>Last Name</b></h4></label>
		<input class="form-control" type="text" name="surname" value="<?php echo $surname; ?>">

		<label><h4><b>Username</b></h4></label>
		<input class="form-control" type="text" name="username" value="<?php echo $username; ?>">

		<label><h4><b>Password</b></h4></label>
		<input class="form-control" type="text" name="password" value="<?php echo $password; ?>">

		<label><h4><b>Email</b></h4></label>
		<input class="form-control" type="text" name="email" value="<?php echo $email; ?>">

		<label><h4><b>Contact No</b></h4></label>
		<input class="form-control" type="text" name="contact" value="<?php echo $contact; ?>">

		<br>
		<button style="text-align: center;" class="btn btn-success" type="submit" name="submit">Save</button>
	    </form>
    </div>
	<?php 

		if(isset($_POST['submit']))
		{
			$firstname=$_POST['firstname'];
			$surname=$_POST['surname'];
			$username=$_POST['username'];
			$password=$_POST['password'];
			$email=$_POST['email'];
			$contact=$_POST['contact'];

			$sql1= "UPDATE librarian SET firstname='$firstname', surname='$surname', username='$username', password='$password', email='$email', contact='$contact' WHERE username='".$_SESSION['login_user']."';";

			if(mysqli_query($db,$sql1))
			{
				?>
					<script type="text/javascript">
						alert("Saved Successfully.");
						window.location="profile.php";
					</script>
				<?php
			}
		}
 	?>
</body>
</html>
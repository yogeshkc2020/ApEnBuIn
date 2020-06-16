<?php
  include "../connection.php";
  include "../navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Book Request</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
background-color: #19d7e0;
font-family: "Lato", sans-serif;
}
.srch {
padding-left: 850px;
}
.form-control {
width: 300px;
height: 40px;
background-color: black;
color: white;
}
.sidenav {
  height: 100%;
  margin-top: 50px;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #222;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}
.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #337ab7;
  display: block;
  transition: 0.3s;
}
.sidenav a:hover {
  color: white;
}
.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}
#main {
  transition: margin-left .5s;
  padding: 16px;
}
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.h:hover
{
	color:white;
	width: 300px;
	height: 50px;
	background-color: #19d7e0;
}
.container
{
	height: 600px;
	background-color: black;
	opacity: .8;
	color: white;
}
</style>
</head>
<body>	
	<div id="mySidenav" class="sidenav">
		<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
		<div style="color: white; margin-left: 60px; font-size: 20px;">
		<?php
		if(isset($_SESSION['login_user']))
		{ 	
			echo "Welcome ".$_SESSION['login_user']; 
		}
		?>
	</div><br><br>
	<div class="h"><a href="books.php">List Of Books</a></div>
    <div class="h"><a href="add.php">Add Books</a></div>
	<div class="h"><a href="request.php">Book Request</a></div>
	<div class="h"><a href="user.php">User Information</a></div>
	</div>
<div id="main">
	<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>
	<script>
	function openNav() {
	  document.getElementById("mySidenav").style.width = "250px";
	  document.getElementById("main").style.marginLeft = "250px";
	  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
	}
	function closeNav() {
	  document.getElementById("mySidenav").style.width = "0";
	  document.getElementById("main").style.marginLeft= "0";
	  document.body.style.backgroundColor = "#19d7e0";
	}
	</script>
	<br><br>
	<div class="container">
		<div class="srch">
			<br>
			<form method="post" action="" name="form1">
				<input type="text" name="username" class="form-control" placeholder="Username" required=""><br>
				<input type="text" name="id" class="form-control" placeholder="Book ID" required=""><br>
				<button class="btn btn-success" name="submit" type="submit">Submit</button><br>
			</form>
		</div>
		<h3 style="text-align: center;">Request of Book</h3>
		<?php
		if(isset($_SESSION['login_user']))
		{
			$sql= "SELECT user.username,books.id,title,authors,edition,status FROM user inner join issue_book ON user.username=issue_book.username inner join books ON issue_book.id=books.id WHERE issue_book.approve =''";
			$res= mysqli_query($db,$sql);
			if(mysqli_num_rows($res)==0)
			{
				echo "<h2 style='text-align: center; padding-top: 50px'><b>";
				echo "There's no pending request.";
				echo "</h2></b>";
			}
			else
			{
				echo "<table class='table table-bordered' >";
				echo "<tr style='background-color: #19d7e0; color: black'>";				
				
				echo "<th>"; echo "Username";  echo "</th>";
				echo "<th>"; echo "Book ID";   echo "</th>";
				echo "<th>"; echo "Title";     echo "</th>";
				echo "<th>"; echo "Authors";   echo "</th>";
				echo "<th>"; echo "Edition";   echo "</th>";
				echo "<th>"; echo "Status";    echo "</th>";
				
				echo "</tr>";	
				while($row=mysqli_fetch_assoc($res))
			{
				echo "<tr>";

				echo "<td>"; echo $row['username'];  echo "</td>";
				echo "<td>"; echo $row['id'];        echo "</td>";
				echo "<td>"; echo $row['title'];     echo "</td>";
				echo "<td>"; echo $row['authors'];   echo "</td>";
				echo "<td>"; echo $row['edition'];   echo "</td>";
				echo "<td>"; echo $row['status'];    echo "</td>";
				
				echo "</tr>";
			}
		echo "</table>";
	}
}
else
{
	?>
	<br>
	<h4 style="text-align: center;color: yellow;">Login first to see the request.</h4>
	<?php
	}
	if(isset($_POST['submit']))
	{
		$_SESSION['name']=$_POST['username'];
		$_SESSION['id']=$_POST['id'];
		?>
		<script type="text/javascript">
		window.location="approve.php"
		</script>
		<?php
		}
		?>
	</div>
</div>
</body>
</html>
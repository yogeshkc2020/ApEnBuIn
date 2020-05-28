<?php
  include "connection.php";
  include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Book Request</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
font-family: "Lato", sans-serif;
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
	<div class="h"> <a href="books.php">List Of Books</a></div>
	<div class="h"> <a href="request.php">Book Request</a></div>
	<div class="h"> <a href="issue_info.php">Issue Information</a></div>
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
	  document.body.style.backgroundColor = "white";
	}
	</script>
	<br><br>
	<div class="container">
	    <?php
	    if(isset($_SESSION['login_user']))
		{
			$q=mysqli_query($db,"SELECT * from issue_book where username='$_SESSION[login_user]' and approve='' ;");
			if(mysqli_num_rows($q)==0)
			{
				echo "There's no pending request";
			}
			else
			{
				echo "<table class='table table-bordered table-hover' >";
				echo "<tr style='background-color: #19d7e0;'>";
				
				echo "<th>"; echo "Book-ID";         echo "</th>";
				echo "<th>"; echo "Approve Status";  echo "</th>";
				echo "<th>"; echo "Issue Date";      echo "</th>";
				echo "<th>"; echo "Return Date";     echo "</th>";
				
				echo "</tr>";	
				while($row=mysqli_fetch_assoc($q))
			{
				echo "<tr>";

				echo "<td>"; echo $row['id'];      echo "</td>";
				echo "<td>"; echo $row['approve']; echo "</td>";
				echo "<td>"; echo $row['issue'];   echo "</td>";
				echo "<td>"; echo $row['return'];  echo "</td>";
				
				echo "</tr>";
			}
		echo "</table>";
	}
}
else
{
	echo "</br></br></br>"; 
	echo "<h2><b>";
	echo "Login first to see the request information.";
	echo "</b></h2>";
}
        ?>
</div>
    </div>
</body>
</html>
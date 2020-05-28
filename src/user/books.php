<?php
  include "connection.php";
  include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
  <title>List Of Books</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: "Lato", sans-serif;
}
.srch {
  padding-left: 870px;
  margin-top: -50px;
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
            if(isset($_SESSION['login_user'])){ 	
               echo "Welcome ".$_SESSION['login_user']; 
            }
          ?>
      </div><br><br>
  <div class="h"><a href="books.php">List Of Books</a></div>
  <div class="h"><a href="request.php">Book Request</a></div>
  <div class="h"><a href="issue_info.php">Issue Information</a></div>
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

 <div class="srch" style="margin-bottom: -20px;">
  <form class="navbar-form" method="post" name="form1">
      <input class="form-control" type="text" name="search" placeholder="Enter Book Title" required="">
      <button style="background-color: #19d7e0;" type="submit" name="submit" class="btn btn-default">
      <span class="glyphicon glyphicon-search"></span>
      </button>
  </form>
	<form class="navbar-form" method="post" name="form1">
			<input class="form-control" type="text" name="id" placeholder="Enter Book ID" required="">
			<button style="background-color: #18e674;" type="submit" name="submit1" class="btn btn-default">Request
			</button>
	</form>
</div>

  <h2>List Of Books</h2>
  <?php
      if(isset($_POST['submit'])) 
      {
        $q=mysqli_query($db,"SELECT * from books where title like '%$_POST[search]%' ");
        if(mysqli_num_rows($q)==0)
        {
          echo "Sorry, no book found.";
        }
        else 
        {
          echo "<table class='table table-bordered table-hover'>";
          echo "<tr style='background-color: #19d7e0;'>";
            echo "<th>"; echo "ID";       echo "</th>";
            echo "<th>"; echo "ISBN";     echo "</th>";
            echo "<th>"; echo "Title";    echo "</th>";
            echo "<th>"; echo "Authors";  echo "</th>";
            echo "<th>"; echo "Edition";  echo "</th>";
            echo "<th>"; echo "Status";   echo "</th>";
            echo "<th>"; echo "Quantity"; echo "</th>";
          echo "</tr>";
        while($row=mysqli_fetch_assoc($q)) 
        {
          echo "<tr>";
            echo "<td>"; echo $row['id'];       echo "</td>";
            echo "<td>"; echo $row['isbn'];     echo "</td>";
            echo "<td>"; echo $row['title'];    echo "</td>";
            echo "<td>"; echo $row['authors'];  echo "</td>";
            echo "<td>"; echo $row['edition'];  echo "</td>";
            echo "<td>"; echo $row['status'];   echo "</td>";
            echo "<td>"; echo $row['quantity']; echo "</td>";
          echo "</tr>";
        }
          echo "</table>";
        }
      }
      else 
      {
        $res=mysqli_query($db,"SELECT * FROM `books` ORDER BY `books`.`title` ASC; ");

            echo "<table class='table table-bordered table-hover'>";
            echo "<tr style='background-color: #19d7e0;'>";
              echo "<th>"; echo "ID";       echo "</th>";
              echo "<th>"; echo "ISBN";     echo "</th>";
              echo "<th>"; echo "Title";    echo "</th>";
              echo "<th>"; echo "Authors";  echo "</th>";
              echo "<th>"; echo "Edition";  echo "</th>";
              echo "<th>"; echo "Status";   echo "</th>";
              echo "<th>"; echo "Quantity"; echo "</th>";
            echo "</tr>";
        while($row=mysqli_fetch_assoc($res))
      {
          echo "<tr>";
            echo "<td>"; echo $row['id'];        echo "</td>";
            echo "<td>"; echo $row['isbn'];      echo "</td>";
            echo "<td>"; echo $row['title'];     echo "</td>";
            echo "<td>"; echo $row['authors'];   echo "</td>";
            echo "<td>"; echo $row['edition'];   echo "</td>";
            echo "<td>"; echo $row['status'];    echo "</td>";
            echo "<td>"; echo $row['quantity'];  echo "</td>";
          echo "</tr>";
      }
          echo "</table>";
      }     
      if(isset($_POST['submit1']))
		  {
			  if(isset($_SESSION['login_user']))
			  {
				  mysqli_query($db,"INSERT INTO issue_book Values('$_SESSION[login_user]', '$_POST[id]', '', '', '');");
				  ?>
					<script type="text/javascript">
					window.location="request.php"
					</script>
				  <?php
			  }
			  else
			  {
				  ?>
					<script type="text/javascript">
          alert("Please Login First.");
          window.location="index.php";
					</script>
			 	  <?php
			  }
		  }
  ?>
</body>
</html>
<?php
  include "../connection.php";
  include "../navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
  <title>User Information</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
font-family: "Lato", sans-serif;
}
.srch {
padding-left: 910px;
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
    <div style="color:white; margin-left: 60px; font-size: 20px;">
        <?php
          if(isset($_SESSION['login_user'])){
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
  document.body.style.backgroundColor = "white";
}
</script>

  <div class="srch" style="margin-bottom: -20px;">
    <form class="navbar-form" method="post" name="form1">
      <input class="form-control" type="text" name="search" placeholder="Username" required="">
      <button style="background-color: #19d7e0;" type="submit" name="submit" class="btn btn-default">
      <span class="glyphicon glyphicon-search"></span>
      </button>
    </form>
    <form class="navbar-form" method="post" name="form1">
      <input class="form-control" type="text" name="username" placeholder="Enter Username" required="">
      <button style="background-color: #ff6565;" type="submit" name="submit1" class="btn btn-default">
      <span class="glyphicon glyphicon-trash"></span>
      </button>
    </form>
  </div>

  <h2>List Of Users</h2>
  <?php
      if(isset($_POST['submit'])) {
        $q=mysqli_query($db,"SELECT firstname,surname,username,email,contact FROM `user`
        where username like '%$_POST[search]%' ");
        if(mysqli_num_rows($q)==0) {
          echo "Sorry! No user found with that username. Try searching again.";
        }
        else {
          echo "<table class='table table-border table-hover'>";
          echo "<tr style='background-color: #19d7e0;'>";

          echo "<th>"; echo "First Name";  echo "</th>";
            echo "<th>"; echo "Last Name"; echo "</th>";
            echo "<th>"; echo "Username";  echo "</th>";
            echo "<th>"; echo "Email";     echo "</th>";
            echo "<th>"; echo "Contact";   echo "</th>";
          echo "</tr>";
        while($row=mysqli_fetch_assoc($q)) {
          echo "<tr>";
            echo "<td>"; echo $row['firstname']; echo "</td>";
            echo "<td>"; echo $row['surname'];   echo "</td>";
            echo "<td>"; echo $row['username'];  echo "</td>";
            echo "<td>"; echo $row['email'];     echo "</td>";
            echo "<td>"; echo $row['contact'];   echo "</td>";
          echo "</tr>";
        }
          echo "</table>";
        }
      }
      else {
        $res=mysqli_query($db,"SELECT firstname,surname,username,email,contact FROM `user`; ");
          echo "<table class='table table-bordered table-hover'>";
          echo "<tr style='background-color: #19d7e0;'>";
            echo "<th>"; echo "First Name";  echo "</th>";
            echo "<th>"; echo "Last Name";   echo "</th>";
            echo "<th>"; echo "Username";    echo "</th>";
            echo "<th>"; echo "Email";       echo "</th>";
            echo "<th>"; echo "Contact";     echo "</th>";
          echo "</tr>";
      while($row=mysqli_fetch_assoc($res)) {
          echo "<tr>";
            echo "<td>"; echo $row['firstname']; echo "</td>";
            echo "<td>"; echo $row['surname'];   echo "</td>";
            echo "<td>"; echo $row['username'];  echo "</td>";
            echo "<td>"; echo $row['email'];     echo "</td>";
            echo "<td>"; echo $row['contact'];   echo "</td>";
          echo "</tr>";
      }
          echo "</table>";
      }
      if(isset($_POST['submit1'])) 
      {
        if(isset($_SESSION ['login_user'])) 
        {
          mysqli_query($db,"DELETE from user where username = '$_POST[username]';");
          ?>
          <script type="text/javascript">
          alert("Delete Successful.");
          window.location="user.php";
          </script>
          <?
        }
        else
        {
          ?>
          <script type="text/javascript">
          alert("Please Login First.");
          window.location="../index.php";
          </script>
          <?
        }
      }
  ?>
</div>
</div>
</body>
</html>
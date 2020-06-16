<?php
  include "../connection.php";
  include "../navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
  <title>Add Books</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  background-color: #19d7e0;
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
.book {
    width: 400px;
    margin: 0px auto;
}
.form-control {
    background-color: white;
    color: black;
    height: 40px;
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
  <span style="font-size:30px;cursor:pointer; color: black;" onclick="openNav()">&#9776; open</span>
  <div class="container">
      <h2 style="color: black; font-family: Lucida Console; text-align: center;"><b>Add New Books</b></h2>
        <form class="book" action="" method="POST" style="text-align: center;">
           <input type="text" name="id" class="form-control" placeholder="Book ID" required=""><br>
           <input type="text" name="isbn" class="form-control" placeholder="ISBN" required=""><br>
           <input type="text" name="title" class="form-control" placeholder="Title" required=""><br>
           <input type="text" name="authors" class="form-control" placeholder="Authors" required=""><br>
           <input type="text" name="edition" class="form-control" placeholder="Edition" required=""><br>
           <input type="text" name="status" class="form-control" placeholder="Status" required=""><br>
           <input type="text" name="quantity" class="form-control" placeholder="Quantity" required=""><br>

           <button class="btn btn-warning" type="submit" name="submit" style="color: black;">ADD</button>
        </form>
  </div>
  <?php
    if(isset($_POST['submit'])) 
  {
    if(isset($_SESSION['login_user'])) 
  {
      mysqli_query($db,"INSERT INTO books VALUES ('$_POST[id]', '$_POST[isbn]', '$_POST[title]', '$_POST[authors]', '$_POST[edition]', '$_POST[status]', '$_POST[quantity]') ;");
  ?>
    <script type="text/javascript">
    alert("Book Added Successfully.");
    window.location="books.php";
    </script>
  <?php
  }
  else
  {
    ?>
      <script type="text/javascript">
        alert("You need to login first.");
        window.location="../index.php";
      </script>
    <?php
  }
  }
  ?>
  </div>
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
</body>
</html>
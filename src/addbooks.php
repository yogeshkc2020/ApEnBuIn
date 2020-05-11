<?php
  include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>
  <title>Add Books</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style type="text/css">
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
  color: #818181;
  display: block;
  transition: 0.3s;
}
  .sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}
  .book {
  width: 400px;
  margin: 0px auto;
}
  </style>
</head>
<body>

  <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div class="h"><a href="add.php">Add Books</a></div>
  <div class="h"><a href="delete.php">Delete Books</a></div>
</div>

<div>
  <span style="font-size:30px; cursor:pointer; color: black;" onclick="openNav()">&#9776; open</span>
  <div>
      <h2 style="color: black; font-family: Lucida Console; text-align: center;"><b>Add New Book</b></h2>
      <form class="book" action="" method="POST" style="text-align: center;">
          <input type="text" name="id" class="form-control" placeholder="ID" required=""><br>
          <input type="text" name="isbn" class="form-control" placeholder="ISBN" required=""><br>
          <input type="text" name="title" class="form-control" placeholder="Book Title" required=""><br>
          <input type="text" name="author" class="form-control" placeholder="Author Name" required=""><br>
          <input type="text" name="edition" class="form-control" placeholder="Edition" required=""><br>
          <input type="text" name="status" class="form-control" placeholder="Status" required=""><br>
          <input type="text" name="quantity" class="form-control" placeholder="Quantity" required=""><br>
          <button class="btn btn-default" type="submit" name="submit">ADD</button>
      </form>
  </div>
 </div>

<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "300px";
  document.getElementById("main").style.marginLeft = "300px";
}
function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
</script>
</body>
</html>
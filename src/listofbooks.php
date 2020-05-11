<?php
  include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>
  <title>List Of Books</title>
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
  </style>
</head>
<body>
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div class="h"><a href="add.php">Add Books</a></div>
  <div class="h"><a href="delete.php">Delete Books</a></div>
</div>

<div>
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>
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
  <h2 style="text-align: center;">List Of Books</h2>
  <table class='table table-border table-hover'>
    <tr style='background-color: #19d7e0;'>
      <th>ID</th>
      <th>ISBN</th>
      <th>Book Title</th>
      <th>Author Name</th>
      <th>Edition</th>
      <th>Status</th>
      <th>Quantity</th>
    </tr>
  </table>
</body>
</html>
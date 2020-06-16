<?php
  include "../connection.php";
  include "../navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
  <title>Issue Information</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
background-color: #19d7e0;
font-family: "Lato", sans-serif;
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
.scroll
{
  width: 100%;
  height: 500px;
  overflow: auto;
}
th,td
{
  width: 10%;
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
        <div class="h"><a href="books.php">Books</a></div>
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
    document.body.style.backgroundColor = "#19d7e0";
  }
  </script>
  <div class="container">
    <h3 style="text-align: center;">Information of Borrowed Books</h3><br>
    <?php
    $c=0;
      if(isset($_SESSION['login_user']))
      {
        $sql="SELECT user.username,books.id,title,authors,edition,issue,issue_book.return FROM user inner join issue_book ON user.username=issue_book.username inner join books ON issue_book.id=books.id WHERE issue_book.username ='$_SESSION[login_user]' and issue_book.approve !='' ORDER BY `issue_book`.`return` ASC";
        $res=mysqli_query($db,$sql);
      
        echo "<table class='table table-bordered' style='width:100%;' >";
        
        echo "<tr style='background-color: #19d7e0; color: black'>";
        echo "<th>"; echo "Username";    echo "</th>";
        echo "<th>"; echo "Book ID";     echo "</th>";
        echo "<th>"; echo "Title";       echo "</th>";
        echo "<th>"; echo "Authors";     echo "</th>";
        echo "<th>"; echo "Edition";     echo "</th>";
        echo "<th>"; echo "Issue Date";  echo "</th>";
        echo "<th>"; echo "Return Date"; echo "</th>";
        echo "</tr>"; 

        echo "</table>";

        echo "<div class='scroll'>";
        echo "<table class='table table-bordered' >";
      while($row=mysqli_fetch_assoc($res))
      {
        echo "<tr>";
        echo "<td>"; echo $row['username']; echo "</td>";
        echo "<td>"; echo $row['id']; echo "</td>";
        echo "<td>"; echo $row['title']; echo "</td>";
        echo "<td>"; echo $row['authors']; echo "</td>";
        echo "<td>"; echo $row['edition']; echo "</td>";
        echo "<td>"; echo $row['issue']; echo "</td>";
        echo "<td>"; echo $row['return']; echo "</td>";
        echo "</tr>";
      }
        echo "</table>";
        echo "</div>";
       
      }
      else
      {
      ?>
      <h3 style="text-align: center;">Login to see information of Borrowed Books</h3>
      <?php
      }
    ?>
  </div>
</div>
</body>
</html>
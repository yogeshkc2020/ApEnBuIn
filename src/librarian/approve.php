<?php
  include "../connection.php";
  include "../navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Approve Request</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
background-color: #19d7e0;
font-family: "Lato", sans-serif;
}
.form-control{
width: 300px;
height: 45px;
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
  width: 500px;
	height: 400px;
	background-color: black;
	opacity: .8;
	color: white;
}
.Approve
{
  margin-left: 80px;
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
<div class="container">
    <br><h3 style="text-align: center;">Approve Request</h3><br><br>
    <form class="Approve" action="" method="post">
        <input class="form-control" type="text" name="approve" placeholder="Yes or No" required=""><br>
        <input type="text" name="issue" placeholder="Issue Date yyyy-mm-dd" required="" class="form-control"><br>
        <input type="text" name="return" placeholder="Return Date yyyy-mm-dd" required="" class="form-control"><br>
        <button class="btn btn-success" type="submit" name="submit" style="text-align: center;">Approve</button>
    </form>
  </div>
</div>
<?php
  if(isset($_POST['submit']))
  {
    mysqli_query($db,"UPDATE  `issue_book` SET  `approve` =  '$_POST[approve]', `issue` =  '$_POST[issue]', `return` =  '$_POST[return]' WHERE username='$_SESSION[name]' and id='$_SESSION[id]';");
    mysqli_query($db,"UPDATE books SET quantity = quantity-1 where id='$_SESSION[id]' ;");
    $res=mysqli_query($db,"SELECT quantity from books where id='$_SESSION[id];");
    while($row=mysqli_fetch_assoc($res))
    {
      if($row['quantity']==0)
      {
        mysqli_query($db,"UPDATE books SET status='not-available' where id='$_SESSION[id]';");
      }
    }
    ?>
      <script type="text/javascript">
        alert("Updated successfully.");
        window.location="request.php"
      </script>
    <?php
  }
?>
</body>
</html>
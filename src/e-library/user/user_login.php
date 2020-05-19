<?php
  include "connection.php";
  include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>User Login</title>
    <link rel="stylesheet" href="style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
section {
margin-top: -20px;
height: 737px;
background-image: url('images/login.jpg');
}
</style>
</head>
<body>
<section>
    <div class="log_img">
        <br>
        <div class="box1">
            <h1 style="text-align: center; font-size: 35px; font-family: Lucida Console;">E-Library</h1>
            <h1 style="text-align: center; font-size: 25px;">User Login Form</h1><br>
          <form name="login" action="" method="post">
            <div class="login">
                <input class="form-control" type="text" name="username" placeholder="Username" required=""> <br>
                <input class="form-control" type="password" name="password" placeholder="Password" required=""> <br>
                <input class="btn btn-warning" type="submit" name="submit" value="Login" style="color: black; width: 70px; height: 30px;">
            </div>
            <p style="color: white; padding-left: 15px;">
                <br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                <a style="color: white; text-decoration: none;" href="update_password.php">Reset Password</a> 
            </p>
          </form>
        </div>
    </div>
</section>
  <?php
    if(isset($_POST['submit']))
    {
      $count=0;
      $res=mysqli_query($db, "SELECT * FROM `user` WHERE username='$_POST[username]' && password='$_POST[password]';");
      $row= mysqli_fetch_assoc($res);
      $count=mysqli_num_rows($res);
      if($count==0)
      {
          ?>
            <div class="alert alert-danger" style="width: 650px; margin-left: 400px; margin-top: -150px; background-color: #ee0a0a; color: white;">
              <strong>The username and password doesn't match.</strong>
            </div>
          <?php
      }
      else
      {
          $_SESSION['login_user'] = $_POST['username'];
          ?>
          <script type="text/javascript"> 
          window.location="profile.php"         
          </script>
          <?php
      }
    }
  ?>
</body>
</html>
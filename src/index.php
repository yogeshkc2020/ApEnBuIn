<?php
     include "connection.php";
     include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
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
label {
  font-size: 18px;
  font-weight: 600;
}
.box1 {
    height: 500px;
    width: 450px;
    background-color: #0a0605;
    margin: 0px auto;
    opacity: .8;
    color: white ;
    padding: 20px;
}
</style>
</head>
<body>
<section>
    <div class="log_img">
        <br>
        <div class="box1">
            <h1 style="text-align: center; font-size: 35px; font-family: Lucida Console;">E-Library</h1>
            <h1 style="text-align: center; font-size: 25px;">Login Form</h1><br>
          <form name="login" action="" method="post">
          <b><p style="padding-left: 50px; font-size: 15px; font-weight: 700;">Login as:</p></b>
          <input style="margin-left: 50px; width: 18px;" type="radio" name="user" id="librarian" value="librarian">&nbsp;
          <label for="librarian">Librarian</label>
          <input style="margin-left: 50px; width: 18px;" type="radio" name="user" id="user" value="user" checked="">&nbsp;
          <label for="user">User</label>
            <div style="padding-top: 20px;" class="login">
                <input class="form-control" type="text" name="username" placeholder="Username" required=""><br>
                <input class="form-control" type="password" name="password" placeholder="Password" required=""><br>
                <input class="btn btn-warning" type="submit" name="submit" value="Login" style="color: black; width: 70px; height: 30px;">
            </div>
          </form>
        </div>
    </div>
</section>
<?php
    if(isset($_POST['submit']))
    {
      if($_POST['user']=='librarian') {
        $count=0;
  $res=mysqli_query($db, "SELECT * FROM `librarian` WHERE username='$_POST[username]' && password='$_POST[password]';");
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
    window.location="librarian/books.php"         
    </script>
    <?php
  }
      }
      else {
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
          window.location="user/books.php"         
          </script>
          <?php
      }
    }
    }
  ?>
</body>
</html>
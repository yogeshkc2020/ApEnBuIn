<?php
  include "connection.php";
  include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
    <link rel="stylesheet" href="style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
section {
margin-top: -50px;
height: 767px;
background-image: url('images/registration.jpg');
}
</style>
</head>
<body>
<section>
      <br>
        <div class="box2">
            <h1 style="text-align: center; font-size: 35px; font-family: Lucida Console;">E-Library</h1>
            <h1 style="text-align: center; font-size: 25px;">Registration Form</h1>
            <form name="registration" action="" method="post">
              <b><p style="padding-left: 50px; font-size: 15px; font-weight: 700;">Sign Up as:</p></b>
              <input style="margin-left: 50px; width: 18px;" type="radio" name="user" id="librarian" value="librarian">&nbsp;
              <label for="librarian">Librarian</label>
              <input style="margin-left: 50px; width: 18px;" type="radio" name="user" id="user" value="user" checked="">&nbsp;
              <label for="user">User</label>
                <div style="padding-top: 10px;" class="login">
                   <input class="form-control" type="text" name="firstname" placeholder="First Name" required=""> <br>
                   <input class="form-control" type="text" name="surname" placeholder="Last Name" required=""> <br>
                   <input class="form-control" type="text" name="username" placeholder="Username" required=""> <br>
                   <input class="form-control" type="password" name="password" placeholder="Password" required=""> <br>
                   <input class="form-control" type="text" name="email" placeholder="Email" required=""> <br>
                   <input class="form-control" type="text" name="contact" placeholder="Phone No" required=""> <br>
                   <input class="btn btn-success" type="submit" name="submit" value="Sign Up" style="color: black; width: 70px; height: 30px;"> 
                </div>
            </form>
        </div>
</section>
    <?php
      if(isset($_POST['submit'])) 
      {
        if ($_POST['user']=='librarian') {
          $count=0;
          $sql="SELECT username from `librarian`";
          $res=mysqli_query($db,$sql);

          while($row=mysqli_fetch_assoc($res))
          {
            if($row['username']==$_POST['username'])
            {
                $count=$count+1;
            }
          }
       if($count==0)
         {mysqli_query($db,"INSERT INTO `librarian` VALUES('$_POST[firstname]', '$_POST[surname]', '$_POST[username]', '$_POST[password]', '$_POST[email]', '$_POST[contact]');");
    ?>
      <script type="text/javascript"> 
      alert("Registration successful");
      window.location="index.php"         
      </script>
    <?php
    }
    else
    {
    ?>
      <script type="text/javascript">
      alert("The username already exist.");
      </script>
    <?php
    }
        }
        else {

          $count=0;
          $sql="SELECT username from `user`";
          $res=mysqli_query($db,$sql);

          while($row=mysqli_fetch_assoc($res))
          {
            if($row['username']==$_POST['username'])
            {
                $count=$count+1;
            }
          }
       if($count==0)
         {mysqli_query($db,"INSERT INTO `user` VALUES('$_POST[firstname]', '$_POST[surname]', '$_POST[username]', '$_POST[password]', '$_POST[email]', '$_POST[contact]');");
    ?>
      <script type="text/javascript"> 
      alert("Registration successful");
      window.location="index.php"         
      </script>
    <?php
    }
    else
    {
    ?>
      <script type="text/javascript">
        alert("The username already exist.");
      </script>
    <?php
    }
  }
    }
    ?>
</body>
</html>
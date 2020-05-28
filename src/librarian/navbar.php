<?php
   session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-inverse">     
        <div class="container-fluid">       
            <div class="navbar-header" style="padding-top: 15px;">
                <a class="navber-brand active" style="margin: 15px; text-decoration: none;">E-LIBRARY</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="books.php">BOOKS</a></li>
            </ul>
            <?php
                  if(isset($_SESSION['login_user'])) 
                  {
                    ?>
                    <ul class="nav navbar-nav">
                       <li><a href="user.php">USER-INFORMATION</a></li>
                    </ul>     
                    <ul class="nav navbar-nav navbar-right">
                        <li><a>
                            <div style="color:white">     
                               <?php
                                  echo " ".$_SESSION['login_user'];
                               ?>
                            </div>
                        </a></li>
                        <li><a href="logout.php "><span class="glyphicon glyphicon-log-out"> LOGOUT</span></a></li>
                    </ul>
                    <?php
                   }
                    else {
                    ?>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="index.php"><span class="glyphicon glyphicon-log-in"> LOGIN</span></a></li>
                        <li><a href="registration.php"><span class="glyphicon glyphicon-user"> SIGN-UP</span></a></li>
                    </ul> 
                    <?php
                    }
                ?>      
        </div>
    </nav>
</body>
</html>
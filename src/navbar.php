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
    <nav class="navbar navbar-default">     
        <div class="container-fluid">       
            <div class="navbar-header" style="padding-top: 15px;">
                <a class="navber-brand active" style="margin: 15px;">E-LIBRARY</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="home.php">HOME</a></li>
                <li><a href="listofbooks.php">LIST OF BOOKS</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="registration.php"><span class="glyphicon glyphicon-user"> REGISTRATION</span> </a></li>
                <li><a href="student_login.php "><span class="glyphicon glyphicon-log-in"> LOGIN</span></a></li>
                <li><a href="logout.php "><span class="glyphicon glyphicon-log-out"> LOGOUT</span></a></li>
            </ul> 
        </div>
    </nav>
</body>
</html>
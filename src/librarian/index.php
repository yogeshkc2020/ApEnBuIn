<?php
     session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>
        E-Library
    </title>
    <link rel="stylesheet" href="styles.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
nav {
    float: right;
    word-spacing: 30px;
    padding: 20px;
}
nav li {
    display: inline-block;
    line-height: 80px;
}
</style>
</head>

<body>
    <div style="height: 707px; width: 1440px;">
        <header style="height: 130px; width: 1440px; background-color: black;">
            <div style="float: left; padding-left: 20px;">
                <h1 style="color: white; padding: 40px; font-size: 50px;">E-LIBRARY</h1>
            </div>
            
            <?php
               if(isset($_SESSION['login_user']))
               {
                   ?>
                    <nav>
                        <ul>
                            <li><a href="index.php">HOME</a></li>
                            <li><a href="books.php">BOOKS</a></li>
                            <li><a href="logout.php">LOGOUT</a></li>
                        </ul>
                    </nav>
            <?php
            }  
            else 
            {
                ?>
                    <nav>
                        <ul>
                            <li><a href="index.php">HOME</a></li>
                            <li><a href="books.php">BOOKS</a></li>
                            <li><a href="librarian_login.php">LOGIN</a></li>
                            <li><a href="registration.php">SIGN-UP</a></li>
                        </ul>
                    </nav>
            <?php
            }
            ?>     
        </header>

        <section style="height: 577px; width: 1440px; background-image: url('images/index.jpg');><div class=""></div></section>
            <?php
               include "footer.php";
            ?>
</body>
</html>
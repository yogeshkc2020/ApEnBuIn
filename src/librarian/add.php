<?php
  include "connection.php";
  include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>
  <title>Add Books</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<style>

body {
  background-color: #024629;
  font-family: "Lato", sans-serif;
  transition: background-color .5s;
}

.container {
  margin-top: 50px;
}

.book {
    width: 400px;
    margin: 0px auto;
}

.form-control {
    background-color: black;
    color: white;
    height: 40px;
}
</style>
</head>
<body>
  <div class="container">
      <h2 style="color: black; font-family: Lucida Console; text-align: center;"><b>Add New Books</b></h2>
        <form class="book" action="" method="POST" style="text-align: center;">
        <input type="text" name="id" class="form-control" placeholder="Book ID" required=""><br>
        <input type="text" name="isbn" class="form-control" placeholder="ISBN" required=""><br>
        <input type="text" name="title" class="form-control" placeholder="Title" required=""><br>
        <input type="text" name="authors" class="form-control" placeholder="Authors" required=""><br>
        <input type="text" name="edition" class="form-control" placeholder="Edition" required=""><br>
        <input type="text" name="status" class="form-control" placeholder="Status" required=""><br>
        <input type="text" name="quantity" class="form-control" placeholder="Quantity" required=""><br>
        <button class="btn btn-primary" type="submit" name="submit">ADD</button>
        </form>
  </div>

  <?php
    if(isset($_POST['submit'])) 
  {
    if(isset($_SESSION['login_user'])) 
  {
      mysqli_query($db,"INSERT INTO books VALUES ('$_POST[id]', '$_POST[isbn]', '$_POST[title]', '$_POST[authors]', '$_POST[edition]', '$_POST[status]', '$_POST[quantity]') ;");
  ?>
    <script type="text/javascript">alert("Book Added Successfully.");</script><?php
  }
  }
?>
</body>
</html>
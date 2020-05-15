<?php
  include "connection.php";
  include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>
<title>User Information</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.srch {
  padding-left: 1000px;
}

body {
  font-family: "Lato", sans-serif;
}
</style>
</head>
<body>

  &nbsp
  <div class="srch" style="margin-left: 180px; margin-bottom: -20px;">
    <form class="navbar-form" method="post" name="form1">
      <input class="form-control" type="text" name="search" placeholder="Username" required="">
      <button style="background-color: #19d7e0;" type="submit" name="submit" class="btn btn-default">
        <span class="glyphicon glyphicon-search"></span>
      </button>
  </form>

  <form class="navbar-form" method="post" name="form1">
      <input class="form-control" type="text" name="username" placeholder="Enter Username" required="">
      <button style="background-color: #19d7e0;" type="submit" name="submit1" class="btn btn-default">
      <span class="glyphicon glyphicon-trash"></span>

      </button>
  </form>
  </div>
  <div style="padding: 50px; padding-top: 0px;" >
  <div style="margin: -25px;">
  <h2>List Of Users</h2>
  <?php
      if(isset($_POST['submit'])) {
        $q=mysqli_query($db,"SELECT firstname,surname,username,email,contact FROM `user`
        where username like '%$_POST[search]%' ");
        if(mysqli_num_rows($q)==0) {
          echo "Sorry! No user found with that username. Try searching again.";
        }
        else {
          echo "<table class='table table-border table-hover'>";
          echo "<tr style='background-color: #19d7e0;'>";

            //Table header
            echo "<th>"; echo "First Name";  echo "</th>";
            echo "<th>"; echo "Last Name";  echo "</th>";
            echo "<th>"; echo "Username";  echo "</th>";
            echo "<th>"; echo "Email";  echo "</th>";
            echo "<th>"; echo "Contact";  echo "</th>";
          echo "</tr>";

        while($row=mysqli_fetch_assoc($q)) {

          echo "<tr>";
          echo "<td>"; echo $row['firstname']; echo "</td>";
          echo "<td>"; echo $row['surname']; echo "</td>";
          echo "<td>"; echo $row['username']; echo "</td>";
          echo "<td>"; echo $row['email']; echo "</td>";
          echo "<td>"; echo $row['contact']; echo "</td>";
          echo "</tr>";
        }

          echo "</table>";

        }
      }

      else {
        $res=mysqli_query($db,"SELECT firstname,surname,username,email,contact FROM `user`; ");

    echo "<table class='table table-bordered table-hover'>";

      echo "<tr style='background-color: #19d7e0;'>";
        echo "<th>"; echo "First Name";  echo "</th>";
        echo "<th>"; echo "Last Name";  echo "</th>";
        echo "<th>"; echo "Username";  echo "</th>";
        echo "<th>"; echo "Email";  echo "</th>";
        echo "<th>"; echo "Contact";  echo "</th>";
      echo "</tr>";

      while($row=mysqli_fetch_assoc($res)) {

        echo "<tr>";
        echo "<td>"; echo $row['firstname']; echo "</td>";
        echo "<td>"; echo $row['surname']; echo "</td>";
        echo "<td>"; echo $row['username']; echo "</td>";
        echo "<td>"; echo $row['email']; echo "</td>";
        echo "<td>"; echo $row['contact']; echo "</td>";
        echo "</tr>";
      }

    echo "</table>";
      }
      if(isset($_POST['submit1'])) 
      {
        if(isset($_SESSION ['login_user'])) 
        {
          mysqli_query($db,"DELETE from user where username = '$_POST[username]';");
          ?>
          <script type="text/javascript">
          alert("Delete Successful.");
          </script>
          <?
        }
        else
        {
          ?>
            <script type="text/javascript">
            alert("Please Login First.");
            </script>
            <?
        }
      }

  ?>
</div>
</div>
</body>
</html>
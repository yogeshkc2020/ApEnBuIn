<?php
   include "connection.php";
   include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>
   <title>Profile</title>
<style>
.wrapper {
  width: 400px;
  margin: 0 auto;
  color: black;
}
</style>
</head>
<body>
   <div class="container">
      <form action="" method="post">
      <button style="background-color: #19d7e0; float: right;" type="submit" name="submit1" class="btn btn-default">
      <span class="glyphicon glyphicon-pencil"></span>
      </button>
      </form>
   <div class="wrapper">
 		<?php
 			if(isset($_POST['submit1']))
 			{
 				?>
 				<script type="text/javascript">
 					window.location="edit.php"
 				</script>
 				<?php
 			}
 				$q=mysqli_query($db,"SELECT * FROM librarian where username='$_SESSION[login_user]' ;");
 			?>
 			<h2 style="text-align: center;">My Profile</h2>
          <?php
           	$row=mysqli_fetch_assoc($q);

            echo "<b>";
            echo "<table class='table table-bordered'>";
            echo "<tr>";
            echo "<td>"; 
            echo "<b>First Name: </b>";
            echo "</td>"; 
            echo "<td>";
            echo $row['firstname']; 
            echo "</td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td>"; 
            echo "<b>Last Name: </b>";
            echo "</td>";
            echo "<td>"; 
            echo $row['surname']; 
            echo "</td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td>"; 
            echo "<b>Username: </b>";
            echo "</td>";
            echo "<td>"; 
            echo $row['username']; 
            echo "</td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td>"; 
            echo "<b>Password: </b>";
            echo "</td>";
            echo "<td>"; 
            echo $row['password']; 
            echo "</td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td>"; 
            echo "<b>Email: </b>";
            echo "</td>";
            echo "<td>"; 
            echo $row['email']; 
            echo "</td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td>"; 
            echo "<b>Contact: </b>";
            echo "</td>";
            echo "<td>"; 
            echo $row['contact']; 
            echo "</td>";
            echo "</tr>";

            echo "</table>";
            echo "</b>";
            ?>
         </div>
      </div>
</body>
</html>
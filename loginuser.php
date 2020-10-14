<?php
 session_start();
 $message="";
if(count($_POST)>0) {
  include 'server.php';
  $sql0 = "SELECT * FROM myuser WHERE nume='" . $_POST["nume"] . "'and parola = '". $_POST["parola"]."'";
  
  $result = mysqli_query($conn , $sql0);
  $row  = mysqli_fetch_array($result);
 
  
  if(is_array($row)) {
    $_SESSION["user"]=$row["nume"];
    $_SESSION["pass"]=$row["parola"];
    $_SESSION["id"]=$row["id"];


  }
  else {
    $message = "Invalid Username or Password!";
    
  }


}
if(isset($_SESSION["user"])) {
  header("Location:index.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>

  <h2>HTML Login</h2>
  <div id="inregistrare">
    <form action="" method="POST">
    <div class="message"><?php if($message!="") { echo $message; } ?></div>

      <label for="fname">User</label><br>
      <input type="text" id="nume" name="nume" value="" required><br><br>
      
      <label for="lname">Parola</label><br>
      <input type="password" id="parola" name="parola" value="" required><br><br>
      
      

      <input type="submit" value="Login" >
      

    </form>
    <form action="resetpassword.php" method="get">
      <button type="submit">Lost Password</button>
    </form>
    <form action="createuser.php" method="get">
      <button type="submit">Inregistrare</button>
    </form>
  </div>


</body>

</html>
<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<title>Home Page</title>
</head>
<body>
<div class="container">
    <?php
      if($_SESSION["user"]) {
    ?>
      <h1>  Welcome <?php echo $_SESSION["user"]; ?>.</h1> <p>Click here to<p>
       <form action='loginuser.php' method='post'>
        <button type='submit' class="btn btn-danger btn-lg btn-block">Logout</button>
     </form>
  <?php
  }
      else { 
          echo "<h1>Please login first or Create user </h1>" ?>

  <form action='loginuser.php' method='post'>
        <button type='submit' class="btn btn-success btn-lg btn-block">Login</button>
  </form>
  <br>
  <form action='createuser.php' method='post'>
      <button type='submit' class="btn btn-primary btn-lg btn-block">Create user</button>
</form> 
<?php }?>
</div>
</body>
</html>
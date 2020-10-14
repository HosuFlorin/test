<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Home Page</title>
</head>
<body>

<?php
if($_SESSION["user"]) {
?>
Welcome <?php echo $_SESSION["user"]; ?>. Click here to <a href="logout.php" tite="Logout">Logout.
<?php
}
else { 
  echo "<h1>Please login first or Create user </h1>" ?>
<form action='loginuser.php' method='post'>
    <button type='submit'>Login</button>
</form><form action='createuser.php' method='post'>
      <button type='submit'>Create user</button>
</form> 
<?php }?>

</body>
</html>
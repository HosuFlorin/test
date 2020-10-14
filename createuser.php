<?php
session_start();
$message="";
if(count($_POST)>0){

  include 'server.php';
  $sql0 = "SELECT * FROM myuser WHERE nume='" . $_POST["nume"] ."'and email = '". $_POST["email"]."'";
  
  $result = mysqli_query($conn , $sql0);
  $row  = mysqli_fetch_array($result);
 
  
  if(!is_array($row)) {
    $_SESSION["telefon"]=$_POST["telefon"];
    $_SESSION["prenume"]=$_POST["prenume"];
    $_SESSION["email"]=$_POST["email"];
    $_SESSION["user"]=$_POST["nume"];
    $_SESSION["pass"]=$_POST["parola"];
  
    echo $_SESSION["user"];
    
    
    
    $sql = "INSERT INTO myuser (nume, prenume, email,telefon, parola)
      VALUES ('$_POST[nume]', '$_POST[prenume]', '$_POST[email]', '$_POST[telefon]', '$_POST[parola]')";

    if ($conn->query($sql) == TRUE) {
        echo "New record created successfully";
       
    } else {
         echo "Error: " . $sql . "<br>" . $conn->error;
}
  $conn->close();
  
  } else {
    $message = "User already exist !";
  }
  
 
}
if(isset($_SESSION["user"])) {
  header("Location:index.php");
  }


?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
</head>
<body>

  <h2>HTML Inregistrare</h2>
  <div id="inregistrare">
    <form action="" method="post" >
    <div class="message"><?php if($message!="") { echo $message; } ?></div>
      <h3>Titlu</h3>
      <input type="radio" id="mr" name="rad" value="Mr" checked>
      <label for="mr">Mr</label>
      <input type="radio" id="mrs" name="rad" value="Mrs">
      <label for="mrs">Mrs</label>
      <input type="radio" id="miss" name="rad" value="Miss">
      <label for="miss">Miss</label><br><br>

      <label for="fname">User name</label><br>
      <input type="text" id="nume" name="nume" value="" required><br><br>
      <label for="lname">Prenume</label><br>
      <input type="text" id="prenume" name="prenume" value="" required><br><br>
      <label for="lname">Email</label><br>
      <input type="email" id="email" name="email" value="" required><br><br>
      <label for="lname">Telefon</label><br>
      <input type="tel" id="telefon" name="telefon" value="" required><br><br>
      <label for="lname">Parola</label><br>
      <input type="password" id="parola" name="parola" value="" required ><br><br>
      <label for="judete">County</label>
      <select id="judete" name="judete">
        <option value="Maramures">Maramures</option>
        <option value="Iasi">Iasi</option>
        <option value="Cluj">Cluj</option>
        <option value="Brasov">Brasov</option>
      </select><br><br>
      <input type="checkbox" id="yes" name="yes" value="1">
      <label for="yes"> Esti de acord cu termeni si conditile</label><br><br>

      <input type="submit" name="createuser"value="Inregistrare">
      <input type="reset" value="Resetare">

    </form>
  </div>


</body>

</html>
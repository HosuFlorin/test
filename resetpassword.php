<?php
session_start();
$message="";
if(count($_POST)>0) {
    include 'server.php';
    $sql0 = "SELECT * FROM myuser WHERE email='" . $_POST["email"] . "'";
    $result = mysqli_query($conn , $sql0);
    $row  = mysqli_fetch_array($result);
    if(is_array($row)) {
        $to = $row['email'];
        $subject = "My subject";
        $txt = "Aceasta este parola".$row['parola']." si user-ul tau ".$row['nume'].".";
        
       
        mail($to,$subject,$txt);
        header('Location:loginuser.php');
    
      }
      else {
        $message = "Acest Email nu exista";
        
      }
    
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Reset Password</title>
</head>
<body>
<h2>HTML Resetare parola</h2>
  <div id="resetparola">
    <form action="" method="POST">
    
    <div class="message"><?php if($message!="") { echo $message; } ?></div>
      <label for="fname">Introduceti email-ul dumneavoastra</label><br>
      <input type="text" id="nume" name="email" value="" required><br><br>
      <input type="submit" value="Trimite" >
      

    </form>
</div>
</body>
</html>
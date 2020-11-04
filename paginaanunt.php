<?php 
session_start();
include 'server.php';

$sql = "SELECT * FROM anunturi  where  anunturi.id='" . $_SESSION["anuntid"] ."' ";
$result = mysqli_query($conn , $sql);
$row  = mysqli_fetch_array($result);
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
    <div class="row">
        <div class="col-sm-6">
        <?php if(is_array($row)) {?>
        <h3><?php echo $row['titlu'];?></h3>
        <h3><?php echo $row['timp'];?></h3>
        <h5><?php echo $row['anunt'] ;}?></h5><br>
        </div>
    </div>
</div>
</body>
</html>
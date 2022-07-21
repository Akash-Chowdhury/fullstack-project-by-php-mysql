<?php
include 'connect.php';
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../user/style.css">
</head>
<body>
<?php require 'nav2.php' ?>
    <div class="container" style="display: flex; flex-wrap: wrap;">
    <?php
$sql= "Select * from `table01`";
$result=mysqli_query($conn, $sql);
if($result)
{
    while($row=mysqli_fetch_assoc($result))
    {
        $slno=$row['slno'];
        $pname=$row['pname'];
        $price=$row['price']; 
        $details=$row['details'];
        $time=$row['time'];

        echo '<div class="card" style="width: 18rem; margin: 10px; display: flex; flex-wrap: wrap;">
        <div class="card-body"><h5 class="card-title">Product Name: '.$pname.'</h5>
        <p class="card-text">'.$details.'</p>
        <h6 class="card-subtitle mb-2 text-muted">Price: $'.$price.'</h6>
        <p class="card-text">Upload Date: '.$time.'</p>
        </div>
      </div>';
      $count++;
    }
    
}
?>  
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
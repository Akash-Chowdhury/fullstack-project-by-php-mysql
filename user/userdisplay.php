<?php
include 'dbconnect.php';
$showAlert=FALSE;
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}
if(isset($_POST['submit']))
{
    $pname=$_POST['pname'];
    $price=$_POST['price'];
    $details=$_POST['details'];
    $time=$_POST['time'];
    $sql="insert into `table02` (pname, price, details, time) values('$pname','$price','$details','$time')";
    $result=mysqli_query($conn, $sql);
    if($result)
    {
      $showAlert=TRUE;
        
    }
    else{
        die (mysqli_error($conn));
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php require 'nav1.php' ?>
<?php
   if($showAlert){
    echo '<div class="alert alert-success alert-dismissible fade show mt-0" role="alert">
    <strong>Success!</strong> Item added to cart
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>';
    }
?>
    <div class="container" style="display: flex; flex-wrap: wrap; margin-top:20px;">
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

        echo '<form method="post"> <div class="card" style="width: 18rem; margin: 10px; display: flex; flex-wrap: wrap;">
        <div class="card-body"><h5 class="card-title" name="pname">Product Name: '.$pname.'</h5>
        <p class="card-text" name="details">'.$details.'</p>
        <h6 class="card-subtitle mb-2 text-muted" name="price">Price: $'.$price.'</h6>
        <p class="card-text"name="time">Upload Date: '.$time.'</p>
        <input type="hidden" name="pname" value='.$pname.'>
        <input type="hidden" name="price" value='.$price.'>
        <input type="hidden" name="details" value='.$details.'>
        <input type="hidden" name="time" value='.$time.'>
        <button type="submit" name="submit" style="margin-left: 80%; border: none; background: white;">
        <a style="color: blueviolet;" href="cart.php?cartid='.$slno.'" class="card-link"><svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16">
        <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z"/>
        <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
      </svg></a>
        </button></div>
      </div></form>';
    }
    $sql="SELECT COUNT(slno)  AS total FROM `table02`";
    $result= mysqli_query($conn, $sql);
    $values=mysqli_fetch_assoc($result);
    $num_rows=$values['total'];
}
?>  
  </div>
  <div class="cart">
  <a href="cart.php?cartids">
  <svg name="cart" xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
  <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
</svg>
<span class="cart-badge" id="badge"><?php  echo $num_rows; ?></span>
  </a>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
<?php
include 'dbconnect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylecart.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Home/cart</title>
</head>
<body>
<?php require 'nav1.php' ?>
<div class="container" style="display: flex; flex-wrap: wrap; margin-top:20px; margin-bottom:40px;">
<?php
$sql= "Select * from `table02`";
$result=mysqli_query($conn, $sql);
$count=0;
$total=0;
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
        <a style="color: red;" href="delete.php?deleteid='.$slno.'"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
      </svg></a></div>
      </div></form>';
      $count++;
      $total=$total+$price;
    }
    
}
?>
<div class="total">
    <div class="left-total-text"><h3>TOTAL : $</h3></div>
    <div class="right-total-text"><h3><?php echo $total; ?></h3></div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
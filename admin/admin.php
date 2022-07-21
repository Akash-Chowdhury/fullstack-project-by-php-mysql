<?php
include 'connect.php';
if(isset($_POST['submit']))
{
    $pname=$_POST['productname'];
    $price=$_POST['price'];
    $details=$_POST['details'];
    $time=$_POST['time'];
    $sql="insert into `table01` (pname, price, details, time) values('$pname','$price','$details','$time')";
    $result=mysqli_query($conn, $sql);
    if($result)
    {
        header("location: admindisplay.php");
    }
    else{
        die (mysqli_error($conn));
    }
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>admin page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<?php require 'nav2.php' ?>
    <div class="container">
        <form method="post">
            <div class="mb-3">
                <label class="form-label">Product Name</label>
                <input type="text" class="form-control" name="productname">
            </div>
            <div class="mb-3">
                <label class="form-label">Price</label>
                <input type="text" class="form-control" name="price">
            </div>
            <div class="mb-3">
                <label class="form-label">Details</label>
                <input type="text" class="form-control" name="details">
            </div>
            <div class="mb-3">
                <label class="form-label">Upload Time</label>
                <input type="datetime-local" class="form-control" name="time">
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
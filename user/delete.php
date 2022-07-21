<?php
include 'dbconnect.php';
if(isset($_GET['deleteid']))
{
    $slno=$_GET['deleteid'];
    $sql="delete from `table02` where slno=$slno";
    $result=mysqli_query($conn, $sql);
    if($result)
{
    header("location: cart.php");
}
else{
    die (mysqli_error($conn));
}
}
?>
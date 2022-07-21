<?php
include 'connect.php';
if(isset($_GET['deleteid']))
{
    $slno=$_GET['deleteid'];
    $sql="delete from `table01` where slno=$slno";
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
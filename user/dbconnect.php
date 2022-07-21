<?php
$conn= new mysqli('localhost', 'root', '', 'market_project');
// $conn= new mysqli('sql113.epizy.com', 'epiz_32216661', 'epiz_32216661', 'epiz_32216661_market_project');
if(!$conn)
{
    die (mysqli_error($conn));
}


?>
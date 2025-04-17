<?php
session_start();

include('admin/connect.php'); 


$id = $_GET['id'];

 $query = "delete from cart where id = '$id'";
$result = mysqli_query($conn,$query);

if($result)
{
    header("Location: cart.php");
}


?>
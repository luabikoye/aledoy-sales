<?php
session_start();

$id = $_GET['id'];

include('connect.php');
$query = "delete from products where id = '$id'";
$result = mysqli_query($conn,$query);

if($result)
{
   $success = 'Product has been removed';
   include('products.php');
   exit;
}
?>
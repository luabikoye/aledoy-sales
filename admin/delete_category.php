<?php
session_start();

$id = $_GET['id'];

include('connect.php');
$query = "delete from categories where id = '$id'";
$result = mysqli_query($conn,$query);

if($result)
{
   $success = 'Category has been removed';
   include('categories.php');
   exit;
}
?>
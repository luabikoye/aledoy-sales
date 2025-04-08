<?php
session_start();

$id = $_GET['id'];

include('connect.php');
$query = "delete from home_banners where id = '$id'";
$result = mysqli_query($conn,$query);

if($result)
{
   $success = 'Banner has been removed';
   include('banners.php');
   exit;
}
?>
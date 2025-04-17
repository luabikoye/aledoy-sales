<?php
session_start();

$id = base64_decode($_GET['id']);

include('connect.php');
$query = "update orders set payment_type = 'Bank Transfer', payment_status = 'Paid' where id = '$id'";
$result = mysqli_query($conn,$query);

if($result)
{
   $success = 'Status Updated';
   include('order.php');
   exit;
}
?>
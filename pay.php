<?php
session_start();

include('admin/connect.php'); 
require_once('fns.php');

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$payment_type = $_POST['payment_type'];
$amount = total_cart();

 $query = "update orders set firstname = '$firstname', lastname = '$lastname', email = '$email', phone = '$phone', address = '$address', city = '$city', state = '$state', payment_type = '$payment_type', amount = '$amount', payment_status = 'pending', order_status = 'pending' where id = '".$_SESSION['order_id']."'"; 

$result = mysqli_query($conn,$query);

if($result)
{
    if($payment_type == 'Cash' || $payment_type == 'Bank')
    {
        $type = base64_encode($payment_type);
        header("Location: thankyou.php?type=$type");
        exit;
    }
    else{
        header("Location: card-payment.php");
    }
}


?>
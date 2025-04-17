<?php
session_start();

include('admin/connect.php'); 


$qty = $_POST['qty'];
$product_id = $_POST['product_id'];
$title = $_POST['title'];
$price = $_POST['price'];
$order_id = $_SESSION['order_id'];

$total = $qty*$price;

echo $query = "insert into cart set order_id = '$order_id', product_id = '$product_id', description = '$title', quantity = '$qty', unit_price = '$price', total_price = '$total'";
$result = mysqli_query($conn,$query);

if($result)
{
    header("Location: product-details.php?product_id=$product_id&cart=success");
}


?>
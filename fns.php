<?php


function get_image($product_id)
{
    global $conn;
    
    $query = "select * from products where id = '$product_id'";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_array($result);
    return '<img src="admin/'.$row['image_1'].'" alt="" style="height:80px;">';
}

function total_cart()
{
    global $conn;
    
    $query = "select sum(total_price) from cart where order_id = '".$_SESSION['order_id']."'";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_array($result);
    return $row[0];
}
   

?>
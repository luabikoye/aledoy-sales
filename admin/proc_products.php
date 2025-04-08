<?php
session_start();

$title = $_POST['title'];
$cat_id = $_POST['cat_id'];
$price = $_POST['price'];
$color = $_POST['color'];
$size = $_POST['size'];
$stock = $_POST['stock'];

$product_image = $_FILES['product_image']['tmp_name'];
$product_img_name = $_FILES['product_image']['name'];

$product_image2 = $_FILES['product_image2']['tmp_name'];
$product_img_name2 = $_FILES['product_image2']['name'];

$product_image3 = $_FILES['product_image3']['tmp_name'];
$product_img_name3 = $_FILES['product_image3']['name'];

if(!$product_image || !$title || !$cat_id || !$price || !$color || !$size || !$stock )
{
    $error = 'All information are required to add a product';
    include('add-product.php');
    exit;
}

$ext = pathinfo($product_img_name, PATHINFO_EXTENSION);
$ext2 = pathinfo($product_img_name2, PATHINFO_EXTENSION);
$ext3 = pathinfo($product_img_name3, PATHINFO_EXTENSION);

if($ext == 'jpg' || $ext == 'png' || $ext == 'jpeg' || $ext2 == 'jpeg' || $ext2 == 'jpeg' || $ext2 == 'jpeg' || $ext3 == 'jpeg' || $ext3 == 'jpeg' || $ext3 == 'jpeg')
{
    $image_extenstion = 'ok';
}
else{
    $error = 'All of the files uploaded must be JPG or PNG';
    include('add-product.php');
    exit;
}


include('connect.php');
$query = "insert into products set title = '$title', cat_id  = '$cat_id' , price = '$price' , color = '$color', size = '$size', stock = '$stock'";


$result = mysqli_query($conn,$query);

if($result)
{
    $last_id = mysqli_insert_id($conn);
    
    $filename = $last_id.'.'.$ext;
    $uploaded_file = "uploads/$filename";

    $filename2 = $last_id.'_2.'.$ext;
    $uploaded_file2 = "uploads/$filename2";

    
    $filename3 = $last_id.'_3.'.$ext;
    $uploaded_file3 = "uploads/$filename3";

    move_uploaded_file($product_image,$uploaded_file);
    move_uploaded_file($product_image2,$uploaded_file2);
    move_uploaded_file($product_image3,$uploaded_file3);

    $query_u = "update products set image_1 = '$uploaded_file',image_2 = '$uploaded_file2',image_3 = '$uploaded_file3' where id = '$last_id'";
    $result_u = mysqli_query($conn,$query_u);

   $success = 'Product has been updated';
   include('add-product.php');
   exit;
}
else{
    $error = 'The Product '.$title.' already exists';
    include('add-product.php');
    exit;
}

?>
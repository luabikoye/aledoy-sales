<?php
session_start();

include('connect.php');

$product_title = ucwords($_POST['product_title']);
$cat = ucwords($_POST['cat']);
$price = ucwords($_POST['price']);
$color = ucwords($_POST['color']);
$size = ucwords($_POST['size']);
$stock = ucwords($_POST['stock']);
$id = $_POST['id'];

$product_image = $_FILES['product_image']['tmp_name'];
$product_img_name = $_FILES['product_image']['name'];

$product_image2 = $_FILES['product_image2']['tmp_name'];
$product_img_name2 = $_FILES['product_image2']['name'];

$product_image3 = $_FILES['product_image3']['tmp_name'];
$product_img_name3 = $_FILES['product_image3']['name'];



if(!$product_title || !$cat || !$price || !$color || !$size || !$stock)
{
    $error = 'Information required';
    include('edit_products.php');
    exit;
}

if($product_image)
{
        $ext = pathinfo($product_img_name, PATHINFO_EXTENSION);
        if($ext == 'jpg' || $ext == 'png' || $ext == 'jpeg')
        {
            $filename = $id.'.'.$ext;
            $uploaded_file = "uploads/$filename";
            move_uploaded_file($product_image,$uploaded_file);
            mysqli_query($conn,"update products set image_1 = '$uploaded_file' where id = '$id'");
        }
        else{
            $error = 'All of the files uploaded must be JPG or PNG';
            include('edit_products.php');
            exit;
        }

    
}
if($product_image2)
{
        $ext2 = pathinfo($product_img_name2, PATHINFO_EXTENSION);

        if($ext2 == 'jpg' || $ext2 == 'png' || $ext2 == 'jpeg')
        {
            $filename2 = $id.'_2.'.$ext2;
            $uploaded_file2 = "uploads/$filename2";
            move_uploaded_file($product_image2,$uploaded_file2);
            mysqli_query($conn,"update products set image_2 = '$uploaded_file2' where id = '$id'");
        }
        else{
            $error = 'All of the files uploaded must be JPG or PNG';
            include('edit_products.php');
            exit;
        }

   
}
if($product_image3)
{
        $ext3 = pathinfo($product_img_name3, PATHINFO_EXTENSION);

        if($ext3 == 'jpg' || $ext3 == 'png' || $ext3 == 'jpeg')
        {
            $filename3 = $id.'_3.'.$ext3;
            $uploaded_file3 = "uploads/$filename3";
            move_uploaded_file($product_image3,$uploaded_file3);
            mysqli_query($conn,"update products set image_3 = '$uploaded_file3' where id = '$id'");
        }
        else{
            $error = 'All of the files uploaded must be JPG or PNG';
            include('edit_products.php');
            exit;
        }

   
}

$query = "update products set title= '$product_title' , cat_id= '$cat' , price= '$price' , color= '$color' , size= '$size' , stock= '$stock'  where id = '$id'"; 
$result = mysqli_query($conn,$query);

if($result)
{
   $success = 'Changes has been updated';
   include('edit_products.php');
   exit;
}
else{
    $error = 'The title '.$product_title.' already exists';
    include('edit_products.php');
    exit;
}

?>
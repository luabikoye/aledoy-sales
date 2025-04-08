<?php
session_start();

$heading = $_POST['heading'];
$sub_heading = $_POST['sub_heading'];

$banner_img = $_FILES['banner_img']['tmp_name'];
$banner_img_name = $_FILES['banner_img']['name'];

if(!$heading || !$sub_heading || !$banner_img)
{
    $error = 'All information are required to add banner';
    include('add-banner.php');
    exit;
}

$ext = pathinfo($banner_img_name, PATHINFO_EXTENSION);

if($ext == 'jpg' || $ext == 'png' || $ext == 'jpeg')
{
    $image_extenstion = 'ok';
}
else{
    $error = 'File uploaded must be JPG or PNG';
    include('add-banner.php');
    exit;
}


include('connect.php');
$query = "insert into home_banners set heading = '$heading', sub_heading = '$sub_heading'";

$result = mysqli_query($conn,$query);

if($result)
{
    $last_id = mysqli_insert_id($conn);
    $filename = $last_id.'.'.$ext;
    $uploaded_file = "uploads/$filename";

    move_uploaded_file($banner_img,$uploaded_file);

    $query_u = "update home_banners set image = '$uploaded_file' where id = '$last_id'";
    $result_u = mysqli_query($conn,$query_u);

   $success = 'Home page banner has been updated';
   include('add-banner.php');
   exit;
}
else{
    $error = 'The banner '.$category_name.' already exists';
    include('add-banner.php');
    exit;
}

?>
<?php
session_start();

$category_name = ucwords($_POST['category_name']);
$id = $_POST['id'];

if(!$category_name)
{
    $error = 'Information required';
    include('edit_category.php');
    exit;
}

include('connect.php');
$query = "update categories set cat_name = '$category_name' where id = '$id'";
$result = mysqli_query($conn,$query);

if($result)
{
   $success = 'Category has been updated';
   include('categories.php');
   exit;
}
else{
    $error = 'The category '.$category_name.' already exists';
    include('edit_category.php');
    exit;
}

?>
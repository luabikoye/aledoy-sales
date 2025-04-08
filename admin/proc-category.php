<?php
session_start();

$category_name = ucwords($_POST['category_name']);

if(!$category_name)
{
    $error = 'Enter Category name.';
    include('add-category.php');
    exit;
}
include('connect.php');
$query = "insert into categories set cat_name = '$category_name'";
$result = mysqli_query($conn,$query);

if($result)
{
   $success = 'Category has been updated';
   include('add-category.php');
   exit;
}
else{
    $error = 'The category '.$category_name.' already exists';
    include('add-category.php');
    exit;
}

?>
<?php
session_start();

$heading_name = ucwords($_POST['heading_name']);
$subheading_name = ucwords($_POST['subheading_name']);
$id = $_POST['id'];

if(!$heading_name || !$subheading_name)
{
    $error = 'Information required';
    include('edit_banner.php');
    exit;
}

include('connect.php');
$query = "update home_banners set heading = '$heading_name' , sub_heading= '$subheading_name' where id = '$id'";
$result = mysqli_query($conn,$query);

if($result)
{
   $success = 'Changes has been updated';
   include('banners.php');
   exit;
}
else{
    $error = 'The heading '.$heading_name.' and sub_heading '.$subheading_name.' already exists';
    include('edit_banner.php');
    exit;
}

?>
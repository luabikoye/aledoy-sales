<?php
session_start();

$password = $_POST['password'];
$confirm = $_POST['confirm'];
$valid_user = $_SESSION['valid_user'];

if(!$password || !$confirm)
{
    $error = 'Enter password and confirmation before submitting.';
    include('change-password.php');
    exit;
}


if($password != $confirm)
{
    $error = 'Your password and confirmation are not the same.';
    include('change-password.php');
    exit;
}

include('connect.php');
$query = "update login set password = password('$password') where username = '$valid_user'";
$result = mysqli_query($conn,$query);

if($result)
{
   $success = 'Password changed succesfully';
   include('change-password.php');
   exit;
}

?>
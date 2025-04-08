<?php
session_start();
include('connect.php');

$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn,$_POST['password']);

if(!$username || !$password)
{
    $loginerror = 'yes';
    include('index.php');
    exit;
}

$query = "select * from login where username = '$username' and password= password('$password')";
$result = mysqli_query($conn,$query);
$num = mysqli_num_rows($result);
$row = mysqli_fetch_array($result);

if($num > 0)
{
    $_SESSION['valid_user'] = $username;
    // $_SESSION['valid_name'] = $row['firstname'];
    include('dashboard.php');
    exit;
}
else{
    $loginerror = 'yes';
    include('index.php');
    exit;
}

?>
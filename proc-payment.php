<?php

    $email = $_POST['user_email'];
    $amount = $_POST['amount'].'00';

  $url = "https://api.paystack.co/transaction/initialize";

  $fields = [
    'email' => $email,
    'amount' => $amount,
    'callback_url' => "http://localhost:8888/aledoy-sales/thankyou.php?card=success",
    'metadata' => ["cancel_action" => "http://localhost:8888/aledoy-sales/"]
  ];

  $fields_string = http_build_query($fields);

  //open connection
  $ch = curl_init();
  
  //set the url, number of POST vars, POST data
  curl_setopt($ch,CURLOPT_URL, $url);
  curl_setopt($ch,CURLOPT_POST, true);
  curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Authorization: Bearer sk_test_5ad29cfaee4bee23825e7ee822759ad192d272f0",
    "Cache-Control: no-cache",
  ));
  
  //So that curl_exec returns the contents of the cURL; rather than echoing it
  curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
  
  //execute post
  $result = curl_exec($ch);
//   echo $result;

  
    
    $response = json_decode($result, true);
    if ($response['status']) {
        $auth_url = $response['data']['authorization_url'];
        header('Location: ' . $auth_url);
        exit();
    } else {
        echo "Failed to initiate payment: " . $response['message'];
    }


?>
<?php

session_start();
echo '<script>
document.addEventListener("contextmenu", event => event.preventDefault());
</script>';

include('app/connection/connect.php');

if(isset($_SESSION['ticketData'])) {
 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Loading Payment Page.... </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <style>
    .paystack-body img {
        width: 50%;
    }

    @media(max-width: 768px) {
        .paystack-body img {
            width: 100%;
        }
    }
    </style>
</head>

<body>

    <div class="container">
        <form id="paymentForm">
            <input type="hidden" value="<?= $_SESSION['ticketData']['email']; ?>" id="email-address" required />
            <input type="hidden" id="amount" value="<?= str_replace(',', '', $_SESSION['ticketData']['amount']); ?>" required />
            <input type="hidden" id="fullname" value="<?= $_SESSION['ticketData']['name']; ?>" />          

            <div class="paystack-body text-center mt-5">
                <img src="images/paystack.png"><br>
                <button class="btn btn-success" style="padding: 10px 16px;" type="submit" onclick="payWithPaystack()">
                    Click here to proceed to paystack </button>
            </div>
        </form>
    </div>

    <!-- //Calendar -->
    <script src="https://js.paystack.co/v1/inline.js"></script>

    <script>
    const paymentForm = document.getElementById('paymentForm');
    paymentForm.addEventListener("submit", payWithPaystack, false);

    function payWithPaystack(e) {
        e.preventDefault();

        let email = document.getElementById("email-address").value;
        let amount = document.getElementById("amount").value * 100; // Paystack expects amount in kobo or cents

        let handler = PaystackPop.setup({            
           
            key: 'pk_test_4cc6986e685fba275c4629e3c7ea64637b32ab97',
            email: email,
            amount: amount,
            ref: '' + Math.floor((Math.random() * 1000000000) + 1),
            onClose: function() {
                alert('Window closed.');
            },
            callback: function(response) {
                let message = 'Payment complete! Reference: ' + response.reference;
                alert(message);
                document.location.href = 'thank-you?status=success&reference=' + response.reference;
            }
        });

        handler.openIframe();
    }
    </script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>

<?php } else {
  header('location: thank-you?session=invalid');
  exit;
}
?>
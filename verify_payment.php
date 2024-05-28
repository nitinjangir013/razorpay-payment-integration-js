<?php
require('razorpay-php/Razorpay.php');
use Razorpay\Api\Api;

$keyId = 'YOUR_RAZORPAY_KEY_ID';
$keySecret = 'YOUR_RAZORPAY_KEY_SECRET';

$api = new Api($keyId, $keySecret);

$payment_id = $_GET['payment_id'];
$order_id = $_GET['order_id'];
$signature = $_GET['signature'];

try {
    $attributes = [
        'razorpay_order_id' => $order_id,
        'razorpay_payment_id' => $payment_id,
        'razorpay_signature' => $signature
    ];

    $api->utility->verifyPaymentSignature($attributes);
    echo "Payment successful";
    // You can save the payment details in the database here
} catch (Exception $e) {
    echo 'Payment verification failed: ',  $e->getMessage();
}
?>

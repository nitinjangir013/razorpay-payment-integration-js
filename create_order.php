<?php
require('razorpay-php/Razorpay.php');
use Razorpay\Api\Api;

$keyId = 'YOUR_RAZORPAY_KEY_ID';
$keySecret = 'YOUR_RAZORPAY_KEY_SECRET';

$api = new Api($keyId, $keySecret);

$orderData = [
    'receipt'         => uniqid(),
    'amount'          => $_GET['amount'], 
    'currency'        => $_GET['currency'],
    'payment_capture' => 1
];

$razorpayOrder = $api->order->create($orderData);

$orderData = [
    'id' => $razorpayOrder['id'],
    'amount' => $orderData['amount']
];

header('Content-Type: application/json');
echo json_encode($orderData);
?>

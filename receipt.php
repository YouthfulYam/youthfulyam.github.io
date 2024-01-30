<?php
// Include necessary settings file and start the session
require_once("settings.php");
session_start();

// Check if the user is authenticated; otherwise, redirect to the appropriate page
if (!isset($_SESSION['authenticated']) || !$_SESSION['authenticated']) {
    header("Location: enquire_order.php");
    exit();
}

// Retrieve the order details from the session
$orderDetails = isset($_SESSION['order_details']) ? $_SESSION['order_details'] : null;

// Clear the session data
unset($_SESSION['order_details']);
unset($_SESSION['authenticated']);

// Include header and any additional styles or scripts
include('header.inc');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Receipt</title>
    
</head>

<body>

    <h1>Order Receipt</h1>

    <!-- Display order details -->
    <?php if ($orderDetails) : ?>
        <p>Order ID: <?= $orderDetails['order_id']; ?></p>
        <p>Customer Name: <?= $orderDetails['customer_name']; ?></p>
        <p>Product Name: <?= $orderDetails['product_name']; ?></p>
        <p>Product Quantity: <?= $orderDetails['product_quantity']; ?></p>
        <p>Payment Method: <?= $orderDetails['payment_method']; ?></p>
        <p>Card Number: <?= $orderDetails['card_number']; ?></p>
        <p>Expiration Date: <?= $orderDetails['expiration_date']; ?></p>
        <p>CVV: <?= $orderDetails['cvv']; ?></p>
        <p>Order Cost: $<?= number_format($orderDetails['order_cost'], 2); ?></p>
        <p>Order Time: <?= $orderDetails['order_time']; ?></p>
        <p>Order Status: <?= $orderDetails['order_status']; ?></p>
    <?php else : ?>
        <p>No order details found.</p>
    <?php endif; ?>

    <!-- Add additional HTML content or scripts here -->

</body>

</html>

<?php
session_start();

// Check if the user accessed this page through a valid order
if (isset($_SESSION['order_id'])) {
    $order_id = $_SESSION['order_id'];
    
    // Fetch order details from the database based on the order_id
    require_once("settings.php");
    $conn = mysqli_connect($host, $user, $pwd, $sql_db);

    if (!$conn) {
        die('Error: Unable to connect to the database. ' . mysqli_connect_error());
    }

    // Fetch order details
    $query = "SELECT * FROM orders WHERE order_id = $order_id";
    $result = mysqli_query($conn, $query);

    if ($result && $row = mysqli_fetch_assoc($result)) {
        // Display order details in the receipt
        $customer_name = $row['customer_name'];
        $product_name = $row['product_name'];
        $product_quantity = $row['product_quantity'];
        $payment_method = $row['payment_method'];
        $card_number = $row['card_number'];
        $expiration_date = $row['expiration_date'];
        $cvv = $row['cvv'];
        $order_cost = $row['order_cost'];
        $order_status = $row['order_status'];
        $order_time = $row['order_time'];

        // ... (other details you want to display)

        // Display the receipt information
        echo "<h1>Order Receipt</h1>";
        echo "<p>Order ID: $order_id</p>";
        echo "<p>Customer Name: $customer_name</p>";
        echo "<p>Product Name: $product_name</p>";
        // ... (display other details)

        // Close the database connection
        mysqli_close($conn);
    } else {
        // Error fetching order details
        echo "<p>Error fetching order details.</p>";
    }

    // Clear the order_id from the session to prevent accessing the receipt again
    unset($_SESSION['order_id']);

} else {
    // Invalid access, redirect to an error page
    header("Location: error_page.php");
    exit;
}
?>

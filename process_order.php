<?php
 
// Check if accessing directly through html
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    require_once("settings.php");
 
    // Create a database connection
    $conn = mysqli_connect($host, $user, $pwd, $sql_db);
 
    // Check if the connection was successful
    if (!$conn) {
        die('Error: Unable to connect to the database. ' . mysqli_connect_error());
    }
 
    //Creates database if it doesn't exist
    require_once("create_database.php");
 
    // Reconnect to the database
    //mysqli_close($conn); // Close the existing connection
    $conn = mysqli_connect($host, $user, $pwd, $sql_db);
 
    // Check if the reconnection was successful
    if (!$conn) {
        die('Error: Unable to reconnect to the database. ' . mysqli_connect_error());
    }
 
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
        // Sanitize input values
        $customer_name = htmlspecialchars(trim($_POST["cardName"]));
        $product_name = htmlspecialchars(trim($_POST["product"]));
        $product_quantity = intval($_POST["quantity"]);
        $payment_method = htmlspecialchars(trim($_POST["cardType"]));
        $card_number = htmlspecialchars(trim($_POST["cardNumber"]));
        $expiration_date = htmlspecialchars(trim($_POST["expiryDate"]));
        $cvv = htmlspecialchars(trim($_POST["cvv"]));
        $order_status = 'PENDING';
 
        // Validate input fields
        $errors = array();
 
        // Validate credit card type
        if (!in_array($payment_method, array("visa", "mastercard", "amex"))) {
            $errors[] = "Invalid credit card type.";
        }
 
        // Validate credit card number
        if (!validateCreditCardNumber($card_number, $payment_method)) {
            $errors[] = "Invalid credit card number.";
        }
 
        // Other validation rules can be added here...
 
        // Check if there are any errors
        if (!empty($errors)) {
            // Store errors in session
            session_start();
            $_SESSION['errors'] = $errors;
            $_SESSION['submitted_data'] = $_POST;
            header("Location: fix_order.php");
            exit;
        } else {
            // Proceed with processing the order
            // Calculation of total cost
            $product_prices = ["Ecovacs_Deebot_t20" => 1799.00, "Roborock_s8" => 1699.00, "LUBA_AWD_5000" => 4399.00, "Segway_Navimov_H800A-VF_800m2" => 2899.00, "Madimack_GT_Freedom_i80" => 2798.00, "Zodiac_FX18_Robotic_Pool_Cleaner" => 1199.00];
            // Check if the selected product exists in the array
            if (array_key_exists($product_name, $product_prices)) {
                $order_cost = $product_prices[$product_name] * $product_quantity;
            } else {
                $order_cost = 0.00; // Default to 0
                // You might want to add an error message here
            }
 
            // Set up the SQL query for INSERT
            $insertQuery = "INSERT INTO orders (customer_name, product_name, product_quantity, payment_method, card_number, expiration_date, cvv, order_cost, order_status) 
                VALUES ('$customer_name', '$product_name', $product_quantity, '$payment_method', '$card_number', '$expiration_date', '$cvv', $order_cost, '$order_status')";
 
            // Execute the query for insertion
            $insertResult = mysqli_query($conn, $insertQuery);
 
            // Check if the insertion was successful
            if (!$insertResult) {
                echo "Error: " . mysqli_error($conn);
                echo "<p class=\"wrong\">Something is wrong with the query: ", $insertQuery, "</p>";
            } else {
                // Redirect to receipt page
                header("Location: receipt.php");
                exit;
            }
        }
    }
 
    // Close the database connection
    mysqli_close($conn);
 
} else {
    // Direct access, redirect to error page
    header("Location: error_page.php");
    exit;
}
 
// Function to validate credit card number
function validateCreditCardNumber($card_number, $payment_method) {
    // Strip any non-numeric characters
    $card_number = preg_replace("/[^0-9]/", "", $card_number);
    // Check card type and length
    if (($payment_method == "visa" && (strlen($card_number) == 16 && substr($card_number, 0, 1) == "4")) ||
        ($payment_method == "mastercard" && (strlen($card_number) == 16 && intval(substr($card_number, 0, 2)) >= 51 && intval(substr($card_number, 0, 2)) <= 55)) ||
        ($payment_method == "amex" && (strlen($card_number) == 15 && (substr($card_number, 0, 2) == "34" || substr($card_number, 0, 2) == "37")))) {
        return true;
    } else {
        return false;
    }
}
?>

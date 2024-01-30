<?php

//Check if accessing directly through html
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{

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
        
        //echo "Form submitted";

        // Assign values from POST to variables
        $customer_name = htmlspecialchars(trim($_POST["cardName"]));
        $product_name = htmlspecialchars(trim($_POST["product"]));
        $product_quantity = intval($_POST["quantity"]);
        $payment_method = htmlspecialchars(trim($_POST["cardType"]));
        $card_number = htmlspecialchars(trim($_POST["cardNumber"]));
        $expiration_date = date("m/y", strtotime($_POST["expiryDate"]));
        $cvv = htmlspecialchars(trim($_POST["cvv"]));
        $order_status = 'PENDING';

        //Calculating total cost:
        $product_prices = 
        ["Ecovacs_Deebot_t20" => 1799.00, "Roborock_s8" => 1699.00, "LUBA_AWD_5000" => 4399.00, "Segway_Navimov_H800A-VF_800m2" => 2899.00, "Madimack_GT_Freedom_i80" => 2798.00, "Zodiac_FX18_Robotic_Pool_Cleaner" => 1199.00];
        
        // Check if the selected product exists in the array
        if (array_key_exists($product_name, $product_prices)) 
        {
            $order_cost = $product_prices[$product_name] * $product_quantity;
        } else 
        {
            $order_cost = 0.00; // Default to 0
            echo "Debug: Product Name not found - $product_name";
        }
            echo "Debug: Order Cost - $order_cost";
        


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
            // If successful
            //echo "<p class=\"ok\">Order placed successfully!</p>";
        }
    }

    // Grab data from the 'orders' table
    $query = "SELECT order_id, customer_name, product_name, product_quantity, payment_method, card_number, expiration_date, cvv, order_cost, order_time, order_status FROM orders ORDER BY order_time DESC";


    // Store results into the result pointer
    $result = mysqli_query($conn, $query);

    // checks if the execution was successful
    if (!$result) {
        echo "<p>Something is wrong with ", $query, "</p>";
    } else {
        // Display the retrieved orders
        echo "<table border=\"1\">\n";
    echo "<tr>\n"
        . "<th scope=\"col\">Order ID</th>\n"
        . "<th scope=\"col\">Customer Name</th>\n"
        . "<th scope=\"col\">Product Name</th>\n"
        . "<th scope=\"col\">Product Quantity</th>\n"
        . "<th scope=\"col\">Payment Method</th>\n"
        . "<th scope=\"col\">Card Number</th>\n"
        . "<th scope=\"col\">Expiration Date</th>\n"
        . "<th scope=\"col\">CVV</th>\n"
        . "<th scope=\"col\">Order Cost</th>\n"
        . "<th scope=\"col\">Order Time</th>\n"
        . "<th scope=\"col\">Order Status</th>\n"
        . "</tr>\n";

        // Retrieve current record pointed by the result pointer
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>\n";
            echo "<td>", $row["order_id"], "</td>\n";
            echo "<td>", $row["customer_name"], "</td>\n";
            echo "<td>", $row["product_name"], "</td>\n";
            echo "<td>", $row["product_quantity"], "</td>\n";
            echo "<td>", $row["payment_method"], "</td>\n";
            echo "<td>", $row["card_number"], "</td>\n";
            echo "<td>", $row["expiration_date"], "</td>\n";
            echo "<td>", $row["cvv"], "</td>\n";
            echo "<td>", $row["order_cost"], "</td>\n";
            echo "<td>", $row["order_time"], "</td>\n";
            echo "<td>", $row["order_status"], "</td>\n";
            echo "</tr>\n";
        }
        echo "</table>\n";

        // Frees up the memory after using the result pointer
        mysqli_free_result($result);
    }

    // Close the database connection
    mysqli_close($conn);

} else {
    // Direct access, redirect to error page
    header("Location: error_page.php");
    exit;
}
?>

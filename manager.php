<?php
require_once("settings.php");

// Create a database connection
$conn = mysqli_connect($host, $user, $pwd, $sql_db);

// Check if the connection was successful
if (!$conn) {
    die('Error: Unable to connect to the database. ' . mysqli_connect_error());
}

// Query to print order details
$query = "SELECT * FROM orders ORDER BY order_time DESC";

$result = mysqli_query($conn, $query);

if(!$result)
echo"<p>Could not retrieve data.</p>";

else{
    // Display the retrieved orders
    echo "<table border=\"1\">\n";
echo "<tr>\n"
    . "<th scope=\"col\">Order ID</th>\n"
    . "<th scope=\"col\">Customer Name</th>\n"
    . "<th scope=\"col\">Product Name</th>\n"
    . "<th scope=\"col\">Product Quantity</th>\n"
    . "<th scope=\"col\">Order Cost</th>\n"
    . "<th scope=\"col\">Order Time</th>\n"
    . "<th scope=\"col\">Order Status</th>\n"
    . "<th scope=\"col\">Actions</th>\n" //extra column to place button.
    . "</tr>\n";
}



while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>\n";
    echo "<td>" . $row['order_id'] . "</td>\n";
    echo "<td>" . $row['customer_name'] . "</td>\n";
    echo "<td>" . $row['product_name'] . "</td>\n";
    echo "<td>" . $row['product_quantity'] . "</td>\n";
    echo "<td>" . $row['order_cost'] . "</td>\n";
    echo "<td>" . $row['order_time'] . "</td>\n";
    echo "<td>" . $row['order_status'] . "</td>\n";
    echo "<td>
            <form method='post' action= 'update_orderstatus.php'>
            <input type='hidden' name='order_id' value='" . $row['order_id'] . "'>
            <input type='hidden' name='new_status' value='PENDING'>
            <input type='hidden' name='delete' value='false'>
            <button type='submit'>Pending</button>
            </form>
            <form method= 'post' action= 'update_orderstatus.php'>
            <input type='hidden' name='order_id' value='" . $row['order_id'] . "'>
            <input type='hidden' name='new_status' value='FULFILLED'>
            <input type='hidden' name='delete' value='false'>
            <button type='submit'>Fulfilled</button>
            </form>
            <form method= 'post' action='update_orderstatus.php'>
            <input type='hidden' name='order_id' value='" . $row['order_id'] . "'>
            <input type='hidden' name='new_status' value='PAID'>
            <input type='hidden' name='delete' value='false'>
            <button type='submit'>Paid</button>
            </form>
            <form method= 'post' action='update_orderstatus.php'>
            <input type='hidden' name='order_id' value='" . $row['order_id'] . "'>
            <input type='hidden' name='new_status' value='ARCHIVED'>
            <input type='hidden' name='delete' value='false'>
            <button type='submit'>Archived</button>
            </form>
            <form method= 'post' action='update_orderstatus.php'>
            <input type='hidden' name='order_id' value='" . $row['order_id'] . "'>
            <input type='hidden' name='new_status' value='DELETE'>
            <input type='hidden' name='delete' value='true'>
            <button type='submit'>Delete</button>
            </form>
        </td>\n";
    echo "</tr>\n";
}

echo "</table>\n";
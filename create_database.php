<?php
require_once("settings.php");

// Create a database connection
$conn = mysqli_connect($host, $user, $pwd, $sql_db);

// Check if the connection was successful
if (!$conn) {
    die('Error: Unable to connect to the database. ' . mysqli_connect_error());
}

// SQL query to create the "orders" table
$createTableQuery = "CREATE TABLE IF NOT EXISTS orders (
    order_id INT AUTO_INCREMENT PRIMARY KEY,
    customer_name VARCHAR(50) NOT NULL,
    product_name VARCHAR(50) NOT NULL,
    product_quantity INT NOT NULL,
    payment_method VARCHAR(20) NOT NULL,
    card_number VARCHAR(16) NOT NULL,
    expiration_date VARCHAR(7) NOT NULL,
    cvv INT NOT NULL,
    order_cost DECIMAL(10, 2) NOT NULL,
    order_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    order_status ENUM('PENDING', 'FULFILLED', 'PAID', 'ARCHIVED') DEFAULT 'PENDING'
)";



// Execute the query to create the table
$createTableResult = mysqli_query($conn, $createTableQuery);

// Check if the table creation was successful
if (!$createTableResult) {
    echo "Error creating table: " . mysqli_error($conn);
} else {
    echo "Table 'orders' created successfully.";
}

// Close the database connection
mysqli_close($conn);
?>

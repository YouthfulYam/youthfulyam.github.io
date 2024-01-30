<?php
require_once("settings.php");
include('header.inc');

$referringPage = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';

if (strpos($referringPage, 'login.php') === false) {
    // Redirect to login.php if not accessed through login.php
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Cooper Simester">
    <meta name="description" content="Apex Automation Manager page">
    <meta name="keywords" content="PHP, HTML5, Update Orders">

    <!-- CSS -->
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/enquire.css">
    <link rel="stylesheet" href="styles/manager.css"> <!-- stylesheet to format the table -->
     <!-- Fonts -->
    <link rel="stylesheet" href="https://use.typekit.net/hja7nrk.css">
    <!-- Icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Manager</title>
</head> 

<?php
// Create a database connection
$conn = mysqli_connect($host, $user, $pwd, $sql_db);

// Check if the connection was successful
if (!$conn) {
    die('Error: Unable to connect to the database. ' . mysqli_connect_error());
}

?>
<body>
    <h1>Manager</h1>
    <p>Click column headings below to sort by ascending order, click again to sort by descending.</p>
<?php


// Default sorting column and order. When the page is first loaded or does not have the sorting
//parameters within the url, then the table will be sorted by order time descending.
$sortColumn = isset($_GET['sort']) ? $_GET['sort'] : 'order_time';
$sortOrder = isset($_GET['order']) ? $_GET['order'] : 'DESC';

// Query to print order details with sorting
$query = "SELECT * FROM orders ORDER BY $sortColumn $sortOrder";

$result = mysqli_query($conn, $query);

//Set up for table
if (!$result) {
    echo "<p>Could not retrieve data.</p>";
} else {
     // Display the retrieved orders with sorting options
     echo "<table border=\"1\">\n";
     echo "<tr>\n"
         . "<th scope=\"col\"><a href='?sort=order_id&order=" . ($sortColumn == 'order_id' ? ($sortOrder == 'ASC' ? 'DESC' : 'ASC') : 'ASC') . "'>Order ID</a></th>\n"
         . "<th scope=\"col\"><a href='?sort=customer_name&order=" . ($sortColumn == 'customer_name' ? ($sortOrder == 'ASC' ? 'DESC' : 'ASC') : 'ASC') . "'>Customer Name</a></th>\n"
         . "<th scope=\"col\"><a href='?sort=product_name&order=" . ($sortColumn == 'product_name' ? ($sortOrder == 'ASC' ? 'DESC' : 'ASC') : 'ASC') . "'>Product Name</a></th>\n"
         . "<th scope=\"col\"><a href='?sort=product_quantity&order=" . ($sortColumn == 'product_quantity' ? ($sortOrder == 'ASC' ? 'DESC' : 'ASC') : 'ASC') . "'>Product Quantity</a></th>\n"
         . "<th scope=\"col\"><a href='?sort=order_cost&order=" . ($sortColumn == 'order_cost' ? ($sortOrder == 'ASC' ? 'DESC' : 'ASC') : 'ASC') . "'>Order Cost</a></th>\n"
         . "<th scope=\"col\"><a href='?sort=order_time&order=" . ($sortColumn == 'order_time' ? ($sortOrder == 'ASC' ? 'DESC' : 'ASC') : 'ASC') . "'>Order Time</a></th>\n"
         . "<th scope=\"col\"><a href='?sort=order_status&order=" . ($sortColumn == 'order_status' ? ($sortOrder == 'ASC' ? 'DESC' : 'ASC') : 'ASC') . "'>Order Status</a></th>\n"
         . "<th scope=\"col\">Actions</th>\n"
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
            <select name='new_status'>
                <option value='PENDING'>Pending</option>
                <option value='FULFILLED'>Fulfilled</option>
                <option value='PAID'>Paid</option>
                <option value='ARCHIVED'>Archived</option>
            </select>
            <button type='submit'>Update</button>
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
?>
</body>

<?php
include ('footer.inc');
?>
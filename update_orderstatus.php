<?php
require_once("settings.php");

// Create a database connection
$conn = mysqli_connect($host, $user, $pwd, $sql_db);

if (!$conn) {
    die('Error: Unable to connect to the database. ' . mysqli_connect_error());
}

//Load variables with values
$order_id = $_POST['order_id'];
$new_status= $_POST['new_status'];
$delete = isset($_POST['delete']) && $_POST['delete'] === 'true';

if($delete){
    $delete_query = "DELETE FROM orders WHERE order_id = $order_id";
    mysqli_query($conn, $delete_query);
}
else{
//Query to update table entry
$update_query = "UPDATE orders SET order_status='$new_status' WHERE order_id = $order_id";
mysqli_query($conn, $update_query);
}

// Redirect browser back to manager.php
header("Location: manager.php");
 
exit;
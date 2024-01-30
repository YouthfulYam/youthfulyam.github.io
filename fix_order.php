<?php
session_start();

// Retrieve errors from the session
$errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : array();
unset($_SESSION['errors']); // Clear the session errors

// Get previously submitted data for pre-filling the form
$submittedData = isset($_SESSION['submitted_data']) ? $_SESSION['submitted_data'] : array();
unset($_SESSION['submitted_data']); // Clear the session data

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fix Order</title>
    <!-- CSS -->
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/enquire.css">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://use.typekit.net/hja7nrk.css">
    <!-- Icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

<?php
    include('header.inc');
?>

<p>Order incorrect, please review and submit again.<p>

<!-- Display errors if any -->
<?php if (!empty($errors)) : ?>
    <div style="color: red;">
        <ul>
            <?php foreach ($errors as $error) : ?>
                <li><?= $error; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<!-- Display form with pre-filled data -->
<form action="process_order.php" method="post">
    <label for="cardName">Customer Name:</label>
    <input type="text" id="cardName" name="cardName" value="<?= isset($submittedData['cardName']) ? $submittedData['cardName'] : ''; ?>" required>
    <br>

    <label for="cardType">Card Type:</label>
    <input type="text" id="cardType" name="cardType" value="<?= isset($submittedData['cardType']) ? $submittedData['cardType'] : ''; ?>" required>
    <br>

    <label for="cardNumber">Card Number:</label>
    <input type="text" id="cardNumber" name="cardNumber" value="<?= isset($submittedData['cardNumber']) ? $submittedData['cardNumber'] : ''; ?>" required>
    <br>

    <label for="expiryDate">Expiry Date:</label>
    <input type="text" id="expiryDate" name="expiryDate" value="<?= isset($submittedData['expiryDate']) ? $submittedData['expiryDate'] : ''; ?>" required>
    <br>

    <label for="cvv">CVV:</label>
    <input type="text" id="cvv" name="cvv" value="<?= isset($submittedData['cvv']) ? $submittedData['cvv'] : ''; ?>" required>
    <br>

    <input type="submit" value="Submit">
</form>
</body>
</html>

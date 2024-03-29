<?php
$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") { //when button is clicked
    $mysqli = require __DIR__ ."/settings.php"; //connect to server

    if ($_POST["email"] === "admin@admin.com") { //using adming@admin.com for default username
        if ($_POST["password"] === "admin"){
            header("Location: manager.php");
            exit;
        }    
    
    }
    else {
    $sql = sprintf("SELECT * FROM user WHERE email = '%s'", $_POST["email"]);

    $result = $mysqli -> query($sql);

    $user = $result -> fetch_assoc();

    if ($user) {

        if (password_verify($_POST["password"], $user["password_hash"])) {

            die("Login successful");
        }
    }

    

    }
    $is_invalid = true;
}


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Brayden Hall">
    <meta name="description" content="Apex Automation login page">
    <meta name="keywords" content="HTML5, login">
    <!-- CSS -->
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/enquire.css">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://use.typekit.net/hja7nrk.css">
    <!-- Icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>
        Login
    </title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://unpkg.com/simpledotcss/simple.min.css" /> <!--https://simplecss.org/ classless css -->
</head>
<body>
        <?php
            include('header.inc');
        ?>
        
    <h1>Login</h1>

        <?php if ($is_invalid): ?>
            <em> Invalid Login</em>
        <?php endif; ?>

    <form method="post">
        <label for = "email">email</label>
        <input type = "email" name = "email" id = "email">

        <label for = "password">Password</label>
        <input type = "password" name="password" id = "password">

        <button>Log in</button>

    </form>

</body>
</html>
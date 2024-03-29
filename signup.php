<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Brayden Hall">
    <meta name="description" content="Apex Automation Signup page">
    <meta name="keywords" content="HTML5, signup">
    <!-- CSS -->
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/enquire.css">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://use.typekit.net/hja7nrk.css">
    <!-- Icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>
        Signup
    </title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://unpkg.com/simpledotcss/simple.min.css" /> <!--https://simplecss.org/ classless css -->
</head>
<body>
        <?php
            include('header.inc');
        ?>
        
    <h1>Signup</h1>
    <form action="process-signup.php" method="post" novalidate>
        <div>
        <label for ="name">Name</label>
        <input type="text" id="name">
        </div>

        <div>
            <label for="email" >email</label>
            <input type="email" id="email" name="email">
        </div>

        <div>
            <label for="password">Password</label>
            <input type="password" id="password" name="password">
        </div>

        <div>
            <label for="password_confirmation"> Repeat password</label>
            <input type="password" id="password_confirmation" name="password_confirmation">
        </div>

        <button>Sign up</button>
    </form>
</body>
</html>
<?php

//Needs Database/Table
//Database name "user"
//Table with 4 columns
//1st column "id" int, auto increment. (should make primary key automaticaly)
//2nd column "name" varchar. 128 character.
//3rd column "email" varchar. 255 character. (unique index) -- > (prevents multiple signups)
//4th column "password_hash" varchar. 255 character.

require __DIR__ ."settings.php"; //link to settings for sql signin
$mysqli = new mysqli("$host","username","password","dbname");

if (empty($_POST["name_"])){
    die("Name is required. Please return to the previous screen and enter a valid name."); //validating name server side
}
if ( ! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
    die("Valid email is required. Please return to the previous screen and enter a valid email."); //validating email server side
}

if (strlen($_POST["password"]) < 8){
    die("Password must be at least 8 characters including at least one letter and one number. Please return to the previous screen and enter a valid password."); // testing for min 8 char in pass
}

if ( ! preg_match("/[a-z]/i", $_POST["password"])){
    die("Password must contain at least one letter. Please return to the previous screen and enter a valid password"); // testing for min 1 letter in pass
}

if ( ! preg_match("/[0-9]/", $_POST["password"])){
    die("Password must contain at least one number. Please return to the previous screen and enter a valid password"); // testing for min 1 number in pass
}

if ($_POST["password"] !== $_POST["password_confirmation"]){
    die("Passwords must match");
}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT); // convert password to hash for security.

require __DIR__  . "/testconnection.php"; //link to test connection

$sql = "INSERT INTO user (name_, email, password_hash)
        VALUES (?, ?, ?)"; // using the "user" database

$stmt = $mysqli ->stmt_init();

if ( ! $stmt->prepare($sql)){
    die("SQL error: " . $mysqli->error); //check and display for SQL syntax errors
}

$stmt -> bind_param("sss", $_POST["name_"], $_POST["email"], $password_hash) ;

if ($stmt -> execute()) {
    echo"Signup Successful";
}
else {
    die($mysqli -> error . " " . $mysqli -> errno) ; // Checking for duplicate email signups.
}

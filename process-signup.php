<?php

if (empty($_POST["name"])){
    die("Name is required. Please return to the previous screen and enter a valid name."); //validating name server side
}
if ( ! filter_var($_POST["emil"], FILTER_VALIDATE_EMAIL)){
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

print_r($_POST);
var_dump($password_hash);
<?php

// First name
if (isset($_SESSION['first_name'])) {
    $firstName = $_SESSION['first_name'];
} else {
    $_SESSION['first_name'] = "";
    $firstName = "";
}

// Last name
if (isset($_SESSION['last_name'])) {
    $lastName = $_SESSION['last_name'];
} else {
    $_SESSION['last_name'] = "";
    $lastName = "";
}

// Email
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
} else {
    $_SESSION['email'] = "";
    $email = "";
}

// Message to designer
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
} else {
    $_SESSION['message'] = "";
    $message = "";
}

// Error Message
if (isset($_SESSION['error_message'])) {
    $errorMessage = $_SESSION['error_message'];
} else {
    $_SESSION['message'] = "";
    $errorMessage = "";
}


?>
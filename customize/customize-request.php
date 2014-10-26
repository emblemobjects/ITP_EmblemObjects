<?php
/**
 * Created by PhpStorm.
 * User: Angela
 * Date: 10/26/2014
 * Time: 9:50 AM
 */
//Catching people who got here without filling out the form
if (empty($_REQUEST['firstName'])) {
    //header('location: index.php');
}
$firstName = $_REQUEST['firstName'];
$lastName = $_REQUEST['lastName'];
$email = $_REQUEST['email'];
$message = $_REQUEST['message'];
?>
<!doctype html>
<html lang="en">
<head>
    <title>Emblem Objects</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <link href='http://fonts.googleapis.com/css?family=EB+Garamond' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="../css/header.css">
    <link rel="stylesheet" type="text/css" href="../css/navigation.css">
    <link rel="stylesheet" type="text/css" href="../css/body.css">
    <link rel="stylesheet" type="text/css" href="../css/content.css">
    <link rel="stylesheet" type="text/css" href="../css/footer.css">
    <link rel="stylesheet" type="text/css" href="../css/customize.css">


</head>


<body>
<div id="wrapper">
    <?php include "../templates/header.php"; ?>
    <div id="content">
        <div id="confirmationContent">
            <h2>Your Design Request Confirmation:</h2>
    <span style="margin: 10px;"><p>Dear <strong><?php echo $firstName . " " . $lastName ?></strong>,
            <br/>
        <p>Thank you for your design request submission. Your design request number is [Enable
            Request ID] and your designer is [Designer Name: link to designer page]. Your designer will get
            to work on your design right away, turning your artwork into a unique product created just for you.</p>
        <p>Please check the email you provided: <strong><?php echo $email ?></strong> for a confirmation message.</p>
        <p>Within 48 hours, you will receive another email from EmblemObjects.com with your
            unique object ready to to order. Until then, your designer may wish to contact you from [Designer
            Email].</p>
        <p>You are one step closer to creating something truly special with us!</p>
        <p>Thank you for designing with us!</p>

            <p>EmblemObjects Team</p>
    </span>
        </div>
    </div>

    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <?php include "../templates/footer.php"; ?>
    <script type="text/javascript" src="../js/customize.js"></script>
</html>

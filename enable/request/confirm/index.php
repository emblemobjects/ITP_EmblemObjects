<?php
include_once '../../../php/config.php';
include_once '../../../php/helper.php';
include_once '../../../php/navigation_categories.php';
include_once '../../../php/items.php';
include_once '../../../php/enable.php';
include_once '../../../php/request-session.php';

//Catching people who got here without filling out the form
if (empty($_REQUEST['firstName'])) {
    $valid = false;
} else { $valid = true; }

$detail_id = $_REQUEST['detail_id'];

helper::redirect_page($valid,'/enable/request/?detail_id=' . $detail_id);

session_start();

$firstName = $_REQUEST['firstName'];
$lastName = $_REQUEST['lastName'];
$material_id = $_REQUEST['material_id'];
$email = $_REQUEST['email'];
$message = $_REQUEST['message'];
$item_id = $_REQUEST['item_id'];
$size = $_REQUEST['size'];


// Store session information in case uploading the file throws an error
$_SESSION['first_name'] = $firstName;
$_SESSION['last_name'] = $lastName;
$_SESSION['email'] = $email;
$_SESSION['message'] = $message;


/* disable autocommit */
mysqli_autocommit($con, FALSE);

$array_info = enable::submit_enable_request($firstName, $lastName, $material_id, $email, $message, $item_id, $size, $detail_id); //This also executes the insert
//print_r($array_info);
$enable_id = $array_info[0]['enable_id'];
$designer_name = $array_info[0]['designer_name'];
$designer_email = $array_info[0]['designer_email'];

/* clear the request session variables */
clearRequestSession(); 

/* re-enable autocommit */
mysqli_autocommit($con, TRUE);
?>



<!doctype html>
<html lang="en">
<head>
    <title>Emblem Objects</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <link href='http://fonts.googleapis.com/css?family=EB+Garamond' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" type="text/css" href="<?php echo DIR ?>/css/body.css">
    <link rel="stylesheet" type="text/css" href="<?php echo DIR ?>/css/core.css">
    <link rel="stylesheet" type="text/css" href="<?php echo DIR ?>/css/content.css">
    <link rel="stylesheet" type="text/css" href="<?php echo DIR ?>/css/footer.css">
    <link rel="stylesheet" type="text/css" href="<?php echo DIR ?>/css/header.css">
    <link rel="stylesheet" type="text/css" href="<?php echo DIR ?>/css/customize.css">
    <link rel="stylesheet" type="text/css" href="<?php echo DIR ?>/css/nav.css">


</head>


<body>
<div id="wrapper">
    <?php include "../../../templates/header.php";
    include "../../../templates/nav.php";
    ?>
    <div id="content">
        <div id="confirmationContent">
            <h1 style="text-align:left;">ENABLE REQUEST CONFIRMATION #<?php echo $enable_id ?></h1>
    <span>
        <p>Thank you for your design request submission. Your design request number is <strong><?php echo $enable_id ?></strong> and your designer is <strong><?php echo $designer_name ?></strong>. Your designer will get
            to work on your design right away, turning your artwork into a unique product created just for you.</p>
        <p>Please check the email you provided: <strong><?php echo $email ?></strong> for a confirmation message.</p>
        <p>Within 48 hours, you will receive another email from EmblemObjects.com with your
            unique object ready to to order. Until then, your designer may wish to contact you from <strong><?php echo $designer_email ?></strong>.</p>
        <p>You are one step closer to creating something truly special with us!</p>
        <p>Thank you for designing with us!</p>

            <p>EmblemObjects Team</p>
    </span>
        </div>
    </div>

    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <?php include "../../../templates/footer.php"; ?>
</html>

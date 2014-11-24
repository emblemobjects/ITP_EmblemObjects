<?php
include_once '../../php/config.php';
include_once '../../php/helper.php';
include_once '../../php/navigation_categories.php';
include_once '../../php/items.php';
include_once '../../php/enable.php';
include_once '../../php/request-session.php';

//Catching people who got here without filling out the form
if (empty($_FILES["uploadButton1"])) {
    $valid = false;
} else {
    $valid = true;
}

$enable_id = helper::escape_str($con, $_REQUEST['enable_id']);
helper::redirect_page($valid, '/enable/request/?enable_id=' . $enable_id);

session_start();

/* disable autocommit */
mysqli_autocommit($con, FALSE);

/* submit the enable */
enable::submit_enable($enable_id);

/* change request to pending */
enable::make_request_pending($enable_id);

/* clear the request session variables */
clearEnableSession();

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
    <?php include "../../templates/header.php";
    include "../../templates/nav.php";
    ?>
    <div id="content">
        <div id="confirmationContent">
            <h1 style="text-align:left;">UPLOAD SUCCESSFUL #<?php echo $enable_id ?></h1>
    <span>
        <p>Thank you for your enable artwork upload.</p>

        <p>EmblemObjects Team</p>
    </span>
        </div>
    </div>

    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <?php include "../../templates/footer.php"; ?>
</html>

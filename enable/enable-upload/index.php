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
$_SESSION['previous-page'] = basename(dirname($_SERVER['PHP_SELF']));

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
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script type="text/javascript" src="../../js/request.js"></script>
    <script type="text/javascript" src="<?php echo $jQuery; ?>"></script>
    <script type="text/javascript" src="<?php echo DIR; ?>/js/handlebars-v2.0.0.js"></script>
    <script type="text/javascript" src="<?php echo DIR; ?>/js/facebook-js-sdk/facebook-sdk.js"></script>
    <script type="text/javascript" src="<?php echo DIR; ?>/js/facebook-js-sdk/facebook-api.js"></script>
    <script type="text/javascript" src="<?php echo DIR; ?>/js/config.js"></script>
    <script type="text/javascript" src="<?php echo DIR; ?>/js/nav.js"></script>
    <link href='http://fonts.googleapis.com/css?family=EB+Garamond' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,200' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="../../css/header.css">
    <link rel="stylesheet" type="text/css" href="../../css/nav.css">
    <link rel="stylesheet" type="text/css" href="../../css/core.css">
    <link rel="stylesheet" type="text/css" href="../../css/content.css">
    <link rel="stylesheet" type="text/css" href="../../css/footer.css">
    <link rel="stylesheet" type="text/css" href="../../css/customize.css">


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

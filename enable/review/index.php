<?php
/* /customize/index.php
 */
session_start();
include_once '../../php/config.php';
include_once '../../php/helper.php';
include_once '../../php/items.php';
$items_array = items::get_items(0, 0, 0, 0, "");

// set valid browse
if (empty($_REQUEST['enable_id'])) {
    $valid = false;
} else {
    $valid = true;
}

// redirect to home if invalid
helper::redirect_page($valid, '/home/index.php');

include_once '../../php/navigation_categories.php';
include_once '../../php/enable.php';

$enable_info = enable::get_request_info(helper::escape_str($con, $_REQUEST['enable_id']));

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Emblem Objects</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>

    <script type="text/javascript" src="<?php echo $jQuery; ?>"></script>
    <script type="text/javascript" src="<?php echo DIR; ?>/js/handlebars-v2.0.0.js"></script>
    <script type="text/javascript" src="<?php echo DIR; ?>/js/facebook-js-sdk/facebook-sdk.js"></script>
    <script type="text/javascript" src="<?php echo DIR; ?>/js/facebook-js-sdk/facebook-api.js"></script>
    <script type="text/javascript" src="<?php echo DIR; ?>/js/config.js"></script>
    <script type="text/javascript" src="<?php echo DIR; ?>/js/nav.js"></script>
    <link href='http://fonts.googleapis.com/css?family=EB+Garamond' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,200' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="../../css/core.css">
    <link rel="stylesheet" type="text/css" href="../../css/header.css">
    <link rel="stylesheet" type="text/css" href="../../css/nav.css">
    <link rel="stylesheet" type="text/css" href="../../css/content.css">
    <link rel="stylesheet" type="text/css" href="../../css/footer.css">
    <link rel="stylesheet" type="text/css" href="../../css/review.css">
</head>

<body>
<div id="wrapper">
    <?php
    include_once "../../templates/header.php";
    include_once '../../templates/nav.php'
    ?>
    <!-- CONTENT -->
    <div id="content">
        <div class="container" id="container">
            <div id="review">
                <div id="review-title">
                    <strong>Review</strong> <br/>
                    <strong><span>ENABLE #<?php echo $enable_info['enable_id'] ?> </span></strong><br/>
                </div>
                <hr style="border: solid 1px #f2b139; margin: 7px;">
                <div class="gray-subtitle-bar">Order Info</div>
                <div id="item-info">
                    <strong>requested
                        by: </strong> <?php echo $enable_info['first_name'] . " " . $enable_info['last_name'] ?><br/>
                    <strong>date submitted: </strong> <?php echo $enable_info['date_submitted'] ?><br/>
                    <strong>due date: </strong> <?php echo $enable_info['due_date'] ?><br/>
                    <strong>message: </strong> <?php echo $enable_info['message'] ?><br/>
                </div>
                <br style="clear:both"/>

                <div class="gray-subtitle-bar">Object Info</div>
                <div id="item-info">
                    <strong>item name: </strong><?php echo $enable_info['item_name'] ?><br/>
                    <strong>size: </strong><?php echo $enable_info['size'] ?><br/>
                    <strong>material: </strong><?php echo $enable_info['material_name'] ?><br/>
                </div>
                <br style="clear:both"/>

                <div class="gray-subtitle-bar">Renderings</div>
                <div class="item-info">
                    <strong>1: </strong> <a download href="<?php echo DIR . $enable_info['figure'] ?>"> enabled
                        object</a><br/>
                    <strong>2: </strong> <a download href="<?php echo DIR . $enable_info['instance'] ?>">
                        figure</a><br/>
                    <strong>3: </strong> <a download href="<?php echo DIR . $enable_info['bu_instance'] ?>"> back-up
                        object (optional)</a><br/>
                </div>
            </div>
            <hr style="border: solid 1px #f2b139; margin: 7px;">
            <div id="approve-button">
                <strong><a class="click-me" href="approve/index.php?enable_id=<?php echo $enable_info['enable_id'] ?>">APPROVE</a></strong>
            </div>
            <div id="reject-button">
                <strong><a class="click-me" href="reject/index.php?enable_id=<?php echo $enable_info['enable_id'] ?>">REJECT</a></strong>
            </div>
        </div>
    </div>
    <div style="clear:both"></div>
    <?php include "../../templates/footer.php"; ?>
</div>
</body>
</html>

<?php
/* /customize/index.php
 * test - ?item_id=1$detail_id=3
 */
session_start();
include_once '../../../php/config.php';
include_once '../../../php/helper.php';
include_once '../../../php/items.php';
include_once '../../../php/navigation_categories.php';
include_once '../../../php/enable.php';


//if (empty($_REQUEST['enable_id'])){
//    header('location: ../home/index.php');
//}
$enable_info = enable::get_request_info(escape_str($con, $_REQUEST['enable_id']));
enable::pass_request(escape_str($con, $_REQUEST['enable_id']));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Emblem Objects - Approve</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>

    <link href='http://fonts.googleapis.com/css?family=EB+Garamond' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="../../../css/header.css">
    <link rel="stylesheet" type="text/css" href="../../../css/nav.css">
    <link rel="stylesheet" type="text/css" href="../../../css/core.css">
    <link rel="stylesheet" type="text/css" href="../../../css/content.css">
    <link rel="stylesheet" type="text/css" href="../../../css/footer.css">
    <link rel="stylesheet" type="text/css" href="../../../css/customize.css">
    <link rel="stylesheet" type="text/css" href="../../../css/review.css">


</head>


<body>
<div id="wrapper">
    <?php include_once "../../../templates/header.php";
    include_once '../../../templates/nav.php'?>


    <!-- CONTENT -->
    <div id="content">
        <div class="container" id="container">
            <div id="review">
                <div id="review-title">
                    <strong><span style="color: red">ENABLE #<?php echo $enable_info['enable_id']?> has been PASSED.</span></strong><br />
                    <hr style="border: solid 1px #f2b139; margin: 7px;">
                </div>
                <div id="item-info">
                    <strong>requested by |&nbsp;</strong><?php echo $enable_info['first_name']." ".$enable_info['last_name'] ?><br />
                    <strong>date submitted |&nbsp;</strong><?php echo $enable_info['date_submitted']?><br />
                    <strong>due date |&nbsp;</strong><?php echo $enable_info['due_date']?><br />
                    <strong>message |&nbsp;</strong><?php echo $enable_info['message']?><br />
                </div>
                <div id="item-properties">
                    <strong>item name |&nbsp;</strong><?php echo $enable_info['item_name']?><br />
                    <strong>size |&nbsp;</strong><?php echo $enable_info['size']?><br />
                    <strong>material |&nbsp;</strong><?php echo $enable_info['material_name']?><br />
                </div>
                <br style="clear:both"/>
                <div id="review-close">
                    <br />
                    <hr style="border: solid 1px #f2b139; margin: 7px;">
                    <p>An email will now be sent to alert the staff that you have passed the request</p>
                </div>
            </div>
        </div>
    </div>
    <div style="clear:both"></div>

    <?php include "../../../templates/footer.php"; ?>
</div>
</body>
</html>

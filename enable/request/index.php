<?php
/* /customize/index.php
 * test - ?item_id=1$detail_id=3
 */
session_start();
include "submit/index.php";
if (empty($_REQUEST['detail_id'])) {
    header("location: ../../home/index.php");
}
include_once '../../php/config.php';
include_once '../../php/helper.php';
include_once '../../php/items.php';
include_once '../../php/navigation_categories.php';
include_once '../../php/request-session.php';
$request_array = startRequestSession();
$items_array = items::get_items(0, 0, 0, 0, "");

// set valid browse
if (empty($_REQUEST['detail_id'])) {
    $valid = false;
} else { $valid = true; }

// redirect to home if invalid
helper::redirect_page($valid,'/home/index.php');

$detail_id = helper::escape_str($con, $_REQUEST['detail_id']);
$item_id = items::get_item_id($detail_id);
$item_name = items::get_field_value($item_id, "name");
$material_name = items::get_detail_info($item_id, $detail_id, "material");
$material_id = items::get_detail_info($item_id, $detail_id, "material_id");
$price = items::get_detail_info($item_id, $detail_id, "price");
$size = items::get_detail_info($item_id, $detail_id, "size");

$firstName = $request_array[0];
$lastName = $request_array[1];
$email = $request_array[2];
$message = $request_array[3];
$errorMessage1 = $request_array[4];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Emblem Objects</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<<<<<<< HEAD
    <script type="text/javascript" src="../../js/request.js"></script>
=======
    
    <script type="text/javascript" src="<?php echo $jQuery; ?>"></script>
    <script type="text/javascript" src="<?php echo DIR; ?>/js/handlebars-v2.0.0.js"></script>
    <script type="text/javascript" src="<?php echo DIR; ?>/js/facebook-js-sdk/facebook-sdk.js"></script>
    <script type="text/javascript" src="<?php echo DIR; ?>/js/facebook-js-sdk/facebook-api.js"></script>
    <script type="text/javascript" src="<?php echo DIR; ?>/js/config.js"></script>
    <script type="text/javascript" src="<?php echo DIR; ?>/js/nav.js"></script>

>>>>>>> FETCH_HEAD
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
    <?php include_once "../../templates/header.php";
    include_once '../../templates/nav.php'?>


    <!-- CONTENT -->
    <div id="content">
        <div class="container" id="container">
            <div id="title-div">
                <h1>DESIGN YOUR OBJECT</h1>
                <h4><strong>base object |</strong>&nbsp;<?php echo $item_name ?></h4>
            </div>
            <form id="customizeObject" method="POST" action="confirm/index.php" enctype="multipart/form-data">
                <div id="container-left">

                    <h3>upload an image.</h3>
                    <h5>accepted file types: .gif, .png, .jpg, .ai</h5>

                    <div class="fileUpload">
                        <input type="hidden" name="newFileName" value="customer_artwork"/>
                        <div id="uploadFile"><img id = "previewObject" src="<?php echo items::getPrimaryImage($GLOBALS['items_array'], $item_id); ?>" /></div>
                        <input type="file" id="uploadButton" name="uploadButton" />
                        <span id="upload-error"><?php echo $errorMessage1 ?></span><br>
                    </div>

                    <br style="clear:both;"/>
                </div>
                <div id="container-right">
                    <input type="hidden" name="item_id" value="<?php echo $item_id ?>" />
                    <input type="hidden" name="material_id" value="<?php echo $material_id ?>" />
                    <input type="hidden" name="detail_id" value="<?php echo $detail_id ?>" />
                    <br/>
                    <br />
                    <div class="input">material:</div><input class = "readOnly" type="text" size='25' name="material_name" value="<?php echo $material_name ?>" readonly /><br />
                    <div class="input">size:</div><input class = "readOnly" type="text" size='25' name="size" value="<?php echo $size; ?>" readonly /><br />
                    <div class="input">price:</div><input class = "readOnly" type="text" size='25' name="price" value="<?php echo $price ; ?>" readonly /><br />
                    <div class="input">first name:</div><input type="text" name="firstName" size='25' value="<?php echo $firstName; ?>" required><br />
                    <div class="input">last name:</div><input type="text" name="lastName" size='25' value="<?php echo $lastName; ?>" required><br />
                    <div class="input">email:</div><input type="text" name="email" size='25' value="<?php echo $email; ?>" required><br />
                    <div class="input">message to designer:</div><textarea name="message" rows="5" cols="27" maxlength="1000"><?php echo $message; ?></textarea><br />
                </div>

                <br style="clear:both">
                <br/>
                <div id="submitRequest"><button id="submit-button" type="submit" value="Submit Request">Submit Request</button></div>
            </form>
        </div>
    </div>
    <div style="clear:both"></div>


    <?php include "../../templates/footer.php"; ?>
</div>
</body>
</html>

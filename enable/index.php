<?php
/* /customize/index.php
 * test - ?item_id=1$detail_id=3
 */
session_start();
include "submit/index.php";
if (empty($_REQUEST['detail_id'])) {
    header("location: ../home/index.php");
}
include_once '../php/config.php';
include_once '../php/helper.php';
include_once '../php/items.php';
$items_array = items::get_items(0, 0, 0, 0, "");

// set valid browse
if (empty($_REQUEST['detail_id'])) {
   $valid = false;
} else { $valid = true; }

// redirect to home if invalid
helper::redirect_page($valid,'/home/index.php');

$detail_id = $_REQUEST['detail_id'];
$item_id = items::get_item_id($detail_id);
$item_name = items::get_field_value($item_id, "name");
$material_name = items::get_detail_info($item_id, $detail_id, "material");
$material_id = items::get_detail_info($item_id, $detail_id, "material_id");
$price = items::get_detail_info($item_id, $detail_id, "price");
$size = items::get_detail_info($item_id, $detail_id, "size");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Emblem Objects</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>

    <link href='http://fonts.googleapis.com/css?family=EB+Garamond' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="../css/header.css">
    <link rel="stylesheet" type="text/css" href="../css/nav.css">
    <link rel="stylesheet" type="text/css" href="../css/core.css">
    <link rel="stylesheet" type="text/css" href="../css/content.css">
    <link rel="stylesheet" type="text/css" href="../css/footer.css">
    <link rel="stylesheet" type="text/css" href="../css/customize.css">
    <link rel="stylesheet" type="text/css" href="../css/enable.css">


</head>


<body>
<div id="wrapper">
    <?php include_once "../templates/header.php";
    include_once '../templates/navigation_categories.php'?>


    <!-- CONTENT -->
    <div id="content">
        <div class="container" id="container">
            <div id="info">
                <div id="info-title">
                    <span>ENABLE #[number]</span><br>
                    requested by [username]<br>
                </div>
                <div id="info-char">
                    item name [name]<br>
                    size [size]<br>
                    material [material]<br>
                </div>
                <div id="info-files">
                    artwork [file]<br>
                    object [file]
                </div>
                <br style="clear:both"/>
            </div>
            <hr style="border: solid 3px #333333; margin: 20px 0px 20px 0px;">
            <div id="files">
                <div id="files-title">FILE UPLOAD</div><br/>
                <div class="req-files">required</div>
                <div class="upload">
                    1. enabled object
                </div>
                <div class="fileUpload">
                    <input type="hidden" name="newFileName" value="enabled_object"/>
                    <input type="file" id="uploadButton" name="uploadButton" accept=".gif, .png, .jpg, .jpeg, .ai" />
                    <span id="upload-error"><?php echo $errorMessage ?></span><br>
                </div>
                <div style="clear:both;"></div>
                <div class="upload">
                    2. figure
                </div>
                <div class="fileUpload">
                    <input type="hidden" name="newFileName" value="enabled_object"/>
                    <input type="file" id="uploadButton" name="uploadButton" accept=".gif, .png, .jpg, .jpeg, .ai" />
                    <span id="upload-error"><?php echo $errorMessage ?></span><br>
                </div>
                <div style="clear:both;"></div>
                <div class="req-files">optional</div>
                <div class="upload">
                    3. back-up object
                </div>
                <div class="fileUpload">
                    <input type="hidden" name="newFileName" value="enabled_object"/>
                    <input type="file" id="uploadButton" name="uploadButton" accept=".gif, .png, .jpg, .jpeg, .ai" />
                    <span id="upload-error"><?php echo $errorMessage ?></span><br>
                </div>
            </div>
        </div>
    </div>
    <div style="clear:both"></div>


    <?php include "../templates/footer.php"; ?>
</div>
</body>
</html>

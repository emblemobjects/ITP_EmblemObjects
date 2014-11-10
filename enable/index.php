<?php
/* /customize/index.php
 * test - ?item_id=1$detail_id=3
 */
session_start();
include_once '../php/config.php';
include_once '../php/helper.php';
include_once '../php/items.php';
include_once '../php/navigation_categories.php';
include_once '../php/enable.php';


if (empty($_REQUEST['enable_id'])){
    header('location: ../home/index.php');
}
$enable_info = enable::get_request_info($_REQUEST['enable_id']);


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
    include_once '../templates/nav.php'?>


    <!-- CONTENT -->
    <div id="content">
        <div class="container" id="container">
            <div id="info">
                <div id="info-title">
                    <strong><span>ENABLE #<?php echo $enable_info['enable_id']?></span></strong><br>
                    <strong>requested by |&nbsp;</strong><?php echo $enable_info['first_name']." ".$enable_info['last_name'] ?><br>
                </div>
                <div id="info-char">
                    <strong>item name |&nbsp;</strong><?php echo $enable_info['item_name']?><br>
                    <strong>size |&nbsp;</strong><?php echo $enable_info['size']?><br>
                    <strong>material |&nbsp;</strong><?php echo $enable_info['material_name']?><br>
                    <strong>date submitted |&nbsp;</strong><?php echo $enable_info['date_submitted']?><br>
                </div>
                <div id="info-files">
                    <strong>due date |&nbsp;</strong><?php echo $enable_info['due_date']?><br>
                    <strong>artwork |&nbsp;</strong><a target="_blank" href="<?php echo DIR.$enable_info['image_filepath']?>">Link here</a><br>
                    <strong>message |&nbsp;</strong><?php echo $enable_info['message']?><br>

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
<!--                    <span id="upload-error">--><?php //echo $errorMessage ?><!--</span><br>-->
                </div>
                <div style="clear:both;"></div>
                <div class="upload">
                    2. figure
                </div>
                <div class="fileUpload">
                    <input type="hidden" name="newFileName" value="enabled_object"/>
                    <input type="file" id="uploadButton" name="uploadButton" accept=".gif, .png, .jpg, .jpeg, .ai" />
<!--                    <span id="upload-error">--><?php //echo $errorMessage ?><!--</span><br>-->
                </div>
                <div style="clear:both;"></div>
                <div class="req-files">optional</div>
                <div class="upload">
                    3. back-up object
                </div>
                <div class="fileUpload">
                    <input type="hidden" name="newFileName" value="enabled_object"/>
                    <input type="file" id="uploadButton" name="uploadButton" accept=".gif, .png, .jpg, .jpeg, .ai" />
<!--                    <span id="upload-error">--><?php //echo $errorMessage ?><!--</span><br>-->
                </div>
            </div>
        </div>
    </div>
    <div style="clear:both"></div>


    <?php include "../templates/footer.php"; ?>
</div>
</body>
</html>

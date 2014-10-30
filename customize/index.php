<?php
session_start();
include "customize-session.php";
if (empty($_REQUEST['item_id'])) {
    header("location: ../home/index.php");
}
include_once '../php/config.php';
include_once '../php/helper.php';
include_once '../php/json-store-objects.php';
include_once '../php/items.php';

$item_id = $_REQUEST['item_id'];
$item_name = items::get_field_value($item_id, "name");
$detail_id = $_REQUEST['detail_id'];
$material_name = items::get_detail_info($item_id, $detail_id, "material");
$material_id = items::get_detail_info($item_id, $detail_id, "material_id");
$price = items::get_detail_info($item_id, $detail_id, "price");
$size = items::get_detail_info($item_id, $detail_id, "size");
?>

<!doctype html>
<html lang="en">
<head>
    <title>Emblem Objects</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>

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


    <!-- CONTENT -->
    <div id="content">
        <div class="container" id="container">
            <div id="title-div">
                <h1>DESIGN YOUR OBJECT</h1>
                <h4>Base Object: <?php echo $item_name ?></h4>
            </div>
            <form id="customizeObject" method="POST" action="customize-request.php" enctype="multipart/form-data">
                <div id="container-left">

                    <h3>Upload an image.</h3>
                    <h5>Allowed file types: .gif, .png, .jpg, .ai</h5>

                    <div class="fileUpload">
                        <input type="hidden" name="newFileName" value="customer_artwork"/>
                        <div id="uploadFile"><img id = "previewObject" src="<?php echo items::getPrimaryImage($GLOBALS['items_array'], $item_id); ?>" /></div>
                        <input type="file" id="uploadButton" name="uploadButton" accept=".gif, .png, .jpg, .jpeg, .ai" />
                        <span id="upload-error"><?php echo $errorMessage ?></span><br>
                    </div>

                    <br style="clear:both;"/>
                </div>
                <div id="container-right">
                    <input type="hidden" name="item_id" value="<?php echo $item_id ?>" />
                    <input type="hidden" name="material_id" value="<?php echo $material_id ?>" />
                    <br/>
                    <br />
                    <div class="input">Material:</div><input class = "readOnly" type="text" size='25' name="material_name" value="<?php echo $material_name ?>" readonly /><br />
                    <div class="input">Size:</div><input class = "readOnly" type="text" size='25' name="size" value="<?php echo $size; ?>" readonly /><br />
                    <div class="input">Price:</div><input class = "readOnly" type="text" size='25' name="price" value="<?php echo $price ; ?>" readonly /><br />
                    <div class="input">First Name:</div><input type="text" name="firstName" size='25' value="<?php echo $firstName; ?>required><br />
                    <div class="input">Last Name:</div><input type="text" name="lastName" size='25' value="<?php echo $lastName; ?>required><br />
                    <div class="input">Email:</div><input type="text" name="email" size='25' value="<?php echo $email; ?>required><br />
                    <div class="input">Message to Designer:</div><textarea name="message" rows="5" cols="27" maxlength="1000"><?php echo $message; ?></textarea><br />
                </div>

                <br style="clear:both">
                <br/>
                <div id="submitRequest"><button id="submit-button" type="submit" value="Submit Request">Submit Request</button></div>
            </form>
        </div>
    </div>
    <div style="clear:both"></div>


    <?php include "../templates/footer.php"; ?>
</div>
</body>
</html>

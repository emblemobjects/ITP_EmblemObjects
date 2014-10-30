<?php
/* /customize/index.php
 * test - ?item_id=1$detail_id=3
 */
include_once '../php/config.php';
include_once '../php/helper.php';
include_once '../php/json-store-objects.php';
include_once '../php/items.php';

// set valid browse
if (empty($_REQUEST['item_id']) || empty($_REQUEST['detail_id'])) {
   $valid = false;
} else { $valid = true; }

// redirect to home if invalid
helper::redirect_page($valid,'/home/index.php');

$item_id = $_REQUEST['item_id'];
$detail_id = $_REQUEST['detail_id'];
$item_name = items::get_field_value($item_id, "name");
$material_name = items::get_detail_info($item_id, $detail_id, "material");
$material_id = items::get_detail_info($item_id, $detail_id, "material_id");
$price = items::get_detail_info($item_id, $detail_id, "price");
$size = items::get_detail_info($item_id, $detail_id, "size");
?>

<!DOCTYPEe html>
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
            <form id="customizeObject" method="POST" action="customize-request.php">
                <div id="container-left">

                    <h3>Upload an image.</h3>
                    <h5>Allowed file types: .gif, .png, .jpg, .ai</h5>


                    <div class="fileUpload">
                        <div id="uploadFile"><img id = "previewObject" src="<?php echo items::getPrimaryImage($GLOBALS['items_array'], $item_id); ?>" /></div>
                        <input id="uploadButton" type="file" class="upload"/>

                    </div>

                    <br style="clear:both;"/>
                </div>
                <div id="container-right">
                    <input type="hidden" name="item_id" value="<?php echo $item_id ?>" />
                    <input type="hidden" name="material_id" value="<?php echo $material_id ?>" />
                    <br />
                    <div class="input">Material:</div><input class = "readOnly" type="text" size='25' name="material_name" value="<?php echo $material_name ?>" readonly /><br />
                    <div class="input">Size:</div><input class = "readOnly" type="text" size='25' name="size" value="<?php echo $size; ?>" readonly /><br />
                    <div class="input">Price:</div><input class = "readOnly" type="text" size='25' name="price" value="<?php echo $price ; ?>" readonly /><br />
                    <div class="input">First Name:</div><input type="text" name="firstName" size='25' required><br />
                    <div class="input">Last Name:</div><input type="text" name="lastName" size='25' required><br />
                    <div class="input">Email:</div><input type="text" name="email" size='25' required><br />
                    <div class="input">Message to Designer:</div><textarea name="message" rows="5" cols="27" maxlength="1000"></textarea><br />
                </div>

                <br style="clear:both">
                <br/>
                <div id="submitRequest"><button type="submit" value="Submit Request">Submit Request</button></div>
            </form>
        </div>
    </div>
    <div style="clear:both"></div>


    <?php include "../templates/footer.php"; ?>
</div>
</body>
</html>

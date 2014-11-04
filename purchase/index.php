<?php
if (empty($_REQUEST['item_id'])) {
    header("location: ../home/index.php");
}
include_once '../php/config.php';
include_once '../php/helper.php';
$items_array = items::get_items(0, 0, 2, 0, "");
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
    <link rel="stylesheet" type="text/css" href="../css/nav.css">
    <link rel="stylesheet" type="text/css" href="../css/body.css">
    <link rel="stylesheet" type="text/css" href="../css/content.css">
    <link rel="stylesheet" type="text/css" href="../css/footer.css">
    <link rel="stylesheet" type="text/css" href="../css/purchase.css">


</head>


<body>
<div id="wrapper">
    <?php include "../templates/header.php"; ?>


    <!-- CONTENT -->
    <div id="content">
        <div class="container" id="container">
            <div id="title-div">
                <h1>PURCHASE YOUR UNIQUE OBJECT</h1>
                <h4>Object: <?php echo $item_name ?></h4>
            </div>
            <form id="purchaseObject" method="POST" action="#">
                <div id="container-left">

                    <h3>Preview your object</h3>
                    <h5>Please review the material, size, and price</h5>

                        <div id="preview"><img id = "previewObject" src="<?php echo items::getPrimaryImage($GLOBALS['items_array'], $item_id); ?>" /></div>

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
                    <div class="input">Shipping Address</div><input type="text" name="address" size='25' required><br />
                    <div class="input">City:</div><input type="text" name="city" size='25' required><br />
                    <div class="input">State:</div><input type="text" name="state" size='25' required><br />
                    <div class="input">Zip Code:</div><input type="text" name="zip" size='25' required><br />
                </div>

                <br style="clear:both">
                <br/>
                <div id="paymentButton"><button type="submit" value="Submit Request">Continue to Payment</button></div>
            </form>
        </div>
    </div>
    <div style="clear:both"></div>


    <?php include "../templates/footer.php"; ?>
</div>
</body>
</html>

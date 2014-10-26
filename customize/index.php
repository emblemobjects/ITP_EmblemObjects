<?php
if (empty($_REQUEST['item_id'])) {
    header("location: ../home/index.php");
}
?>

<!doctype html>
<html lang="en">
<head>
    <title>Emblem Objects</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

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
            </div>
            <form id="customizeObject" method="POST" action="customize-request.php">
                <div id="container-left">

                    <h3>Upload an image.</h3>
                    <h5>Allowed file types: .gif, .png, .jpg, .ai</h5>


                    <div class="fileUpload">
                        <input id="uploadFile" disabled="disabled"/>
                        <input id="uploadButton" type="file" class="upload"/>

                    </div>

                    <br style="clear:both;"/>
                </div>
                <div id="container-right">
                    <div id="fname" class="input">First Name<br><input type="text" name="firstName" required></div>
                    <div id="lname" class="input">Last Name<br><input type="text" name="lastName" required></div>
                    <div id="email" class="input">Email<br><input type="text" name="email" required></div>
                    <div id="message" class="input">Message to Designer<br><textarea name="message" rows="5" cols="50"
                                                                                     maxlength="1000"></textarea></div>
                </div>

                <br style="clear:both">
                <br/>
                <button type="submit" value="Submit Request">Submit Request</button>
            </form>
        </div>
    </div>
    <div style="clear:both"></div>
</div>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<?php include "../templates/footer.php"; ?>
<script type="text/javascript" src="../js/customize.js"></script>
</html>

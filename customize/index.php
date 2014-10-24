<!doctype html>
<?php
include './../php/json-store-objects.php';
?>

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
    <div id="header"></div>
    <div style="clear:both"></div>
    <div id="navigation"></div>
    <div style="clear:both"></div>


    <!-- CONTENT -->
    <div id="content">
        <div class="container" id="container">
            <div id="title-div">
            <h1>DESIGN YOUR OBJECT</h1>
            </div>
            <div id="container-left">
                
                <h3>upload an image.</h3>

                <input id="uploadFile" disabled="disabled" />
                <input id="uploadButton" type="file" class="upload" />
                <div class="fileUpload">

                </div>

                <br style="clear:both;"/>
            </div>
            <div id="container-right">
                <form>
                    <div id="fname" class="input">first name<br><input type="text" name="firstname"></div>
                    <div id="lname" class="input">last name<br><input type="text" name="lastname"></div>
                    <div id="email" class="input">email<br><input type="text" name="email"></div>
                    <div id="message" class="input">message<br><textarea rows="4" cols="50" maxlength="1000"></textarea></div>
                </form>
            </div>
        </div>
        <br style="clear:both">
        <div id="buy-div">
            <form id="buttonForm" action="../payment/index.php">
                <button type="submit">Buy Item</button>
            </form>
        </div>
    </div>
    <div style="clear:both"></div>


    <div id="footer"></div>
    <div style="clear:both"></div>
</div>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript" src="http://localhost:8080/itp460/ITP_EmblemObjects/js/load_templates.js"></script>
<script type="text/javascript" src="../js/customize.js"></script>
</html>

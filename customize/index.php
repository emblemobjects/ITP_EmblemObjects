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
        <div class="container">

            <h1> CUSTOMER CUSTOMIZE PAGE </h1>

            <h3> upload a file...</h3>

            <input id="uploadFile" placeholder="Please Choose A File ..." disabled="disabled" />
            <input id="uploadButton" type="file" class="upload" />
            <div class="fileUpload">

            </div>

            <br />

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

<!doctype html>
<?php include_once '../php/config.php';
include_once '../php/items.php';
include_once '../php/navigation_categories.php'?>

<html lang="en">
<head>
    <title>Emblem Objects - How To</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <link href='http://fonts.googleapis.com/css?family=EB+Garamond' rel='stylesheet' type='text/css'>

    <script type="text/javascript" src="<?php echo $jQuery; ?>"></script>
    <script type="text/javascript" src="<?php echo DIR; ?>/js/handlebars-v2.0.0.js"></script>
    <script type="text/javascript" src="<?php echo DIR; ?>/js/facebook-js-sdk/facebook-sdk.js"></script>
    <script type="text/javascript" src="<?php echo DIR; ?>/js/facebook-js-sdk/facebook-api.js"></script>
    <script type="text/javascript" src="<?php echo DIR; ?>/js/config.js"></script>
    <script type="text/javascript" src="<?php echo DIR; ?>/js/nav.js"></script>

    <link href='http://fonts.googleapis.com/css?family=EB+Garamond' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=EB+Garamond' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,200' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="../css/core.css">
    <link rel="stylesheet" type="text/css" href="../css/header.css">
    <link rel="stylesheet" type="text/css" href="../css/nav.css">
    <link rel="stylesheet" type="text/css" href="../css/content.css">
    <link rel="stylesheet" type="text/css" href="../css/how-to.css">
    <link rel="stylesheet" type="text/css" href="../css/footer.css">

</head>


<body>
<div id="wrapper">
    <?php
    include_once "../templates/header.php";
    include_once '../templates/nav.php'; ?>


    <!-- CONTENT -->
    <div id="content">
        <div class="container">
            <div id="box">
            <h1>HOW TO</h1>
            
            <img src="images/image_1.jpg" alt="Step 1" width="800px" height="400px"/><hr/>
            <img src="images/image_2.jpg" alt="Step 2" width="800px" height="400px"/><hr/>
            <img src="images/image_3.jpg" alt="Step 3" width="800px" height="400px"/><hr/>
            <img src="images/image_4.jpg" alt="Step 4" width="800px" height="800px"/><hr/>
            <img src="images/image_5.jpg" alt="Step 5" width="800px" height="1500px"/>
            </div>
        </div>
            
        <?php include "../templates/footer.php"; ?>
    </div>
</div>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>

</html>

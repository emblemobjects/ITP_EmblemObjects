<?php
/**
 * Created by PhpStorm.
 * User: tesswu
 * Date: 11/30/14
 * Time: 9:30 PM
 */

?>

<?php
session_start();
include_once '../php/config.php';
include_once '../php/items.php';
include_once '../php/navigation_categories.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php

    ?>
    <title>EmblemObjects</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="icon" href="<?php echo DIR; ?>/asset/favicon-16.ico" type="image/x-icon"/>

    <script type="text/javascript" src="<?php echo $jQuery; ?>"></script>
    <script type="text/javascript" src="<?php echo DIR; ?>/js/handlebars-v2.0.0.js"></script>
    <script type="text/javascript" src="<?php echo DIR; ?>/js/facebook-js-sdk/facebook-sdk.js"></script>
    <script type="text/javascript" src="<?php echo DIR; ?>/js/facebook-js-sdk/facebook-api.js"></script>
    <script type="text/javascript" src="<?php echo DIR; ?>/js/config.js"></script>
    <script type="text/javascript" src="<?php echo DIR; ?>/js/nav.js"></script>

    <link href='http://fonts.googleapis.com/css?family=EB+Garamond' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,200' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="../css/core.css">
    <link rel="stylesheet" type="text/css" href="../css/header.css">
    <link rel="stylesheet" type="text/css" href="../css/content.css">
    <link rel="stylesheet" type="text/css" href="../css/footer.css">
    <link rel="stylesheet" type="text/css" href="../css/home.css">
    <link rel="stylesheet" type="text/css" href="../css/items-grid.css">
    <link rel="stylesheet" type="text/css" href="../css/overlay.css">
    <link rel="stylesheet" type="text/css" href="../css/item-info.css">
    <link rel="stylesheet" type="text/css" href="../css/nav.css">


    <script>
        facebook.init({
            appID: config.FBID,
            ver: config.FBVer,
        });
    </script>
    <script>

    </script>
</head>


<body>
<div id="fb-root"></div>

<div id="wrapper">

    <?php include "../templates/header.php"; ?>

    <?php include '../templates/nav.php'; ?>

    <div id="content">
        <div class="container">
            This page is under construction.
        </div>
    </div>

    <?php include "../templates/footer.php"; ?>


</div>


<script src="../js/home.js"></script>
</body>
</html>

<?php include_once '../php/config.php';
include_once '../php/items.php';
include_once '../php/navigation_categories.php'?>
<!-- doctype html -->

<html lang="en">
<head>
    <title>Emblem Objects - Site Map</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

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
    <link rel="stylesheet" type="text/css" href="../css/sitemap.css">
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

            <div class="title">
                <h1>Sitemap</h1>
            </div>

            <div id="about-cat">
                <h3> About </h3>
                <hr/>
                <div class="item-cat">
                    <a class="link" href="../whats-new/index.php">What's New</a><br>

                    <a class="link" href="../how-to/index.php">How To</a><br>

                    <a class="link" href="../faq/index.php">FAQ</a><br>
                </div>
            </div>

            <div id="organize-cat">
                <h3>Organize</h3>
                <hr/>
                <div class="item-cat">
                    <a class="link" href="../#">Collections</a><br>

                    <a class="link" href="../#">Designers</a><br>

                    <div class="indent">
                        <a class="link" href="../#">Jacob Blitzer</a><br>
                    </div>
                    <a class="link" href="../home/?order_by=2">Newest</a><br>

                    <a class="link" href="../home/?order_by=1">Popular</a><br>
                </div>
            </div>


            <div id="shop-cat">
                <h3>Shop</h3>
                <hr/>
                <div class="item-cat">
                    <a class="link" href="../home/index.php?category_id=4&subcategory_id=%200"><h4>Home</h4></a>

                    <div class="indent">
                        <a class="link" href="../home/index.php?subcategory_id=%209">Placements</a><br>
                        <a class="link" href="../home/index.php?subcategory_id=%2010">Holders</a><br>
                        <a class="link" href="../home/index.php?subcategory_id=%2011">Vases</a><br>
                        <a class="link" href="../home/index.php?subcategory_id=%2012">Lighting</a><br>
                        <a class="link" href="../home/index.php?subcategory_id=%2013">Desktop</a><br>
                    </div>

                    <a class="link" href="../home/index.php?category_id=6&subcategory_id=%200">Jewelry</a><br>

                    <div class="indent">
                        <a class="link" href="../home/index.php?subcategory_id=%2016">Rings</a><br>
                        <a class="link" href="../home/index.php?subcategory_id=%2017">Pendants</a><br>
                        <a class="link" href="../home/index.php?subcategory_id=%2018">Necklaces</a><br>
                        <a class="link" href="../home/index.php?subcategory_id=%2019">Bracelets</a><br>
                        <a class="link" href="../home/index.php?subcategory_id=%2020">Earrings</a><br>
                        <a class="link" href="../home/index.php?subcategory_id=%2021">Cuff Links</a><br>
                        <a class="link" href="../home/index.php?subcategory_id=%2022">Watches</a><br>
                    </div>
                </div>
                <div class="item-cat">

                    <a class="link" href="../home/index.php?category_id=1&subcategory_id=%200">Accessories</a><br>

                    <div class="indent">
                        <a class="link" href="../home/index.php?subcategory_id=%201">Cases</a><br>
                        <a class="link" href="../home/index.php?subcategory_id=%202">Keychains</a><br>
                        <a class="link" href="../home/index.php?subcategory_id=%203">Belts & Buckles</a><br>
                    </div>

                    <a class="link" href="../home/index.php?category_id=2&subcategory_id=%200">Art</a><br>

                    <div class="indent">
                        <a class="link" href="../home/index.php?subcategory_id=%204">Sculpture</a><br>
                        <a class="link" href="../home/index.php?subcategory_id=%205">Parametrics</a><br>
                        <a class="link" href="../home/index.php?subcategory_id=%206">Themed</a><br>
                    </div>

                    <a class="link" href="../home/index.php?category_id=3&subcategory_id=%200">Gadgets</a><br>

                    <div class="indent">
                        <a class="link" href="../home/index.php?subcategory_id=%207">Parts</a><br>
                        <a class="link" href="../home/index.php?subcategory_id=%208">Props</a><br>
                    </div>

                    <a class="link" href="../home/index.php?category_id=5&subcategory_id=%200">Novelty</a><br>

                    <div class="indent">
                        <a class="link" href="../home/index.php?subcategory_id=%2014">Desk Toys</a><br>
                        <a class="link" href="../home/index.php?subcategory_id=%2015">Puzzles</a><br>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</body>

<?php include "../templates/footer.php"; ?>
<div style="clear:both"></div>
<div style="clear:both"></div>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
</html>

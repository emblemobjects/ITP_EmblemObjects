<!doctype html>
<?php
session_start();
include_once '../php/config.php';
include_once '../php/items.php';
include_once '../php/navigation_categories.php';


?>
<html lang="en">
<head>
    <title>Emblem Objects - How-To</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

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
    <link rel="stylesheet" type="text/css" href="../css/nav.css">
    <link rel="stylesheet" type="text/css" href="../css/content.css">
    <link rel="stylesheet" type="text/css" href="../css/faq.css">
    <link rel="stylesheet" type="text/css" href="../css/footer.css">


    <link rel="stylesheet" type="text/css" href="../css/how-to.css">


</head>


<body>
<div id="wrapper">
    <?php include "../templates/header.php";
    include "../templates/nav.php";?>


    <!-- CONTENT -->
    <div id="content">
        <div class="container">
            <h1>HOW TO</h1>

            <?php
            include_once '../php/file-to-array.php';

            $index = 1;
            $text_array = file_to_array("../documents/how-to-text.txt");
            $image_array = file_to_array("../documents/how-to-images.txt");

            $text_array_length = count($text_array);
            for ($i = 0; $i < $text_array_length; $i++) {
                if ($i % 2 == 0) {
                    echo "<div class='box-color-1'>";
                } else {
                    echo "<div class='box-color-2'>";
                }
                echo "<div class='how-to-index'>";
                echo "<span>" . ($i + 1) . "  </span>";
                echo "</div>";
                echo "<div class='how-to-box'>";
                echo "<span>" . $text_array[$i] . "</span>";
                echo "<div style='clear:both'></div>";
                echo "<img class='how-to-image' width='210px' height='180px' src='images/" . $image_array[$i] . "'/>";
                echo "<div style='clear:both'></div>";
                echo "</div>";
                echo "<br/></div><br/>";
                echo "<div style='clear:both'></div>";
            }
            ?>

        </div>
    </div>
    <div style="clear:both"></div>




    <?php include "../templates/footer.php"; ?>
</div>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
</body>
</html>

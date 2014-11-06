<?php // NO SHOW php includes - check file path!
    include_once '/php/config.php'; // MUST config.php! check file path
    include_once '/php/session.php'; // MUST for logged in pages
    include_once '/php/helper.php'; // good to have
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php// includes to load on DOM ?>
    <title>Emblem Objects Page Title</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <!--External Scripts-->
    <!--REQUIRED SCRIPTS-->
    <script src="<?php echo DIR; ?>/js/config.js"></script>
    <script src="<?php echo $jQuery; ?>"></script>
    <script src="<?php echo DIR; ?>/js/handlebars-v2.0.0.js"></script>
    <!-- Page Specfic Scripts-->

    <!--External CSS-->
    <!--REQUIRED CSS-->
    <link href='http://fonts.googleapis.com/css?family=EB+Garamond' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="../css/core.css">
    <link rel="stylesheet" type="text/css" href="../css/header.css">
    <link rel="stylesheet" type="text/css" href="../css/nav.css">
    <link rel="stylesheet" type="text/css" href="../css/footer.css">
    <!--Page Specific CSS-->
    <link rel="stylesheet" type="text/css" href="../css/home.css">
    <link rel="stylesheet" type="text/css" href="../css/items-grid.css">
    <link rel="stylesheet" type="text/css" href="../css/content.css">

</head>
<body>
<div id="fb-root"></div><!--Facebook Required DO NOT TOUCH-->

<!-- <div id="overlay"></div>-->

<div id="wrapper">
    <!-- HEADER -->
    <?php include "../templates/header.php";?>
    <!-- END HEADER -->

    <!-- CONTENT -->
    <div id="content">

    </div><!--END content-->
    <!-- END CONTENT-->

    <!-- FOOTER -->
    <?php include "../templates/footer.php";?>
    <!-- END FOOTER -->
</div><!--END wrapper-->

</body>
</html>
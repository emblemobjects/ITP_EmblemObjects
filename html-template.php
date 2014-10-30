<?php // NONE DISPLAY php includes
    include_once '/php/config.php'; // MUST config.php! check file path
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php// includes to load on DOM ?>
    <title>Emblem Objects</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <!--External Scripts-->
    <script src="<?php echo $jQuery; ?>"></script>
    <script src="../js/handlebars-v2.0.0.js"></script>

    <!--External CSS-->
    <link href='http://fonts.googleapis.com/css?family=EB+Garamond' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="../css/header.css">
    <link rel="stylesheet" type="text/css" href="../css/navigation.css">
    <link rel="stylesheet" type="text/css" href="../css/body.css">
    <link rel="stylesheet" type="text/css" href="../css/content.css">
    <link rel="stylesheet" type="text/css" href="../css/footer.css">
    <link rel="stylesheet" type="text/css" href="../css/home.css">
    <link rel="stylesheet" type="text/css" href="../css/items-grid.css">

</head>
<body>

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
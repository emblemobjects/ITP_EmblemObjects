<?php
include_once '../php/config.php';
?>
<!doctype html>
<html lang="en">
<head>
    <title>Emblem Objects</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <link href='http://fonts.googleapis.com/css?family=EB+Garamond' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="<?php echo $Dir;?>/css/header.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $Dir;?>/css/nav.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $Dir;?>/css/body.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $Dir;?>/css/content.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $Dir;?>/css/footer.css">

</head>


<body>
    <div id="wrapper">
<?php include "../templates/header.php";?>





        <!-- CONTENT -->
        <div id="content">
            <div class="container">
          <!-- Homepage content goes here! -->

          <p>&nbsp</p>
          <h3> Welcome, Please sign in to continue </h3>


          <a href="<?php echo $Dir;?>/designer/designer_list">
          <img src="<?php echo $Dir;?>/images/facebook_login.png" alt="Facebook_Login" style="width:18%">
          </a>


            </div>
        </div>
        <div style="clear:both"></div>



        <?php include "../templates/footer.php";?>
    </div>
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <?php include "../templates/header.php";?>
</html>

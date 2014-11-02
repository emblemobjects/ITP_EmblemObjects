<?php
include_once '../php/config.php';
include_once '../php/items.php';
if (empty($_REQUEST['search'])){
    $store_items_result = items::get_items(0, 0, 2, 0, "");
}
else {
    $store_items_result = items::get_items(0, 0, 2, 0, $_REQUEST['search']);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    items::to_JS($store_items_result);
    ?>
    <title>EmblemObjects</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="icon" href="<?php echo DIR; ?>/favicon.ico" type="image/x-icon"/>
    
    <!--External Scripts-->
    <script type="text/javascript" src="<?php echo $jQuery; ?>"></script>
    <script type="text/javascript" src="<?php echo DIR; ?>/js/handlebars-v2.0.0.js"></script>
    <script type="text/javascript" src="<?php echo DIR; ?>/js/facebook-js-sdk/facebook-sdk.js"></script>
    <script type="text/javascript" src="<?php echo DIR; ?>/js/facebook-js-sdk/facebook-api.js"></script>
    <script type="text/javascript" src="<?php echo DIR; ?>/js/config.js"></script>

    <!--External CSS-->
    <link href='http://fonts.googleapis.com/css?family=EB+Garamond' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="../css/core.css">
    <!--<link rel="stylesheet" type="text/css" href="../css/body.css">-->
    <link rel="stylesheet" type="text/css" href="../css/new-header.css">
    <!-- <link rel="stylesheet" type="text/css" href="../css/header.css"> -->
    <link rel="stylesheet" type="text/css" href="../css/new-nav.css">
    <!-- <link rel="stylesheet" type="text/css" href="../css/navigation.css"> -->
    <link rel="stylesheet" type="text/css" href="../css/content.css">
    <link rel="stylesheet" type="text/css" href="../css/footer.css">
    <link rel="stylesheet" type="text/css" href="../css/home.css">
    <link rel="stylesheet" type="text/css" href="../css/items-grid.css">
    <link rel="stylesheet" type="text/css" href="../css/overlay.css">
    <link rel="stylesheet" type="text/css" href="../css/item-info.css">


    <script>
    facebook.init({
      appID: config.FBID,
    });
    </script>
    <script>
        $(document).ready(function() {
            // DOM

            $('.no-go').on('click', function(e) {
                e.preventDefault();
                console.log('clicked a.no-go');

                $('#overlay')
                    .removeClass('hidden')
                    .addClass('shown');

                $('body').addClass('no-scroll');
                var index = store.getIndex(this);
                store.displayOverlay(store.renderOverlay(index));

                store.overlayInitThumb();

                store.overlaySetPreview();

            });

            $('#overlay-close').on('click', function() {
                console.log('clicked #overlay-close');

                $(this).parent()
                    .removeClass('shown')
                    .addClass('hidden');

                $('body').removeClass('no-scroll');
            });
        });
    </script>
</head>


<body>
<div id="fb-root"></div>
<!-- OVERLAY -->
<div id="overlay" class="hidden">
    <div id="overlay-close"></div>
    <div id="overlay-display">
        <?php include '../handlebar-templates/overlay-html.php'; ?>
    </div><!--end #overlay-display-->
</div><!--end #overlay-->
<!-- END OVERLAY -->

<div id="wrapper">
    <!-- HEADER -->
    <?php include "../templates/new-header.php"; ?>
    <!-- END HEADER -->
    <!-- NAV -->
    <?php include '../templates/new-nav.php'; ?>
    <!-- END NAV-->

    <!-- CONTENT -->
    <div id="content">
        <div class="container">
        
            <!-- Container to hold the objects -->
            <div id="objects-display">
                <?php items::display_grid($store_items_result); ?>
                <div class="clear"></div>
        	</div><!--END objects-display-->
        </div><!--END container-->
    </div><!--END content-->
    <!-- END CONTENT-->

    <!-- FOOTER -->
    <?php include "../templates/footer.php";?>
    <!-- END FOOTER -->

</div><!--END wrapper-->

<!-- TEMPLATES -->
<?php
    // include "../handlebar-templates/overlay-template.php";
?>

<!-- <script type="text/javascript" src="../js/json-search-db.js"></script> -->
<script src="../js/home.js"></script>
</body>
</html>

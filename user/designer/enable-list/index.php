<?php
session_start();
include_once '../../../php/config.php';
include_once '../../../php/items.php';
include_once '../../../php/navigation_categories.php';
?>

<!doctype html>
<html lang="en">
<head>
    <title>Designer Enable Lists</title>
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
    <link rel="stylesheet" type="text/css" href="../../../css/core.css">
    <link rel="stylesheet" type="text/css" href="../../../css/header.css">
    <link rel="stylesheet" type="text/css" href="../../../css/nav.css">
    <link rel="stylesheet" type="text/css" href="../../../css/content.css">
    <link rel="stylesheet" type="text/css" href="../../../css/footer.css">
    <link rel="stylesheet" type="text/css" href="../../../css/user-lists.css">

    <script>
        facebook.init({
            appID: config.FBID,
            ver: config.FBVer
        });
    </script>

</head>
<body>
<div id="fb-root"></div>

<div id="wrapper">
    <?php
    include_once "../../../templates/header.php";
    include_once '../../../templates/nav.php';
    include_once "../../../php/user-lists.php";
    ?>
    <div style="clear:both"></div>

    <div id="content">
        <div id="main">

            <?php
            // Get current requests given designer_id
            $requests = user_lists::getDesignerRequests($con, 1);
            $current = array();
            $pending = array();
            $approved = array();
            $rejected = array();
            foreach ($requests as $request) {
                $status = $request['status'];
                switch ($status) {
                    case 0:
                        $current[] = $request;
                        break;
                    case 1:
                        $pending[] = $request;
                        break;
                    case 2:
                        $approved[] = $request;
                        break;
                    case 3:
                        $rejected[] = $request;
                        break;
                }
            }

            //Fixes the time differences
            date_default_timezone_set("America/Los_Angeles");
            ?>

            <div style="text-align: center;">
                <a href="#current-enable">
                    <div class="section-nav">Current Enable</div>
                </a>
                <a href="#pending-review">
                    <div class="section-nav">Pending Review</div>
                </a>
                <a href="#approved-enable">
                    <div class="section-nav">Approved Enable</div>
                </a>
                <a href="#rejected-enable">
                    <div class="section-nav">Rejected Enable</div>
                </a>
            </div>
            <div class="clear"></div>

            <br/>
            <section id="current-enable" class="list">
                <span class="heading">Current Enable Requests</span><br/>
                <span>Click for more info or pass to skip request</span>
                <!--enable-id date time time-left object-name object-image enable-artwork pass-->
                <div class="field">
                    <div class="cell-w200 cell-h30 ml-10">Enable Request ID</div>
                    <div class="cell-w200 cell-h30">End Time</div>
                    <div class="cell-w150 cell-h30">Time Left</div>
                    <div class="cell-w250 cell-h30">Object Name</div>
                    <div class="cell-w100 cell-h30">Artwork</div>
                    <div class="cell-w90 cell-h30">Pass</div>
                    <div class="clear"></div>
                </div>
                <!--END current .field-->
                <div class="clear"></div>
                <?php
                foreach ($current as $request) {
                    $pass_filepath = DIR . "/enable/review/pass/?enable_id=" . $request['enable_id'];
                    $row = '';
                    $row = '<a href="../../../enable/?enable_id=' . $request['enable_id'] . '">';
                    $row .= '<div class="row light">';
                    $row .= user_lists::makeIdCell($request['enable_id'], 'ml-10');
                    $row .= user_lists::makeDateCell($request['due_date']);
                    $row .= user_lists::makeDueDate($request['due_date']);
                    $row .= user_lists::makeNameCell($request['item_name']);
                    $row .= user_lists::makeArtworkCell($request['image_filepath']);
                    $row .= user_lists::makeButton($pass_filepath, "pass", "&#10006;");
                    $row .= '<div class="clear"></div>';
                    $row .= '</div></a><div class="clear"></div>';
                    echo $row;
                }
                ?>
            </section>
            <!--END current-enable-->

            <br/>
            <section id="pending-review" class="list">
                <span class="heading">Pending Enable Reivew</span><br/>
                <span>Submitted enable requests waiting for review</span>

                <div class="field">
                    <div class="cell-w200 cell-h30 ml-125">Enable Request ID</div>
                    <div class="cell-w200 cell-h30">End Time</div>
                    <div class="cell-w200 cell-h30">Submit Time</div>
                    <div class="cell-w250 cell-h30">Object Name</div>
                    <div class="clear"></div>
                </div>
                <!--END pending .field-->
                <div class="clear"></div>
                <?php
                foreach ($pending as $request) {
                    $row = '';
                    $row .= '<div class="row light">';
                    $row .= user_lists::makeIdCell($request['enable_id'], 'ml-125'); //m-30
                    $row .= user_lists::makeDateCell($request['due_date']);
                    $row .= user_lists::makeDateCell($request['date_submitted']);
                    $row .= user_lists::makeNameCell($request['item_name']);
                    $row .= '<div class="clear"></div>';
                    $row .= '</div></a><div class="clear"></div>';
                    echo $row;
                }
                ?>
            </section>
            <!--END pending-review-->

            <br/>
            <section id="approved-enable" class="list">
                <span class="heading">Approved Requests</span><br/>
                <span>Enable requests that have passed enable review</span>

                <div class="field">
                    <div class="cell-w200 cell-h30 ml-125">Enable Request ID</div>
                    <div class="cell-w200 cell-h30">Submit Time</div>
                    <div class="cell-w250 cell-h30">Object Name</div>
                    <div class="cell-w100 cell-h30">Artwork</div>
                    <div class="clear"></div>
                </div>
                <!--END approved .field-->
                <div class="clear"></div>
                <?php
                foreach ($approved as $request) {
                    $row = '';
                    $row .= '<div class="row light">';
                    $row .= user_lists::makeIdCell($request['enable_id'], 'ml-125');
                    $row .= user_lists::makeDateCell($request['date_submitted']);
                    $row .= user_lists::makeNameCell($request['item_name']);
                    $row .= user_lists::makeArtworkCell($request['image_filepath']);
                    $row .= '<div class="clear"></div>';
                    $row .= '</div></a><div class="clear"></div>';
                    echo $row;
                }
                ?>
            </section>
            <!--END approved-enable-->

            <br/>
            <section id="rejected-enable" class="section-enable-list">
                <span class="heading">Rejected Requests</span><br/>
                <span>Enable requests that failed enable review</span>

                <div class="field">
                    <div class="cell-w200 cell-h30 ml-175">Enable Request ID</div>
                    <div class="cell-w200 cell-h30">Submit Time</div>
                    <div class="cell-w250 cell-h30">Object Name</div>
                    <div class="clear"></div>
                </div>
                <!--END rejected .field-->
                <div class="clear"></div>

                <?php
                foreach ($rejected as $request) {
                    $row = '';
                    $row .= '<div class="row light">';
                    $row .= user_lists::makeIdCell($request['enable_id'], 'ml-175');
                    $row .= user_lists::makeDateCell($request['date_submitted']);
                    $row .= user_lists::makeNameCell($request['item_name']);
                    $row .= '<div class="clear"></div>';
                    $row .= '</div></a><div class="clear"></div>';
                    echo $row;
                }
                ?>
            </section>
            <!--END rejected-enable-->


            <div class="clear"></div>
        </div>
        <!--END main-->
        <div style="clear:both"></div>
        <br/>
        <br/>

    </div>

    <?php include_once "../../../templates/footer.php"; ?>
</div>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>

</body>
</html>
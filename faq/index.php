<!doctype html>
<?php include_once '../php/config.php';
include_once '../php/items.php';
include_once '../php/navigation_categories.php'?>

<html lang="en">
<head>
    <title>Emblem Objects - FAQ</title>
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
    <link rel="stylesheet" type="text/css" href="../css/faq.css">
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
            <br><br>

            <h1>FAQ</h1>

            <p>&nbsp</p>

            <div class="question" id="q1"><h3>Q: What are you?</h3></div>
            <div class="answer" id="a1">A: We are EmblemObjects, a 3D printing design service, creating product tailored
                to your needs.
            </div>

            <div class="question" id="q2"><h3>Q: What is a Base Object?</h3></div>
            <div class="answer" id="a2">A: Base Objects are products that have been created for the purpose of having
                your designs 3D printed on
                them.
            </div>

            <div class="question" id="q3"><h3>Q: What is an Unique Object?</h3></div>
            <div class="answer" id="a3">A: Unique Objects are products that are fully realized by a designer, so what
                you see is what you get.
            </div>

            <div class="question" id="q4"><h3>Q: Who are designers?</h3></div>
            <div class="answer" id="a4">A: Designers create products you see on the site. They help you realize your
                images and designs on base
                objects of your choosing.
            </div>

            <div class="question" id="q5"><h3>Q: How do you 3D print?</h3></div>
            <div class="answer" id="a5">A: We use a number of commercial 3D printing services. This ensures that we
                give you the best objects with
                the most value.
            </div>

            <div class="question" id="q6"><h3>Q: What happens to my Design Request?</h3></div>
            <div class="answer" id="a6">A: Our designers gets your Design Requests and create object previews for
                you. These are real people,
                working very hard to get you the best results possible, please treat them with respect.
            </div>

            <div class="question" id="q7"><h3>Q: How do I pay for my order?</h3></div>
            <div class="answer" id="a7">A: We use PayPal checkout. They are one of the most trusted name in online
                payments and have excellent
                customer service.
            </div>

            <div class="question" id="q8"><h3>Q: Can I use my credit card for payment, if I don’t have a PayPal
                    account?</h3></div>
            <div class="answer" id="a8">A: Yes you can. We use PayPal Guest Checkout so you don’t have to to be
                registered on PayPal.
            </div>

            <div class="question" id="q9"><h3>Q: Am I obligated to buy if I submit a Design Request?</h3></div>
            <div class="answer" id="a9"> A: Of course not, if the object preview is not what you want, you don’t
                have to buy it. Just be considerate
                to our designers time. Thank you.
            </div>

            <div class="question" id="q10"><h3>Q: How long does it take for me to get my objects?</h3></div>
            <div class="answer" id="a10">A: It depends on the type objects and quantity of the order. Naturally,
                unique objects will take less
                because we can initiate the printing process right away. If you are designing a base object, it will
                take a
                bit longer since our designer have to create it then EmblemObjects perform a design
                review to approve it for quality. Usually, the entire process takes about a month. Thank you for
                your
                patience, We are working very hard on shortening this time.
            </div>

            <div class="question" id="q11"><h3>Q: What happens if my object does not pass design review?</h3></div>
            <div class="answer" id="a11">A: We will let you know that the object cannot be printed. There is no cost
                to you. Though this happens very
                rarely.
            </div>

            <div class="question" id="q12"><h3>Q: What if your 3D printers cannot print the object?</h3></div>
            <div class="answer" id="a12"> A: We will let you that our printers cannot print the object, and release
                the authorization hold on your
                payment. You will not be charged until our printers confirm your object can be printed.
            </div>

            <div class="question" id="q13"><h3>Q: Do you take other currencies?</h3></div>
            <div class="answer" id="a13"> A: At this time, we only on accept U.S. Dollars. We are always thinking of
                way to widen our market so check
                back often.
            </div>

            <div class="question" id="q14"><h3>Q: What is your shipping policy?</h3></div>
            <div class="answer" id="a14">A: We charge a flat rate $7 to shipping anywhere in US (except Hawaii and
                Alaska). At this point, we do not
                ship outside of the US.
            </div>
        </div>
    </div>
    <div style="clear:both"></div>




    <?php include "../templates/footer.php"; ?>
</div>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript" src="../js/faq.js"></script>

</html>

<?php
// include_once "../php/config.php";
?>

<!-- HEADER -->
<header>
    <div class="container">

        <div id="user">
            <div id="user-login">
                <fb:login-button
                    scope="public_profile,email"
                    autologoutlink="true"
                    onlogin="checkLoginState();">
                </fb:login-button>
            </div>
            <!--end span#user-login-->
            <a href="#user">
                <div id="user-name"></div>
            </a>

            <div class="clear"></div>
            <a href="<?php echo DIR . "/user/designer/enable-list/index.php" ?>" class="user-btn">Designer</a>
            <a href="<?php echo DIR . "/user/staff/review-list/index.php" ?>" class="user-btn">Emblem Staff</a>
        </div>


        <div id="header-head">
            <a title="Let's go home..." href="<?php echo DIR; ?>/home" class="head-home">
                <div id="head-logo"></div>
                <span class="head-btn">EMBLEMOBJECTS</span>
            </a>
            <a title="What's new in the world around us" href="<?php echo DIR; ?>/whats-new" class="head-btn">
                WHAT'S NEW
            </a>
            <a title="Wondering how EmblemObjects work? Let us show you" href="<?php echo DIR; ?>/how-to"
               class="head-btn">
                HOW TO
            </a>
        </div>

        <div class="clear"></div>
    </div>
    <!--end div.container-->
</header><!--end header-->
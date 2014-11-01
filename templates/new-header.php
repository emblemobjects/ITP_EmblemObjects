<?php
// include_once "../php/config.php";
?>

<!-- HEADER -->
<header>
<div class="container">

<div id="user">
    <a href="#user">
        <div id="user-name">Jacob Blitzer</div>
    </a>
    <div id="user-login">
        <fb:login-button 
            scope="public_profile,email"
            autologoutlink="true"
            onlogin="checkLoginState();">
        </fb:login-button>
    </div><!--end span#user-login-->
    <div class="clear"></div>
    <a href="#designer" class="user-btn">Designer</a>
    <a href="#staff" class="user-btn">Emblem Staff</a>
</div>


<div id="header-head">
    <a href="<?php echo DIR; ?>/home" class="head-home">
        <div id="head-logo"></div>
        <span class="head-btn">EMBLEMOBJECTS</span>
    </a>
    <a href="<?php echo DIR; ?>/whats-new" class="head-btn">
        WHAT'S NEW
    </a>
    <a href="<?php echo DIR; ?>/how-to" class="head-btn">
        HOW TO
    </a>
</div>

<div class="clear"></div>
</div><!--end div.container-->
</header><!--end header-->
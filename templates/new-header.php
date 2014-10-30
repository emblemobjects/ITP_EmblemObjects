<!--
<?php
include_once "../php/config.php";
?>

<link rel="stylesheet" type="text/css" href="../css/new-header.css">
<link rel="stylesheet" type="text/css" href="../css/core.css">

<script type="text/javascript" src="<?php echo DIR; ?>/js/facebook-js-sdk/facebook-sdk.js"></script>
<script type="text/javascript" src="<?php echo DIR; ?>/js/facebook-js-sdk/facebook-api.js"></script>

<script>
facebook.init({
  appID: '609528499167439',
});
</script>
-->

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
        <img src="<?php echo DIR; ?>/asset/favicon-white.png"/>
        <span class="head-btn">EmblemObjects</span>
    </a>
    <a href="<?php echo DIR; ?>/whats-new" class="head-btn">
        What's New
    </a>
    <a href="<?php echo DIR; ?>/how-to" class="head-btn">
        How To
    </a>
</div>

<div class="clear"></div>
</div><!--end div.container-->
</header><!--end header-->
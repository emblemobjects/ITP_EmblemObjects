<head>
	<title></title>

</head>
<body>
<div id="fb-root"></div>

<?php
echo 'facebook-test.php<hr/>';
// Facebook Php Sdk Test
// var_dump(include_once '../../php/facebook-php-require.php');
include_once '../../php/config.php';
include_once '../../php/facebook-php-require.php';

use Facebook\FacebookSession;

FacebookSession::setDefaultApplication($FB['app_id'],$FB['app_secret']);





?>

<hr/>

<div
  class="fb-like"
  data-href="http://www.google.com"
  data-share="true"
  data-width="450"
  data-show-faces="true">
</div>
<!-- data-href="http//:localhost:8080/facebook/facebook-login.html" -->

<div id="user">
    <div id="user-login">
        <fb:login-button 
            scope="public_profile,email"
            autologoutlink="true"
            onlogin="checkLoginState();">
        </fb:login-button>
    </div><!--end span#user-login-->
    <a href="#user">
        <div id="user-name"></div>
    </a>
    <div class="clear"></div>
    <a href="#designer" class="user-btn">Designer</a>
    <a href="#staff" class="user-btn">Emblem Staff</a>
</div>
</div>


<a href="redirect.php">Click ME!</a>

<script>




</script>

<script type="text/javascript" src="../../js/config.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.js"></script>
<script type="text/javascript" src="../../js/facebook-js-sdk/facebook-sdk.js"></script>
<script type="text/javascript" src="../../js/facebook-js-sdk/facebook-api.js"></script>

<script>

var config = window.config || {};

facebook.init({
  appID: '360442404114516',
  ver: 'v2.1',
  msg: 'Passed',
});

</script>

</body>
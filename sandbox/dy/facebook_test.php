<head>
	<title></title>
	<script type="text/javascript" src="../../js/facebook-js-sdk/facebook-sdk.js"></script>
	<script type="text/javascript" src="../../js/facebook-js-sdk/facebook-api.js"></script>
<script>

facebook.init({
  appID: '609528499167439',
  msg: 'Passed',
});

</script>
</head>
<body>

<?php
// Facebook Php Sdk Test
// var_dump(include_once '../../php/facebook-php-require.php');
include_once '../../php/facebook-php-require.php';

use Facebook\FacebookSession;
// use Facebook\FacebookJavaScriptLoginHelper;

echo 'Hello!<hr/>';

FacebookSession::setDefaultApplication('360442404114516','3685eca8c02b480bb2027336c8b820e3');

$fb_token = $_GET['access_token'];

$fb_session = new FacebookSession($fb_token);

if(isset($fb_session)) {
	echo "connected! facebook session";
}



/* Get Auth from another means
 */
//$session = new FacebookSession('')

// If facebook session true
//if ($session) {
	// query db for username
	// if usernot found, create new user with facebook info
	
	// create php session
//}

/* Get Auth from JS
 */
// $helper = new FacebookJavaScriptLoginHelper();

// try {
// 	$session = $helper->getSession();
// } catch (FacebookRequestException $ex) {
// 	echo "<br/>Facebook Returned Error";
// } catch (\Exception $ex) {
// 	echo "<br/>Validation Failed / Local Issues";
// }

// echo 'session: ' . $session;

// if ($session) {
// 	echo "<hr/>starting session...";
// }

?>

<script>

// facebook.init({
//   appID: '609528499167439',
//   msg: 'Passed',
// });

</script>

<div
  class="fb-like"
  data-href="http://www.google.com"
  data-share="true"
  data-width="450"
  data-show-faces="true">
</div>
<!-- data-href="http//:localhost:8080/facebook/facebook-login.html" -->

<fb:login-button 
	scope="public_profile,email"
	autologoutlink="true"
	onlogin="checkLoginState();">
</fb:login-button>

<div id="status">
</div>

</body>
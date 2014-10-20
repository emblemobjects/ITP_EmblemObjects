<head>
	<title></title>
	<script type="text/javascript" src="../../js/facebook-js-sdk/facebook-sdk.js"></script>
	<script type="text/javascript" src="../../js/facebook-js-sdk/facebook-api.js"></script>

</head>
<?php
// Facebook Php Sdk Test
// var_dump(include_once '../../php/facebook-php-require.php');
include_once '../../php/facebook-php-require.php';

echo '<hr/>Hello!';

FacebookSession::setDefaultApplication('360442404114516','3685eca8c02b480bb2027336c8b820e3');

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
$helper = new FacebookJavaScriptLoginHelper();

try {
	$session = $helper->getSession();
} catch (FacebookRequestException $ex) {
	echo "<br/>Facebook Returned Error";
} catch (\Exception $ex) {
	echo "<br/>Validation Failed / Local Issues";
}

if ($session) {
	echo "<hr/>starting session...";
}

?>

<boody>
<script>

facebook.init({
  appID: '609528499167439',
  msg: 'Passed',
});

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
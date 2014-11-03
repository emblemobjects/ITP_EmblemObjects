<head>
	<title></title>
	<script type="text/javascript" src"https://code.jquery.com/jquery-2.1.1.js"></script>
	<script type="text/javascript" src="../../js/facebook-js-sdk/facebook-sdk.js"></script>
	<script type="text/javascript" src="../../js/facebook-js-sdk/facebook-api.js"></script>
<script>

facebook.init({
  appID: '360442404114516',
  ver: 'v2.1',
  msg: 'Passed',
});

</script>
</head>
<body>
<div id="fb-root"></div>

<?php
echo 'facebook-text.php<hr/>';
// Facebook Php Sdk Test
// var_dump(include_once '../../php/facebook-php-require.php');
include_once '../../php/config.php';
include_once '../../php/facebook-php-require.php';

use Facebook\FacebookSession;
use Facebook\FacebookJavaScriptLoginHelper;
use Facebook\FacebookRequest;
use Facebook\GraphUser;


FacebookSession::setDefaultApplication($FB['app-id'],$FB['app-secret']);


/* Create Seesion Auth with Token
 */
// $fb_token = $_GET['access_token'];

// $fb_session = new FacebookSession($fb_token);

// if(isset($fb_session)) {
// 	echo "connected! facebook session";
// }



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
	echo "getting session <hr/>";
	$FBsession = $helper->getSession();
	print_r($FBsession); echo "<hr/>";
} catch (FacebookRequestException $ex) {
	echo "Facebook Returned Error<hr/>";
} catch (\Exception $ex) {
	echo "Validation Failed / Local Issues<hr/>";
}

// echo 'session: ' . $session;
// echo $_SESSION['loggedin'];

if ($FBsession) {
	echo "got session...<hr/>";
	$FBsession_info = $FBsession->getSessionInfo()->asArray();
	echo $FBsession_info['user_id'];
	print_r($FBsession_info['scopes']);
	echo "<br/>";
	echo $FBsession->getAccessToken();


	$request = new FacebookRequest($FBsession, 'GET', '/me');

	$response = $request->execute();

	$profile = $response->getGraphObject(GraphUser::className());

	print_r($profile); echo "<hr/>";
	echo $profile->getProperty('email');
	echo $profile->getProperty('first_name');
	echo $profile->getProperty('last_name');
	echo $profile->getProperty('gender');


	session_start();
	$_SESSION['status'] = false;
	print_r($_SESSION); echo "<hr/>";

	$_SESSION['fb-id'] = '8';
}



?>

<script>

// facebook.init({
//   appID: '609528499167439',
//   msg: 'Passed',
// });

</script>
<hr/>
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
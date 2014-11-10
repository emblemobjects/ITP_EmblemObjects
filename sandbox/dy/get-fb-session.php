<?php
/* get-fb-session.php
 *
 * get facebook session from JS login
 * used in ajax call facebookJsHelper
 *
 * use session to make to make a graph request
 * save user-id, email, first, last names to db and session
 */
// echo 'get-fb-session.php<hr/>'; // debug line

// include config / fb-require
include_once '../../php/config.php';
include_once '../../php/facebook-php-require.php';

// facebook namespace
use Facebook\FacebookSession;
use Facebook\FacebookJavaScriptLoginHelper;
use Facebook\FacebookRequest;
use Facebook\GraphUser;

// set facebook app
FacebookSession::setDefaultApplication($FB['app_id'],$FB['app_secret']);

/* 
 * Get Auth from JS
 */
// declare helper
$fb_js_helper = new FacebookJavaScriptLoginHelper();


try {
	echo "init fb session <hr/>".PHP_EOL;
	$fb_session = $fb_js_helper->getSession();
	// print_r($fb_session); echo "<hr/>";
} catch (FacebookRequestException $ex) {
	echo "Facebook Returned Error<hr/>";
} catch (\Exception $ex) {
	echo "Validation Failed / Local Issues<hr/>";
}


if ($fb_session) {
	// echo "got session...<hr/>";

	session_start();
	$_SESSION['status'] = 'false';

	// accessToken from session - not necs yet
	// echo $FBsession->getAccessToken(); echo '<hr/>';

	// session as array
	// $fb_session_info = $fb_session->getSessionInfo()->asArray();

	// user id from session array - not necs yet
	// echo $FBsession_info['user_id']; echo '<hr/>';

	// fb request from fb session
	$fb_request = new FacebookRequest($fb_session, 'GET', '/me');
	$fb_response = $fb_request->execute();
	$fb_profile = $fb_response->getGraphObject(GraphUser::className());

	// print fb profile object - debug
	echo '$fb_profile: ';
	print_r($fb_profile);
	// echo "<hr/>";

	$fb_id = $fb_profile->getProperty('id');
	$fb_email = $fb_profile->getProperty('email');
	$fb_first = $fb_profile->getProperty('first_name');
	$fb_last = $fb_profile->getProperty('last_name');
	$fb_gender = $fb_profile->getProperty('gender');
	$fb_locale = $fb_profile->getProperty('locale');
	$fb_time = $fb_profile->getProperty('timezone');
	$fb_status = $fb_profile->getProperty('verified');

	// fb profile reponse debug
	// echo is_numeric($fb_time);
	// echo $fb_id;
	// echo $fb_email;
	// echo $fb_first;
	// echo $fb_last;
	// echo $fb_gender;
	// echo $fb_status;
	// echo "<hr/>";
	
	// $_SESSION['fb_id'] = $fb_id;
	// $_SESSION['fb_first'] = $fb_first;
	// $_SESSION['fb_last'] = $fb_last;
	// $_SESSION['fb_email'] = $fb_email;
	// $_SESSION['fb_gender'] = $fb_gender;
	// $_SESSION['fb_locale'] = $fb_locale;
	
	if ($fb_status == '1') {
		$_SESSION['status'] = 'true';
	}
	
	// session debug
	// print_r($_SESSION); echo "<hr/>";

	$user_check_sql = "SELECT user_id, user_fb_id FROM user_table WHERE user_fb_id = $fb_id";
	// echo $user_check_sql;

	$user_check_results = mysqli_query($con,$user_check_sql);
	if (!$user_check_results) {
        exit ('$user_check_results error: ' . mysqli_error($con));
    }

	$user_known = $user_check_results->num_rows;
	// echo 'user check: '.$user_known;

	if ($user_known == 0) {
		echo 'create user'.PHP_EOL;

		$create_user_sql =
			"INSERT INTO user_table (user_fb_id, user_first_name, user_last_name, user_email, user_gender, user_location, user_time)
			VALUES ('$fb_id', '$fb_first', '$fb_last', '$fb_email', '$fb_gender', '$fb_locale', $fb_time)";
		// echo $create_user_sql;

		$create_user_result = mysqli_query($con, $create_user_sql);
		if (!$create_user_result) {
	        exit ('$create_user_result error: ' . mysqli_error($con));
	    }
	    else {
	    	$user_capture_results = mysqli_query($con, $user_check_sql);
	    	$user_capture_result = mysqli_fetch_array($user_capture_results);
	    	$_SESSION['user-id'] = $user_capture_result['user_id'];
	    	echo 'captured: '.$_SESSION['user-id'].PHP_EOL;
	    }
	}
	else {
		echo 'user found'.PHP_EOL;
		// print_r($user_check_results);

	    $user_check_result = mysqli_fetch_array($user_check_results);
		// print_r($user_check_result);

		$_SESSION['user-id'] = $user_check_result['user_id'];
		echo 'response: '.$_SESSION['user-id'].PHP_EOL;
	}
}
else {
	// $session_destroy();
}

echo 'ajax get-fb-session.php done';

?>
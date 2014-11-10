<?php
/* twtitter-test.php
 *
 * use to test twitter-api.php
 */
echo 'twitter-test.php '.date('d/m/Y == H:i:s').'<hr/>'; //debug line

include_once '../../php/config.php';
require_once 'twitter-api.php';

twitter::set_app([
	'api_key'=> $TWITTER['app_key'],
	'api_secret'=> $TWITTER['app_secret'],
]);

twitter::get_bearer_token();

$response = twitter::search(['superbowl','nfl']);

twitter::to_JSON($response,'results');

$timeline = twitter::get_timeline('dchen2913');

twitter::to_JSON($timeline,'timeline');

// $integer = gettype(16303106);
// $double = gettype(2869514004);
// $string = gettype('dchen2913');
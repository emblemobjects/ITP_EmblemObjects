<?php
/* twtitter-test.php
 *
 * use to test twitter-api.php
 */
echo 'twitter-test.php<hr/>'; //debug line

require_once 'twitter-api.php';

twitter::set_app([
	'api_key'=>'LGY4537VWMlVC3RR116y4eaiW',
	'api_secret'=>'kHMNJw0QPMXf359jR1G642qVOwsgI56cJ3qjIfX1huW6iJUNWF'
]);

twitter::get_bearer_token();

twitter::get_timeline('dchen2913');
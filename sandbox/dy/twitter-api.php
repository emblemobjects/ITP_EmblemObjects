<?php
/* twitter-api.php
 *
 * use to call twitter api
 */
echo 'twitter-api.php<hr/>'; // debug line

include_once '../../php/config.php';

// CLASS twitter - to call twitter::functtion_name();
class twitter {
	//
	const AUTH_URL = 'https://api.twitter.com/oauth2/token';
	const API_END = 'https://api.twitter.com/1.1';

	public static $api_key;
	public static $api_secret;
	public static $bearer_token;

	public static function set_app($app_info) {
		//
		self::$api_key = $app_info['api_key'];
		self::$api_secret = $app_info['api_secret'];

		echo self::$api_key.'<br/>';
		echo self::$api_secret.'<br/>';
		echo self::$bearer_token.'<hr/>';
	}

	public static function url_encode() {
		$enc1 = urlencode(self::$api_key);
		$enc2 = urlencode(self::$api_secret);
		$enc = $enc1.':'.$enc2;

		echo $enc.'<hr/>';
		return $enc;
	}

	public static function get_bearer_token() {
		//
		//if (is_null(self::$bearer_token)) {
			$url_enc = twitter::url_encode();
			$base64_enc = base64_encode($url_enc);
			echo $base64_enc.'<hr/>';

			$content_opts = array(
				'http' => array(
					'method' => 'POST',
					'header' => 
								// "HOST: api.twitter.com\r\n" . 
								// "User-Agent: My Twitter App v1.0.23\r\n" . 
								"Authorization: Basic ".$base64_enc."\r\n" . 
								"Content-Type: application/x-www-form-urlencoded;charset=UTF-8\r\n" . 
								// "Content-Length: 29\r\n" . 
								// "Accept-Encoding: gzip\r\n" . 
								"Connection: close\r\n" . 
								"",
					'content' => 'grant_type=client_credentials',
					'protocol_version' => 1.1
				)
			);

			$context = stream_context_create($content_opts);
			// print_r($context);

			// $auth_url = 'https://api.twitter.com/oauth2/token';

			$auth_response = file_get_contents(self::AUTH_URL, false, $context);
			// print_r($auth_response);
			// echo '<br/>';

			$auth = json_decode($auth_response);

			$type = $auth->token_type;
			// echo $type;

			if ($type == 'bearer') {
				$token = $auth->access_token;
				self::$bearer_token = $token;
			} else {
				self::$bearer_token = 'invalid';
			}
		//}

		echo self::$bearer_token.'<br/>';
		return self::$bearer_token;
	}

	public static function get_timeline($screen) {
		//
		$token_enc = base64_encode(self::$bearer_token);
		echo $token_enc.'<br/>';

		$path = 'statuses/user_timeline';

		$url = self::API_END . $path . '.json?' . 'screen_name=' . $screen;
		echo $url;

		// $url = 'https://api.twitter.com/1.1/search/tweets.json?q=%23superbowl';
		echo $url;

		$content_opts = array(
			'http' => array(
				'method' => 'GET',
				'header' => 
							"HOST: api.twitter.com\r\n" . 
							"User-Agent: My Twitter App v1.0.23\r\n" . 
							"Authorization: Bearer ".self::$bearer_token."\r\n" . 
							"Content-Type: application/x-www-form-urlencoded;charset=UTF-8\r\n" . 
							"Content-Length: 29\r\n" . 
							"Accept-Encoding: gzip\r\n" . 
							"Connection: close\r\n" . 
							"",
				// 'content' => 'grant_type=client_credentials',
				'protocol_version' => 1.1
			)
		);

		$context = stream_context_create($content_opts);
		// print_r($context);

		// $auth_url = 'https://api.twitter.com/oauth2/token';

		$auth_response = file_get_contents($url, false, $context);

		print_r($auth_response);

		// $auth_url = 'https://api.twitter.com/1.1';
	}

}

// POST /oauth2/token HTTP/1.1
// Host: api.twitter.com
// User-Agent: My Twitter App v1.0.23
// Authorization: Basic eHZ6MWV2RlM0d0VFUFRHRUZQSEJvZzpMOHFxOVBaeVJnNmllS0dFS2hab2xHQzB2SldMdzhpRUo4OERSZHlPZw==
// Content-Type: application/x-www-form-urlencoded;charset=UTF-8
// Content-Length: 29
// Accept-Encoding: gzip

// grant_type=client_credentials
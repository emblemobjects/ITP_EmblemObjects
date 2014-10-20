<?php
// Facebook Php Sdk Test
// var_dump(include_once '../../php/facebook-php-require.php');
include_once '../../php/facebook-php-require.php';

echo '<hr/>Hello!';

use Facebook\FacebookSession;

FacebookSession::setDefaultApplication('','');
$session = new FacebookSession('')

// If facebook session true
if ($session) {
	// query db for username
	// if usernot found, create new user with facebook info
	
	// create php session
}
<?php
echo 'redirect.php<hr/>'; // debug line - comment out for prod

session_start();

echo
	$_SESSION['status'].'<br/>'.
	$_SESSION['fb_id'].'<br/>'.
	$_SESSION['fb_first'].'<br/>'.
	$_SESSION['fb_last'].'<br/>'.
	$_SESSION['fb_email'].'<br/>'.
	$_SESSION['fb_gender'].'<br/>'.
	$_SESSION['fb_locale'];

session_destroy();

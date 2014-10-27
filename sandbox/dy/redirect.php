<?php
echo 'redirect.php<hr/>'; // debug line - comment out for prod

// MUST Include config.php
include 'config.php';

// Includes
include_once 'helper.php';
include 'db-con.php';

$str = "hello'world";

echo helper::escape_str($con,$str);
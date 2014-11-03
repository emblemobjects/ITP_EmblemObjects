<?php
/* session.php
 *
 */
// echo 'session.php<hr/>'; // debug line

// start session - allow session variables
session_start();

// set session status to 'false' - not FB auth 
$_SESSION['status'] = 'false';
<?php
/* config.php
 *
 * site config file - ALL php files MUST include this file
 * include_once '/php/config.php';
 * php files - immediatly after first <?php
 * HTML files - before <handlebar-templates> tag
 *
 * DIR - server path
 *
 * includes helper.php
 *
 * connection const HOST,USER,PASSWORD,DATABASE
 */
// echo 'config.php<hr/>'; // debug line - comment out for prod

/*
 * BASE DIRECTORY
 */
const DIR = 'http://itp.emblemobjects.com'; // eo itp
$Dir = DIR; // compat 


// Inlucde helper.php
include_once 'helper.php';
// secure file
// helper::secure_file(__FILE__);


/*
 * DATABASE SETTINGS
 */
const HOST = "emblemobjects.com";
const USER = "emblemo1_itp";
const PASSWORD = "uscitp";
const DATABASE = "emblemo1_itp";

// database connection using CONST
$con = mysqli_connect(HOST, USER, PASSWORD, DATABASE);


/*
 * FACEBOOK APP SETTINGS
 */
$FB = [];

/*
 * TWITTER APP SETTINGS
 */
$TWITTER = [];

/*
 * PLUGIN LINKS
 */
// jQuery - google cdn/prod
$jQuery = "http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"; // min - production

?>

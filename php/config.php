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
const DIR = 'http://localhost:8080/ITP460/ITP_EmblemObjects'; //localhost
// const DIR = 'http://itp460.uscitp.com'; //itp460
// const DIR = 'http://preview.emblemobjects.com'; //preview
// const DIR = 'http://www.emblemobjects.com'; //prod
$Dir = DIR; // compat 


// Inlucde helper.php
include_once 'helper.php';
// secure file
// helper::secure_file(__FILE__);


/*
 * DATABASE SETTINGS
 */
const HOST = "uscitp.com";
const USER = "itp460_admin";
const PASSWORD = "usc2014";
const DATABASE = "itp460_emblemobjects";

// database connection using CONST
$con = mysqli_connect(HOST, USER, PASSWORD, DATABASE);


/*
 * FACEBOOK APP SETTINGS
 */
$FB = [];
$FB['app_id'] = '360442404114516';
$FB['app_secret'] = '3685eca8c02b480bb2027336c8b820e3'; //localhost
// $FB['app_id'] = '359755337516556'; $FB['app_secret'] = '86478e6c611072cc6796bde77291a934'; //itp460
// $FB['app_id'] = '365380733620683'; $FB['app_secret'] = 'd5800cc94912b481c5db374f52988137'; //preview


/*
 * TWITTER APP SETTINGS
 */
$TWITTER = [];
$TWITTER['app_key'] = 'kce44m40sezTJxTwk7C7j36ww';
$TWITTER['app_secret'] = 'hvUrDc3oqBnMmoGoHHppKTlON9XSoEk5Vw0GHXRR3yIWcpk03i'; // https://127.0.0.1:4433

/*
 * PLUGIN LINKS
 */
// jQuery - google cdn/prod
// $jQuery = "http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"; // min - production
$jQuery = "http://code.jquery.com/jquery-2.1.1.js"; // uncompressed - dev

?>
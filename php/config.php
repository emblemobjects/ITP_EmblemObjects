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

// Base Directory
const DIR = 'http://localhost:8080/ITP460/ITP_EmblemObjects';
$Dir = DIR; // compat 

// Inlucde helper.php
include_once 'helper.php';
// secure file
// helper::secure_file(__FILE__);

// Set database CONST
const HOST = "uscitp.com";
const USER = "itp460_admin";
const PASSWORD = "usc2014";
const DATABASE = "itp460_emblemobjects";

// database connection using CONST
$con = mysqli_connect(HOST, USER, PASSWORD, DATABASE);


// jQuery - google cdn
// $jQuery = "http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"; // min - production
$jQuery = "http://code.jquery.com/jquery-2.1.1.js"; // uncompressed - dev
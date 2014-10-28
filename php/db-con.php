<?php
/* db-con.php
 *
 * database connection file
 *
 * $con - mysqli_connect var
 *
 * use database CONST from config.php
 */

// echo 'db-con.php<hr/>'; // debug line - comment out for prod

// MUST Include config.php
include_once 'config.php';
// Inlucde helper.php
include_once 'helper.php';
// secure file
// helper::secure_file(__FILE__);

$con = mysqli_connect(HOST, USER, PASSWORD, DATABASE);
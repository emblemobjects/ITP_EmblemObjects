<?php
/**
 * Created by PhpStorm.
 * User: Angela
 * Date: 10/16/2014
 * Time: 6:50 PM
 */
//Create Connection using the db-config.php file
include_once 'db-config.php';
$con = mysqli_connect(HOST, USER, PASSWORD, DATABASE);
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
//Directory setting
$Dir = "http://localhost:8080/ITP460/ITP_EmblemObjects";

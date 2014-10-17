<?php
/**
 * Created by PhpStorm.
 * User: Angela
 * Date: 10/16/2014
 * Time: 6:48 PM
 */
include_once 'db-connect-con.php';
$sql = "SELECT * FROM item";
$r = mysqli_query($con, $sql);
while ($row = mysqli_fetch_array($r)){
    echo $row['item_name'];
    echo "<br />";
}
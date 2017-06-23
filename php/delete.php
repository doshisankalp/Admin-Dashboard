<?php
/**
 * Created by PhpStorm.
 * User: omkar
 * Date: 11/6/17
 * Time: 12:02 PM
 */
include("connectdb.php");

$key=$_POST['key'];
$primary = $_POST['primary'];
$tablename = $_POST['tablename'];

$sqlquery = "DELETE FROM $tablename WHERE $primary=$key";

if (!empty($conn)) {
    $result = mysqli_query($conn, $sqlquery);
}

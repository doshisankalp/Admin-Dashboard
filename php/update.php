<?php
/**
 * Created by PhpStorm.
 * User: omkar
 * Date: 9/6/17
 * Time: 5:02 PM
 */
include("connectdb.php");

$tablename = $_POST['tablename'];
$val=$_POST['val'];
$qText = $_POST['qText'];
$primary = $_POST['primary'];

$sqlquery = "UPDATE $tablename SET $qText WHERE $primary=$val";

if (!empty($conn)) {
    $result = mysqli_query($conn, $sqlquery);
}

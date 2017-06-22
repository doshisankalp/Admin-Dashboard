<?php
/**
 * Created by PhpStorm.
 * User: omkar
 * Date: 9/6/17
 * Time: 5:02 PM
 */
include("connectdb.php");

$tblnm = $_POST['tblnm'];
$val=$_POST['val'];
$qText = $_POST['qText'];
$pkm = $_POST['pkm'];

$sqlquery = "UPDATE $tblnm SET $qText WHERE $pkm=$val";

if (!empty($conn)) {
    $result = mysqli_query($conn, $sqlquery);
}

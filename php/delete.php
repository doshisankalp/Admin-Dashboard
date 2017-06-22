<?php
/**
 * Created by PhpStorm.
 * User: omkar
 * Date: 11/6/17
 * Time: 12:02 PM
 */
include("connectdb.php");

$emp_no=$_POST['emp_no'];
$pkm = $_POST['pk'];
$tblnm = $_POST['tbln'];

$sqlquery = "DELETE FROM $tblnm WHERE $pkm=$emp_no";

if (!empty($conn)) {
    $result = mysqli_query($conn, $sqlquery);
}

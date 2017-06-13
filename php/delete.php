<?php
/**
 * Created by PhpStorm.
 * User: omkar
 * Date: 11/6/17
 * Time: 12:02 PM
 */
include("connectdb.php");

$emp_no=$_POST['emp_no'];

$sqlquery = "DELETE FROM employees WHERE emp_no=$emp_no";

if (!empty($conn)) {
    $result = mysqli_query($conn, $sqlquery);
}

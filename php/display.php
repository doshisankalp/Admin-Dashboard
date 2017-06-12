<?php
/**
 * Created by PhpStorm.
 * User: omkar
 * Date: 9/6/17
 * Time: 2:08 PM
 */
include("connectdb.php");

$index=$_POST['startindex'];
$numrow=$_POST['numrow'];
$sq = "";
$search = $_POST['searchQ'];

if($_POST['searchQ']!=""){
    $sq = "WHERE (first_name LIKE \"%$search%\")";
    $sq .= " OR (last_name LIKE \"%$search%\")";
    $sq .= " OR (emp_no LIKE \"%$search%\")";
}

$sqlquery = "select * from employees $sq limit $index,$numrow";


if (!empty($conn)) {
    $result = mysqli_query($conn, $sqlquery);
}
$count = mysqli_num_rows($result);

if ($count > 0) {
    $i=0;
    $jsonrows->rows = array();
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $temp->emp_no = $row["emp_no"];
        $temp->first_name = $row["first_name"];
        $temp->last_name = $row["last_name"];
        array_push($jsonrows->rows,clone $temp);
    }
    echo json_encode($jsonrows);
} else {
    echo "";
}
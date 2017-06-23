<?php
/**
 * Created by PhpStorm.
 * User: omkar
 * Date: 23/6/17
 * Time: 4:13 PM
 */
include("connectdb.php");
$tablename=$_POST['tablename'];

$sqlquery1="SHOW COLUMNS FROM $tablename";
$result1 = $conn->query($sqlquery1);

while($row = $result1->fetch_assoc()) {
    $columns[] = $row['Field'];

    $value[]=addslashes($_POST[$row['Field']]);
}

$sqlquery2="select max($columns[0]) FROM $tablename";


$result2 = $conn->query($sqlquery2);
$row2 = $result2->fetch_assoc();
$maxcount=$row2["max($columns[0])"];

$value[0]=$maxcount+1;

$res=implode(",",$columns);
$res1=implode("','",$value);

$sqlquery = "Insert into $tablename VALUES ('$res1')";
echo $sqlquery;
if($conn->query($sqlquery)){
    echo "<br>Added into database";
} else{
    echo "<br>Failed";
}
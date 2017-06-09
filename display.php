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

$sqlquery = "select * from employees limit " . $index * $numrow . "," . $numrow;
echo $sqlquery;

if (!empty($conn)) {
    $result = mysqli_query($conn, $sqlquery);
}
$count = mysqli_num_rows($result);

if ($count > 0) {
    echo "<table>";
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        echo "<tr>";
        echo "<td>" . $row["emp_no"] . "</td><td>" . $row["first_name"] . "</td><td>" . $row["last_name"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
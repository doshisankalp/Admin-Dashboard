<?php
//ini_set('display_errors', 1);
include("connectdb.php");

$tablename=$_POST['tablename'];

$index=$_POST['startindex'];
$numrow=$_POST['numrow'];
$sq = "";
$search = $_POST['searchQ'];

$sqlquery1="SHOW COLUMNS FROM $tablename";
$result1 = $conn->query($sqlquery1);
while($row = $result1->fetch_assoc()) {
    $columns[] = $row['Field'];
}



if($_POST['searchQ']!=""){
    $i=1;
    $sq = "WHERE ($columns[0] LIKE \"%$search%\")";

    while ($i < $result1->num_rows) {
        $sq .= " OR ($columns[$i] LIKE \"%$search%\")";
        $i++;
    }
}

$sqlquery = "select * from $tablename $sq limit $index,$numrow";

$result = $conn->query($sqlquery);
$count = $result->num_rows;
$jsonsend=array();
if ($count > 0) {

    $jsonrows->rows = array();
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $j = 0;
        $temp = array();
        while ($j < count($row)) {
            array_push($temp,$row[$columns[$j]]);
            $j++;
        }
        array_push($jsonrows->rows,$temp);
    }
    array_push($jsonsend,$columns);
    array_push($jsonsend,$jsonrows);
    echo json_encode($jsonsend);
} else {
    echo "";
}


//if($result)
//{
//    echo "<table width='100%'><tr>";
//
//    if ($result->num_rows >0)
//    {
//        $sqlquery1="SHOW COLUMNS FROM $tablename";
//        $result1 = $conn->query($sqlquery1);
//
//        while($row = $result1->fetch_assoc()){
//            $columns[] = $row['Field'];
//        }
//        $i = 0;
//        while ($i < $result->field_count)
//        {
//            echo "<th>". $columns[$i] . "</th>";
//            $i++;
//        }
//        echo "</tr>";
//
//
//        //display the data
//        while ($rows = mysqli_fetch_array($result,MYSQLI_ASSOC))
//        {
//            echo "<tr>";
//            foreach ($rows as $data)
//            {
//                echo "<td align='center'>". $data . "</td>";
//            }
//        }
//    }else{
//        echo "<tr><td colspan='" . ($i+1) . "'>No Results found!</td></tr>";
//    }
//    echo "</table>";
//
//
//
//}else{
//    echo "Error in running query :". mysqli_error($conn);
//}

<?php
ini_set('display_errors', 1);
include("./php/connectdb.php");

$sqlquery = "select * from language";

$result = $conn->query($sqlquery);

if($result||(mysqli_errno == 0))
{
    echo "<table width='100%'><tr>";

    if ($result->num_rows >0)
    {
        $sqlquery1="SHOW COLUMNS FROM language";
        $result1 = $conn->query($sqlquery1);

        while($row = $result1->fetch_assoc()){
            $columns[] = $row['Field'];
        }
        $i = 0;
        while ($i < $result->field_count)
        {
            echo "<th>". $columns[$i] . "</th>";
            $i++;
        }
        echo "</tr>";


        //display the data
        while ($rows = mysqli_fetch_array($result,MYSQLI_ASSOC))
        {
            echo "<tr>";
            foreach ($rows as $data)
            {
                echo "<td align='center'>". $data . "</td>";
            }
        }
    }else{
        echo "<tr><td colspan='" . ($i+1) . "'>No Results found!</td></tr>";
    }
    echo "</table>";
}else{
    echo "Error in running query :". mysqli_error();
}

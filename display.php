<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add a New Job</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.15/datatables.min.css"/>

    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.15/datatables.min.js"></script>

</head>

<body>
<p>


<!--<form method="post" >-->
<!--    Enter Number of rows to display per page: <input type=number name="NumRows">-->
<!--    <input type="submit" name="Init" value="Display Database entries" ><br>-->
<!--    --><?php //    main();    ?>
<!--<br>-->
<!--    <input type="submit" name="Next" value="Next">-->
<!--    <input type="submit" name="Previous" value="Previous">-->
<!---->
<!--</form>-->



<?php
$numrow = 0;
$index = 0;

if(isset($_POST['Init'])){
    $index = 0;
    $numrow = $_POST['NumRows'];
}
if(isset($_POST['Next'])){
    $index=$_POST['CurrentIndex']+1;
    $numrow = $_POST['CurrentRows'];
}

if(isset($_POST['Previous'])){
    $index=$_POST['CurrentIndex']-1;
    $numrow = $_POST['CurrentRows'];
}


    echo "<form method=\"post\" >
    Enter Number of rows to display per page: <input type=number name=\"NumRows\">
    <input type=\"submit\" name=\"Init\" value=\"Display Database entries\" ><br>
    <?php     main();    ?>
<br>
    <input type=\"submit\" name=\"Next\" value=\"Next\">
    <input type=\"submit\" name=\"Previous\" value=\"Previous\">
    <input type=\"hidden\" name=\"CurrentIndex\" value=\"".$index."\">
    <input type=\"hidden\" name=\"CurrentRows\" value=\"".$numrow."\">
</form>";

    include("connectdb.php");

    $sqlquery = "select * from employees limit ".$index*$numrow.",".$numrow;
    echo $sqlquery;
    if (!empty($conn)) {
        $result = mysqli_query($conn, $sqlquery);
    }
    $count = mysqli_num_rows($result);

    if ($count > 0) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            echo "emp no: " . $row["emp_no"] . " - Name: " . $row["first_name"] . " " . $row["last_name"] . "<br>";
        }
    } else {
        echo "0 results";
    }


?>
</body>
</html>
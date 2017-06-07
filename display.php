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
</head>

<body>
<p>

<form method="post" >
    Enter Number of rows to display per page: <input type=number name="NumRows">
    <input type="submit" value="Display Database entries" ><br>
</form>
</p>


<?php
//include("/db/connectdb.php");
$servername = "localhost";
$username = "root";
$password = "mysql";
$database = "employees";

//create conntion
$conn = mysqli_connect($servername, $username, $password,$database);
if(isset($_POST['NumRows'])) {
    $_COOKIE['start']=0;
    $_COOKIE['rows']=$_POST['NumRows'];

    $start=$_COOKIE['start'];
    $rows=$_COOKIE['rows'];
    $sqlquery = "select * from employees limit $start,$rows";
    $result = mysqli_query($conn,$sqlquery);
    $count = mysqli_num_rows($result);

    if ($count > 0) {
        while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
            echo "emp no: " . $row["emp_no"]. " - Name: " . $row["first_name"]. " " . $row["last_name"]. "<br>";
        }
    } else {
        echo "0 results";
    }



}
?>
</body>
</html>
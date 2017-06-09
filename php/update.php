<?php
/**
 * Created by PhpStorm.
 * User: omkar
 * Date: 9/6/17
 * Time: 5:02 PM
 */
include("connectdb.php");

$emp_no=$_POST['emp_no'];
$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];


$sqlquery = "update employees set emp_no=".$emp_no." , first_name=".$first_name." ,last_name=".$last_name;

if (!empty($conn)) {
    $result = mysqli_query($conn, $sqlquery);
    if($result){
        echo "<script language=\"JavaScript\">
    alert(\"Database Updated Successfully!!!\")
</script>";
    }
    else {
        echo "<script language=\"JavaScript\">
    alert(\"Update Failed!\")
</script>";
    }
}

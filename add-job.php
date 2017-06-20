<form method="post" >
    Enter Job Name: <input type="text" name="JobName"> <br>
    Enter Job Type: <select name="Type">
        <option name="E">Educated</option>
        <option name="U">UnEducated</option>
    </select><br>
    Enter Job Description: <input type="text" name="Description"> <br>
    Enter Salary: <input type="number" name="Salary"> <br>
    Enter Qualification: <select name="Qualification">
        <option name="C">College</option>
        <option name="H">High School</option>
        <option name="N">No School</option>
    </select><br>
    <input type="submit" value="Add into Database" ><br>

</form>

<?php
include("connectdb.php");
if(isset($_POST['JobName'])) {
    $JobName = $_POST['JobName'];
    $Type = $_POST['Type'];
    $Description = $_POST['Description'];
    $Salary = $_POST['Salary'];
    $Qualification = $_POST['Qualification'];
    $sqlquery = "Insert into RealLives.Jobs VALUE (NULL ,'$JobName','$Type','$Description','$Salary','$Qualification')";

    echo $sqlquery;
}
?>

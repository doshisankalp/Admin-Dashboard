<!DOCTYPE html>
<html lang="en" xmlns:display="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <title>Display Business</title>
    <script language="JavaScript" src="./js/DisplayLib.js"></script>
    <script language="JavaScript" src="./js/EditLib.js"></script>
    <script language="JavaScript" src="./js/UpdateLib.js"></script>
</head>
<body style="margin: 0px;">
<header> <?php include("./header.php"); ?> </header>
<div><?php include("./navigation.php"); ?></div>
<div><?php include("./side-navigation.php"); ?></div>
<div style="margin-left:25%">


    <div id="insert" style="display:none;">

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
        include("./php/connectdb.php");
        if(isset($_POST['JobName'])) {
            $JobName = $_POST['JobName'];
            $Type = $_POST['Type'];
            $Description = $_POST['Description'];
            $Salary = $_POST['Salary'];
            $Qualification = $_POST['Qualification'];
            $sqlquery = "Insert into RealLives.Jobs VALUE (NULL ,'$JobName','$Type','$Description','$Salary','$Qualification')";

            echo "Added into Database";
        }
        ?>
        <br>
        <button type="button" onclick="toggleVisibility(document.getElementById('insert'));toggleVisibility(document.getElementById('main-form'));">Cancel</button>
    </div>

    <div id="main-form" style="display:block">
        <form>
            <input type="number" id="numrow" placeholder="Number of rows">
            <button type="button" onclick="show(0)">Display</button><br/><br/>

            <button type="button" onclick="toggleVisibility(document.getElementById('insert'));toggleVisibility(document.getElementById('main-form'));"  >Insert / Add Data</button><br/><br/>

            <button type="button" onclick="show(-1)">Previous</button>
            <button type="button" onclick="show(1)">Next</button>
            <input type="text" id="searchBox" placeholder="Search" onchange="initSearch(this.value);show(0)">
            <button type="button" onclick="clearSearch();show(0)">Clear</button>
        </form>
    </div>

    <div id="display"></div>

</div>
<footer> <?php include("./footer.php"); ?> </footer>
</body>
</html>
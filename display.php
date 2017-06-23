<!DOCTYPE html>
<html lang="en" xmlns:display="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <title>Display Table using Ajax</title>
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

    <?php include("./add-job.php"); ?>
    <br>
    <button type="button" onclick="toggleVisibility(document.getElementById('insert'));toggleVisibility(document.getElementById('main-form'));">Cancel</button>
</div>

<div id="main-form" style="display:block">

    <select onchange="settablename(this.value)">
        <option selected>Select Table</option>
        <option value="businesses">Businesses</option>
        <option value="city">City</option>
        <option value="jobs">Jobs</option>
        <option value="language">Language</option>
        <option value="name_group">Name Group</option>
        <option value="names">Names</option>
        <option value="religion">Religion</option>
        <option value="world">World</option>
    </select>
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
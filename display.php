<!DOCTYPE html>
<html lang="en" xmlns:display="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <title>Display Table using Ajax</title>
    <script language="JavaScript" src="./js/DisplayLib.js"></script>
    <script language="JavaScript" src="./js/EditLib.js"></script>
    <script language="JavaScript" src="./js/UpdateLib.js"></script>
</head>
<body>
<header> <?php include("./header.php"); ?> </header>
<nav><?php include("./side-navigation.php"); ?></nav>
<div style="margin-left:25%">


<div id="insert" style="display:none;">
<script>toggleVisibility(document.getElementById('main-form')); </script>
    <?php include("./add-job.php"); ?>
</div>

<div id="main-form" style="display:block">
<form>
    <input type="number" id="numrow" placeholder="Number of rows">
    <button type="button" onclick="show(0)">Display</button><br/><br/>

    <button type="button" onclick="toggleVisibility(document.getElementById('insert'));"  >Insert / Add Data</button><br/><br/>

    <button type="button" onclick="show(-1)">Previous</button>
    <button type="button" onclick="show(1)">Next</button>
    <input type="text" id="searchBox" placeholder="Search" onchange="initSearch(this.value);show(0)">
    <button type="button" onclick="clearSearch();show(0)">Clear</button>
</form>
</div>

<div id="display"></div>
</div>
</body>
</html>
<!DOCTYPE html>
<html lang="en" xmlns:display="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <title>Display Table using Ajax</title>
    <script language="JavaScript" src="./js/DisplayLib.js"></script>
    <script language="JavaScript" src="./js/EditLib.js"></script>
    <script language="JavaScript" src="./js/UpdateLib.js"></script>
    <link rel="stylesheet" href="./css/pure-min.css">
</head>
<body style="margin: 0px;">
<header> <?php include("./header.php"); ?> </header>

<div><?php include("./navigation.php"); ?></div>
<div><?php include("./side-navigation.php"); ?></div>
<div style="margin-left:25%">


<div id="main-form" style="display:block">

<form>
<span style="display:block; height: 20px;"></span>

    <input type="number" id="numrow" placeholder="Rows = 10" onchange="show(0)">
<span style="display:inline-block; width: 50px;"></span>

    <button type="button" onclick="addRows()"  >Insert / Add Data</button>
<span style="display:block; height: 20px;"></span>

    <button type="button" onclick="show(-1)">Previous</button>
<span style="display:inline-block; width: 40px;"></span>

    <button type="button" onclick="show(1)">Next</button>
<span style="display:inline-block; width: 50px;"></span>

    <input type="text" id="searchBox" placeholder="Search" onchange="initSearch(this.value);show(0)">
    <button type="button" onclick="clearSearch();show(0)">Clear Search</button>
<span style="display:block; height: 20px;"></span>

</form>
</div>

<div id="display">
    <span style="display:block; height: 350px;"></span>

</div>


</div>

<span style="display:block; height: 20px;"></span>
<footer> <?php include("./footer.php"); ?> </footer>

</body>
</html>
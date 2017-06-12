<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Display Table using Ajax</title>
    <script language="JavaScript" src="./js/DisplayLib.js"></script>
    <script language="JavaScript" src="./js/EditLib.js"></script>
    <script language="JavaScript" src="./js/UpdateLib.js"></script>


</head>
<body>
<form>

    <input type="number" id="numrow" placeholder="Number of rows">
    <button type="button" onclick="show(0)">Display</button><br/><br/>

    <button type="button" onclick="show(-1)">Previous</button>
    <button type="button" onclick="show(1)">Next</button>
    <input type="text" id="searchBox" placeholder="Search" onchange="initSearch(this.value);show(0)">
    <button type="button" onclick="clearSearch();show(0)">Clear</button>
</form>
<div id="display"></div>
</body>
</html>
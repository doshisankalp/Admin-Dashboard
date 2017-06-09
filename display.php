<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Display Table using Ajax</title>
    <script language="JavaScript" src="./js/DisplayLib.js"></script>
    <script language="JavaScript" src="./js/EditLib.js"></script>

</head>
<body>
<form>

    Enter Number of Rows:  <input type="number" name="numrow" id="numrow"><br>

    <button type="button" onclick="show(0)">Display</button><br/><br/>

    <button type="button" onclick="show(-1)">Previous</button>
    <button type="button" onclick="show(1)">Next</button>

</form>
<div id="display"></div>
</body>
</html>
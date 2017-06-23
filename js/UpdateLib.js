/**
 * Created by omkar on 9/6/17.
 */
importScripts("DisplayLib");
function updateTable(value,qText,primaryName) {

    var xhttp;

    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            //CHECKING IF SUCCESS
        }
    }

    xhttp.open("POST", "./php/update.php");
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("tablename="+tablename+"&primary="+primaryName+'&val=' + value+'&qText='+qText);


}

function deleteRow(i,z){

    var key = document.getElementById(i+"_"+z).innerText;

    var xhttp;

    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            //CHECKING IF SUCCESS
        }
    }

    xhttp.open("POST", "./php/delete.php");
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhttp.send('key=' + key+'&primary='+z+'&tablename='+tablename);
    show(0);
}
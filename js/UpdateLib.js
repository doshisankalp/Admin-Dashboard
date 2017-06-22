/**
 * Created by omkar on 9/6/17.
 */
importScripts("DisplayLib");
function updateTable(emp_no,qText,primaryName) {

    var xhttp;

    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            //CHECKING IF SUCCESS
        }
    }

    xhttp.open("POST", "./php/update.php");
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("tblnm="+tablename+"&pkm="+primaryName+'&val=' + emp_no+'&qText='+qText);


}

function deleteRow(i,z){
    alert(z);
    var emp_no = document.getElementById(i+"_"+z).innerText;

    var xhttp;

    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            //CHECKING IF SUCCESS
        }
    }

    xhttp.open("POST", "./php/delete.php");
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    alert(emp_no+z+tablename);
    xhttp.send('emp_no=' + emp_no+'&pk='+z+'&tbln='+tablename);
    show(0);
}
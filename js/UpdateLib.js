/**
 * Created by omkar on 9/6/17.
 */

function updateTable(emp_no,qText) {

    var xhttp;

    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            //CHECKING IF SUCCESS
        }
    }

    xhttp.open("POST", "./php/update.php");
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send('emp_no=' + emp_no+'&qText='+qText);
    //+ '&first_name=' + first_name+'&last_name'+last_name

}

function deleteRow(i) {
    var emp_no = document.getElementById(i+"_emp_no").innerText;

    var xhttp;

    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            //CHECKING IF SUCCESS
        }
    }

    xhttp.open("POST", "./php/delete.php");
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send('emp_no=' + emp_no);
    show(0);
}
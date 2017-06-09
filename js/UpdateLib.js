/**
 * Created by omkar on 9/6/17.
 */
var emp_no,first_name,last_name;

function updateTable() {

    var xhttp;

    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("display").innerHTML = this.responseText;
        }

    }

    xhttp.open("POST", "./php/update.php");
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send('emp_no=' + emp_no + '&first_no=' + first_name+'&last_name'+last_name);

}
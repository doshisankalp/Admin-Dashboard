/**
 * Created by omkar on 9/6/17.
 */

var startindex=0,numrow=10;
var searching = "";

function initSearch(search){
    startindex = 0;
    searching = search;
}

function clearSearch() {
    searching = "";
    startindex = 0;
    document.getElementById("searchBox").value = "";
}

function show(direction) {
    if(document.getElementById("numrow").value!='') {
        numrow = parseInt(document.getElementById("numrow").value);
    }
    var xhttp;
    if(direction==1) {
        startindex=startindex+numrow;
    } else if(direction==-1) {
        startindex=startindex-numrow;
    }
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            // alert(this.responseText);
            if(this.responseText == ' '){
                document.getElementById("display").innerHTML = "0 Results";
            }
            else {
                var jsonrows = JSON.parse(this.responseText);
                //document.getElementById("display").innerHTML = this.responseText;
                jsonrows = jsonrows.rows;
                var tablestr = "<table>";
                for (var i = 0; i < jsonrows.length; i++) {
                    tablestr += "<tr>";
                    tablestr += "<td id='" + i + "_emp_no'>" + jsonrows[i].emp_no + "</td>";
                    tablestr += "<td id='" + i + "_first_name' onclick='edit(this)'>" + jsonrows[i].first_name + "</td>";
                    tablestr += "<td id='" + i + "_last_name' onclick='edit(this)'>" + jsonrows[i].last_name + "</td>";
                    tablestr += "<td onclick='deleteRow("+i+")'>X</td>";
                    tablestr += "</tr>"
                }
                tablestr += "</table>";
                document.getElementById("display").innerHTML = tablestr;
            }
        }

    }

    xhttp.open("POST", "./php/display.php");
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send('startindex=' + startindex + '&numrow=' + numrow + '&searchQ='+searching);

}
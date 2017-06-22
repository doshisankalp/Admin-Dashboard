/**
 * Created by omkar on 9/6/17.
 */

var startindex=0,numrow=10;
var searching = "";
var tablename;

function settablename(temp) {
    tablename=temp;
}
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
        if(startindex>=0) {
            startindex = startindex - numrow;
        }
    }
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            if(this.responseText == ' '){
                document.getElementById("display").innerHTML = "0 Results";
            }
            else {
                var jsonrows = JSON.parse(this.responseText);
                var columns=jsonrows[0];
                jsonrows = jsonrows[1].rows;
                var tablestr = "<table>";
                for (var i = 0; i < jsonrows.length; i++) {
                    tablestr += "<tr id='"+columns[0]+"'>";
                for(var j=0;j<columns.length; j++) {
                    tablestr += "<td id='" + i + "_"+columns[j]+"' onclick='edit(this)'>" + jsonrows[i][j] + "</td>";
                }
                    tablestr += "<td onclick='deleteRow("+i+",\""+columns[0]+"\")'>X</td>";
                    tablestr += "</tr>"
                }
                tablestr += "</table>";
                document.getElementById("display").innerHTML = tablestr;
            }
        }

    }

    xhttp.open("POST", "./php/trial.php");
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send('tablename='+tablename+'&startindex=' + startindex + '&numrow=' + numrow + '&searchQ='+searching);

}

var toggleVisibility = function(element) {
    if(element.style.display=='block'){
        element.style.display='none';
    } else {
        element.style.display='block';
    }
};
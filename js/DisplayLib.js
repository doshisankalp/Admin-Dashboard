/**
 * Created by omkar on 9/6/17.
 */

var startindex=0,numrow=10;
var searching = "";
var tablename;
var columns;

function settablename(temp) {
    tablename=temp;
    startindex=0;
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
                columns=jsonrows[0];
                jsonrows = jsonrows[1].rows;
                var tablestr = "<table id=\"dbtable\" class='pure-table'>";

                for(var j=0;j<columns.length; j++) {
                    tablestr += "<th>" + columns[j] + "</th>";
                }
                tablestr += "<th><b>Delete</b></th>";
                for (var i = 0; i < jsonrows.length; i++) {
                    tablestr += "<tr id='"+columns[0]+"'>";



                for(var j=0;j<columns.length; j++) {
                    tablestr += "<td id='" + i + "_"+columns[j]+"' onclick='edit(this)'>" + jsonrows[i][j] + "</td>";
                }
                    tablestr += "<td onclick='deleteRow("+i+",\""+columns[0]+"\")'><img src=\"./images/delete.png\" height=\"25\" width=\"25\"></td>";
                    tablestr += "</tr>"
                }
                tablestr += "</table>";
                document.getElementById("display").innerHTML = tablestr;
            }
        }

    };

    xhttp.open("POST", "./php/display.php");
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

function addRows() {
    var table = document.getElementById("dbtable");
    var inrhtml = table.innerHTML;
    var toAdd = "<tr><td></td>";
    for(var j=1;j<columns.length; j++) {
        //tablestr += "<th>" + columns[j] + "</th>";
        toAdd += "<td><input id='"+columns[j]+"' type='text' placeholder='"+columns[j]+"'></td>";
    }
    toAdd += "<td><img onclick='insertData()' src='./images/tick.png' height=\"25\" width=\"25\"></td></tr>";
    var z = inrhtml.indexOf("</tr>")+5;
    var temp = inrhtml.substr(0,z);
    temp += toAdd;
    temp += inrhtml.substr(z);
    //alert(temp);
    table.innerHTML = temp;
}

function insertData() {
    var query="";

    for (var j=1;j<columns.length;j++){
        query+=columns[j]+"="+document.getElementById(columns[j]).value+"&";
    }
    var l=query.length-1;
    var query=query.substr(0,l);

    var xhttp;

    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            //CHECKING IF SUCCESS
            alert(this.responseText);
            show(0);
        }
    };

    xhttp.open("POST", "./php/adddata.php");
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("tablename="+tablename+"&"+query);



}
/** @type {number} */
var startindex = 0;
/** @type {number} */
var numrow = 10;
/** @type {string} */
var searching = "";
var tablename;
var columns;
/**
 * @param {number} dataAndEvents
 * @return {undefined}
 */
function settablename(dataAndEvents) {
    /** @type {number} */
    tablename = dataAndEvents;
    /** @type {number} */
    startindex = 0;
}
/**
 * @param {string} dataAndEvents
 * @return {undefined}
 */
function initSearch(dataAndEvents) {
    /** @type {number} */
    startindex = 0;
    /** @type {string} */
    searching = dataAndEvents;
}
/**
 * @return {undefined}
 */
function clearSearch() {
    /** @type {string} */
    searching = "";
    /** @type {number} */
    startindex = 0;
    /** @type {string} */
    document.getElementById("searchBox").value = "";
}
/**
 * @param {number} positions
 * @return {undefined}
 */
function show(positions) {
    if (document.getElementById("numrow").value != "") {
        /** @type {number} */
        numrow = parseInt(document.getElementById("numrow").value);
    }
    var ajax;
    if (positions == 1) {
        startindex = startindex + numrow;
    } else {
        if (positions == -1) {
            if (startindex >= 0) {
                /** @type {number} */
                startindex = startindex - numrow;
            }
        }
    }
    /** @type {XMLHttpRequest} */
    ajax = new XMLHttpRequest;
    /**
     * @return {undefined}
     */
    ajax.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            if (this.responseText == " ") {
                /** @type {string} */
                document.getElementById("display").innerHTML = "0 Results";
            } else {
                /** @type {*} */
                var codeSegments = JSON.parse(this.responseText);
                columns = codeSegments[0];
                codeSegments = codeSegments[1].rows;
                /** @type {string} */
                var xhtml = "<table id=\"dbtable\" class='pure-table pure-table-bordered pure-table-striped'>";
                /** @type {number} */
                var j = 0;
                for (;j < columns.length;j++) {
                    xhtml += "<th>" + columns[j] + "</th>";
                }
                xhtml += "<th><b>Delete</b></th>";
                /** @type {number} */
                var i = 0;
                for (;i < codeSegments.length;i++) {
                    xhtml += "<tr id='" + columns[0] + "'>";
                    /** @type {number} */
                    j = 0;
                    for (;j < columns.length;j++) {
                        xhtml += "<td id='" + i + "_" + columns[j] + "' onclick='edit(this)'>" + codeSegments[i][j] + "</td>";
                    }
                    xhtml += "<td onclick='deleteRow(" + i + ',"' + columns[0] + '")\'><img src="./images/delete.png" height="25" width="25"></td>';
                    xhtml += "</tr>";
                }
                xhtml += "</table>";
                /** @type {string} */
                document.getElementById("display").innerHTML = xhtml;
            }
        }
    };
    ajax.open("POST", "./php/display.php");
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajax.send("tablename=" + tablename + "&startindex=" + startindex + "&numrow=" + numrow + "&searchQ=" + searching);
}
/**
 * @param {Element} elm
 * @return {undefined}
 */
var toggleVisibility = function(elm) {
    if (elm.style.display == "block") {
        /** @type {string} */
        elm.style.display = "none";
    } else {
        /** @type {string} */
        elm.style.display = "block";
    }
};
/**
 * @return {undefined}
 */
function addRows() {
    /** @type {(HTMLElement|null)} */
    var node = document.getElementById("dbtable");
    /** @type {string} */
    var text = node.innerHTML;
    /** @type {string} */
    var token_secret = "<tr><td></td>";
    /** @type {number} */
    var i = 1;
    for (;i < columns.length;i++) {
        token_secret += "<td><input id='" + columns[i] + "' type='text' placeholder='" + columns[i] + "'></td>";
    }
    token_secret += "<td><img onclick='insertData()' src='./images/tick.png' height=\"25\" width=\"25\"></td></tr>";
    /** @type {number} */
    var index = text.indexOf("</tr>") + 5;
    /** @type {string} */
    var key = text.substr(0, index);
    key += token_secret;
    key += text.substr(index);
    /** @type {string} */
    node.innerHTML = key;
}
/**
 * @return {undefined}
 */
function insertData() {
    /** @type {string} */
    var string = "";
    /** @type {number} */
    var i = 1;
    for (;i < columns.length;i++) {
        string += columns[i] + "=" + document.getElementById(columns[i]).value + "&";
    }
    /** @type {number} */
    var length = string.length - 1;
    /** @type {string} */
    string = string.substr(0, length);
    var ajax;
    /** @type {XMLHttpRequest} */
    ajax = new XMLHttpRequest;
    /**
     * @return {undefined}
     */
    ajax.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            alert(this.responseText);
            show(0);
        }
    };
    ajax.open("POST", "./php/adddata.php");
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajax.send("tablename=" + tablename + "&" + string);
}
;
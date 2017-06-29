importScripts("DisplayLib");
/**
 * @param {string} newTableData
 * @param {string} data
 * @param {string} provisionedThroughput
 * @return {undefined}
 */
function updateTable(newTableData, data, provisionedThroughput) {
    var xhr;
    /** @type {XMLHttpRequest} */
    xhr = new XMLHttpRequest;
    /**
     * @return {undefined}
     */
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        }
    };
    xhr.open("POST", "./php/update.php");
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("tablename=" + tablename + "&primary=" + provisionedThroughput + "&val=" + newTableData + "&qText=" + data);
}
/**
 * @param {string} item
 * @param {string} index
 * @return {undefined}
 */
function deleteRow(item, index) {
    var innerText = document.getElementById(item + "_" + index).innerText;
    var ajax;
    /** @type {XMLHttpRequest} */
    ajax = new XMLHttpRequest;
    /**
     * @return {undefined}
     */
    ajax.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        }
    };
    ajax.open("POST", "./php/delete.php");
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajax.send("key=" + innerText + "&primary=" + index + "&tablename=" + tablename);
    show(0);
}
;

function set(z) {
    //HTTP Request for the same
    var xhttp;

    if(direction==1) {
        startindex=startindex+numrow;
    } else if(direction==-1) {
        startindex=startindex-numrow;
    }

    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("display").innerHTML = this.responseText;
        }

    }

    xhttp.open("POST", "./php/update.php");
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send('startindex=' + startindex + '&numrow=' + numrow);




    z.parentElement.onclick = function (z) {
        edit(z.parentElement);
    }
    z.parentElement.innerHTML = z.value;
}
function edit(z){
    z.innerHTML = "<input onchange='set(this)' type='text' value='"+z.innerText+"'>";
    z.onclick = "";
}
/**
 * Created by omkar on 9/6/17.
 */

var startindex=0,numrow=15;

function show(direction) {
    var xhttp;

    if(direction==1) {
        startindex=startindex+numrow;
    } else if(direction==-1) {
        startindex=startindex-numrow;
    }
    //document.getElementById("display").innerHTML ="Empty";
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("display").innerHTML = this.responseText;
        }

    }

    xhttp.open("POST", "display.php");
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // var str='index='+startindex+'&numrow='+numrow;
    // alert(str);
    xhttp.send('index=' + startindex + '&numrow=' + numrow);

}
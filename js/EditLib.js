var x;

function set(z,iniText) {
    x = z.parentElement;
    var id = x.id.substr(0,x.id.indexOf("_"));
    var s = x.id.substr(x.id.indexOf("_")+1)+"=\"" + z.value.toString()+"\"";
    if(z.value != iniText){
        updateTable(x.parentElement.firstChild.innerText,s,x.parentElement.id);
    }
    z.parentElement.onclick = (function(n){return function(){edit(n);};})(x);
    z.parentElement.innerHTML = z.value;
}
function edit(z){
    z.innerHTML = "<input onblur='set(this,\""+z.innerText+"\")' type='text' value='"+z.innerText+"'>";
    z.firstChild.focus();
    z.onclick = "";
}
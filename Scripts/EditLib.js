
function set(z) {
    //HTTP REQUEST LATER MANN..
    z.parentElement.onclick = function (z) {
        edit(z.parentElement);
    }
    z.parentElement.innerHTML = z.value;
}
function edit(z){
    // alert();
    z.innerHTML = "<input onchange='set(this)' type='text' value='"+z.innerText+"'>";
    z.onclick = "";
}

function set(z) {
    //HTTP Request for the same

    z.parentElement.onclick = function (z) {
        edit(z.parentElement);
    }
    z.parentElement.innerHTML = z.value;
}
function edit(z){
    z.innerHTML = "<input onchange='set(this)' type='text' value='"+z.innerText+"'>";
    z.onclick = "";
}
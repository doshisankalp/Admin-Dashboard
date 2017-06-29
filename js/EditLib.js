var x;
/**
 * @param {Element} self
 * @param {?} value
 * @return {undefined}
 */
function set(self, value) {
    x = self.parentElement;
    var id = x.id.substr(0, x.id.indexOf("_"));
    /** @type {string} */
    var r20 = x.id.substr(x.id.indexOf("_") + 1) + '="' + self.value.toString() + '"';
    if (self.value != value) {
        updateTable(x.parentElement.firstChild.innerText, r20, x.parentElement.id);
    }
    self.parentElement.onclick = function(file) {
        return function() {
            edit(file);
        };
    }(x);
    self.parentElement.innerHTML = self.value;
}
/**
 * @param {Element} el
 * @return {undefined}
 */
function edit(el) {
    /** @type {string} */
    el.innerHTML = "<textarea style='height: " + el.clientHeight + "px;width: " + el.clientWidth + "px' onblur='set(this,\"" + el.innerText + "\")'>" + el.innerText + "</textarea>";
    el.firstChild.focus();
    /** @type {string} */
    el.onclick = "";
}
;
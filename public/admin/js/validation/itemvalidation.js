
//Chekcing Null
function validateItemInput() {
    var name = document.forms["itemform"]["name"];

    if (name.value == "" || name.value == null) {
        alert("Item Name Is Missing!");
        return false;
    }
}

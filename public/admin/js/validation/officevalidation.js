
//Null Checking
function validateOfficeInput() {
    var name = document.forms["officeform"]["name"];
    var des = document.forms["officeform"]["description"];

    if (name.value == "" || name.value == null) {
        alert("Enter office name!");
        return false;
    }else if(des.value == "" || des.value == null) {
        alert("Enter description!");
        return false;
    }
}
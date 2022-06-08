
//Null Checking
function validateRoleInput() {
    var role = document.forms["roleform"]["name"];
    var resp = document.forms["roleform"]["respons"];

    if (role.value == "" || role.value == null) {
        alert("Enter a role title!");
        return false;
    }else if(resp.value == "" || resp.value == null) {
        alert("Enter responsibility!");
        return false;
    }
}
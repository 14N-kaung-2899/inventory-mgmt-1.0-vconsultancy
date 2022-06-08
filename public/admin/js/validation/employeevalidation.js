
//Null Checking
function validateEmployeeInput() {
    var fname = document.forms["empform"]["fname"];
    var lname = document.forms["empform"]["lname"];
    var mail = document.forms["empform"]["pmail"];
    var phone = document.forms["empform"]["mobile"];
    var line1 = document.forms["empform"]["line1"];
    var line2 = document.forms["empform"]["line2"];

    if (fname.value == "" || fname.value == null) {
        alert("First name is missing!");
        return false;
    }else if (lname.value == "" || lname.value == null) {
        alert("Last name is missing!");
        return false;
    }else if (mail.value == "" || mail.value == null) {
        alert("Primary email is missing!");
        return false;
    }else if (phone.value == "" || phone.value == null) {
        alert("Primary phone is missing!");
        return false;
    }if (line1.value == "" || line1.value == null) {
        alert("Enter room & building information!");
        return false;
    }else if(line2.value == "" || line2.value == null) {
        alert("Enter street or road information!");
        return false;
    }
}
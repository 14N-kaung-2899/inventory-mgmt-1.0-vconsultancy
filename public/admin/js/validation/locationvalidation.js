
//Null Checking
function validateLocationInput() {
    var line1 = document.forms["locationform"]["line1"];
    var line2 = document.forms["locationform"]["line2"];

    if (line1.value == "" || line1.value == null) {
        alert("Enter room & building information!");
        return false;
    }else if(line2.value == "" || line2.value == null) {
        alert("Enter street or road information!");
        return false;
    }
}


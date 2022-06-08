
//Null Checking
function validateEmploymentInput() {
    var id = document.forms["employmentform"]["empid"];
    var salary = document.forms["employmentform"]["salary"];

    if (id.value == "" || id.value == null) {
        alert("ID Is Missing!");
        return false;
    }else if (salary.value == "" || salary.value == null){
        alert("Salary Is Missing!");
        return false;
    }
}
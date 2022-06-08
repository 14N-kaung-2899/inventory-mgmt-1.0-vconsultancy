
//Null Checking
function validatePayrollInput() {
    var holder = document.forms["payrollform"]["holder"];
    var acc = document.forms["payrollform"]["accno"];
    var bank = document.forms["payrollform"]["bank"];
    var line1 = document.forms["payrollform"]["line1"];
    var line2 = document.forms["payrollform"]["line2"];
    var swift = document.forms["payrollform"]["code"];

    if (holder.value == "" || holder.value == null) {
        alert("Enter account holder name!");
        return false;
    }else if(bank.value == "" || bank.value == null) {
        alert("Enter bank name!");
        return false;
    }else if (line1.value == "" || line1.value == null) {
        alert("Enter room & building information!");
        return false;
    }else if(line2.value == "" || line2.value == null) {
        alert("Enter street or road information!");
        return false;
    }else if (swift.value == "" || swift.value == null) {
        alert("Enter swift code!");
        return false;
    }
}



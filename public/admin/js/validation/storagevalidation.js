

function validateStorageInput() {
    var sid = document.forms["storageform"]["storageid"];
    var name = document.forms["storageform"]["name"];
    var des = document.forms["storageform"]["description"];    
    
    //5 digits Checking
    if(sid.value > 99999) { 
        alert("ID must be only 5 digits or lesser!");
        return false;
        
    }
    //Null Checking
    else if(sid.value == "" || sid.value == null) { 
        alert("Please enter storage ID!");
        return false;
    }else if(name.value == "" || name.value == null){
        alert("Please enter storage name!");
        return false;
    }else if(des.value == "" || des.value == null){
        alert("Please enter storage description!");
        return false;
    }
}




//Null Checking
function validateCategoryInput() {
    var name = document.forms["categoryform"]["name"];
    var des = document.forms["categoryform"]["description"];

    if (name.value == "" || name.value == null) {
        alert("Category Name Is Missing!");
        return false;
    }else if (des.value == "" || des.value == null){
        alert("Description Is Missing!");
        return false;
    }
}

store.validateEmail = function() {
    var atpos = email.indexOf("@");
    var dotpos = email.lastIndexOf(".");
    if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= email.length) {
        alert("Not a valid e-mail address");
        return false;
    }
    else {
        return true;
    }
};

store.lettersOnly = function (string){
    var letters = /^[A-Za-z]+$/;
    console.log('validation letters function ' + string);
    if (string.match(letters)) {
        return true;
    }
    else {
        alert('field must have alphabet characters only');
        return false;
    }
};

store.numbersOnly = function(number) {
    var numbers = /^[0-9]+$/;
    console.log('validation numbers function ' + number);
    if (number.value.match(numbers)) {
        return true;
    }
    else {
        alert('field must have numeric characters only');
        return false;
    }
};

store.checkForm = function() {
    var zip = document.forms["purchaseObject"]["zip"].value;
    store.numbersOnly(zip);

};
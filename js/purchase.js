store.validateForm = function() {

    // Variables
    var firstName = document.forms["purchaseObject"]["firstName"].value;
    var lastName = document.forms["purchaseObject"]["lastName"].value;
    var email = document.forms["purchaseObject"]["email"].value;
    var city = document.forms["purchaseObject"]["city"].value;
    var zipCode = document.forms["purchaseObject"]["zip"].value;

    // First Name
    lettersOnly(firstName);

    // Last Name
    lettersOnly(lastName);

    // City
    lettersOnly(city);

    // Zip Code
    numbersOnly(zipCode);

    // Email
    var atpos = email.indexOf("@");
    var dotpos = email.lastIndexOf(".");
    if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= email.length) {
        alert("Not a valid e-mail address");
        return false;
    }

}

store.lettersOnly = function (string){
    var letters = /^[A-Za-z]+$/;

    if (string.match(letters)) {
        return true;
    }
    else {
        alert('All names must have alphabet characters only');
        return false;
    }
}

store.numbersOnly = function(number) {
    var numbers = /^[0-9]+$/;
    if (number.value.match(numbers)) {
        return true;
    }
    else {
        alert('ZIP code must have numeric characters only');
        return false;
    }
}
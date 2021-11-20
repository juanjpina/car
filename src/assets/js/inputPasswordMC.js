/**
 * check password - modify password - mon compte
 */


/**  CHECK PASSWORD  ************************************/
let validateHandicap = false;
let validateCapital = false;
let validateNumber = false;
let validateSpecial = false;
let validateLength = false;
let validateMax = false;
let messageValue = "";
let mcMessagePass = document.getElementById('mcMessagePass');


mcPass.addEventListener("keyup", () => {
    mcMessagePass.innerHTML = ""
    const handicap = new RegExp("[a-z]");
    if (handicap.test(mcPass.value)) {
        validateHandicap = true;
    } else {
        validateHandicap = false;
        messageValue = "Il manque une minuscule"
    }
    const capital = new RegExp("[A-Z]")
    if (capital.test(mcPass.value)) {
        validateCapital = true;
    } else {
        validateCapital = false;
        messageValue = "Il manque une majuscule"
    }
    const number = new RegExp("[0-9]")
    if (number.test(mcPass.value)) {
        validateNumber = true;
    } else {
        validateNumber = false;
        messageValue = "Il manque un nombre"
    };
    const special = new RegExp("[\()=/!@#$%*-+]")
    if (special.test(mcPass.value)) {
        validateSpecial = true;
    } else {
        validateSpecial = false;
        messageValue = "Il manque un caractère spéciaux"
    };
    if (mcPass.value.length > 9) {
        validateLength = true;
    } else {
        messageValue = "Il doit contenir au moins 10 caractères"
    }
    if (mcPass.value.length < 17) {
        validateMax = true;
    } else {
        messageValue = "Il doit contenir au maximum 16 caractères"
    }

    if (validateHandicap && validateCapital && validateNumber && validateSpecial && validateLength && validateMax) {
        mcPass.style.border = '4px solid green';
    } else {
        mcPass.style.border = '4px solid red';
        mcMessagePass.innerHTML = messageValue;
    }
});






/** confirmPassword  *************************************/


mcConfPass.addEventListener("keyup", () => {
    // mcMessagePass.innerHTML = ""
    if (mcConfPass.value == mcPass.value) {
        mcConfPass.style.border = '4px solid green';
    } else {
        mcConfPass.style.border = '4px solid red';

    }

});



















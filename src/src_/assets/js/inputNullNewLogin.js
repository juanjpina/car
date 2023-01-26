/**
 * verification of empty fields in new user - login
 */

document.NLform.NLpseudo.focus();
let NLpseudo = document.getElementById("NLpseudo");
let pseudoMessage = document.getElementById("pseudoMessage");
let NLemail = document.getElementById('NLemail')
let NLpassword = document.getElementById("NLpassword");
let passwordMessage = document.getElementById("passwordMessage");
let NLconfirmPassword = document.getElementById("NLconfirmPassword");
let confirmPasswordMessage = document.getElementById("confirmPasswordMessage");

/** pseudo **********************************************/
let checkPseudo = (e) => {
    if (NLform.NLpseudo.value == 0) {
        pseudoMessage.innerHTML = "Le pesudo est vide"
        e.preventDefault();
    }
};
NLpseudo.addEventListener('keyup', () => {
    pseudoMessage.innerHTML = ""
})


/** email *************************************************/
let checkMail = (e) => {
    if (NLform.NLemail.value == 0) {
        emailMessage.innerHTML = "L'e-mail est vide"
        e.preventDefault();
    }
}

/** password **********************************************/
let checkPassword = (e) => {
    if (NLform.NLpassword.value == 0) {
        passwordMessage.innerHTML = "Le mot de passe est vide"
        e.preventDefault();
    }
};



/**  CHECK PASSWORD  ************************************/
let validateHandicap = false;
let validateCapital = false;
let validateNumber = false;
let validateSpecial = false;
let validateLength = false;
let validateMax = false;
let messageValue = "";
NLpassword.addEventListener("keyup", () => {
    passwordMessage.innerHTML = ""
    const handicap = new RegExp("[a-z]");
    if (handicap.test(NLpassword.value)) {
        validateHandicap = true;
    } else {
        validateHandicap = false;
        messageValue = "Il manque une minuscule"
    }
    const capital = new RegExp("[A-Z]")
    if (capital.test(NLpassword.value)) {
        validateCapital = true;
    } else {
        validateCapital = false;
        messageValue = "Il manque une majuscule"
    }
    const number = new RegExp("[0-9]")
    if (number.test(NLpassword.value)) {
        validateNumber = true;
    } else {
        validateNumber = false;
        messageValue = "Il manque un nombre"
    };
    const special = new RegExp("[\()=/!@#$%*-+]")
    if (special.test(NLpassword.value)) {
        validateSpecial = true;
    } else {
        validateSpecial = false;
        messageValue = "Il manque un caractère spéciaux"
    };
    if (NLpassword.value.length > 9) {
        validateLength = true;
    } else {
        messageValue = "Il doit contenir au moins 10 caractères"
    }
    if (NLpassword.value.length < 16) {
        validateMax = true;
    } else {
        messageValue = "Il doit contenir au maximum 16 caractères"
    }

    if (validateHandicap && validateCapital && validateNumber && validateSpecial && validateLength && validateMax) {
        NLpassword.style.border = '4px solid green';
    } else {
        NLpassword.style.border = '4px solid red';
        passwordMessage.innerHTML = messageValue;
    }
});


/** confirmPassword  *************************************/
let checkConfirmPassword = (e) => {
    if (NLform.NLconfirmPassword.value == 0) {
        confirmPasswordMessage.innerHTML = "Le mot de passe est vide"
        e.preventDefault();
    }
};
NLconfirmPassword.addEventListener("keyup", () => {
    confirmPasswordMessage.innerHTML = ""
    if (NLform.NLconfirmPassword.value == NLform.NLpassword.value) {
        NLconfirmPassword.style.border = '4px solid green';
    } else {
        NLconfirmPassword.style.border = '4px solid red';

    }

});


let check = (e) => {
    checkMail(e);
    checkPassword(e);
    checkConfirmPassword(e);
    checkPseudo(e);
}

NLform.addEventListener("submit", check);
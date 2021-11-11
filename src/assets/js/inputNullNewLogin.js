/**
 * verification of empty fields in new login
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
// inner.html='' -> checkMail.js 

/** password **********************************************/
const expressions = {
    handicap: /[a - z]/,
    capital: /[A-Z]/,
    sign: /[*]/
}


let checkPassword = (e) => {
    if (NLform.NLpassword.value == 0) {
        passwordMessage.innerHTML = "Le mot de passe est vide"
        e.preventDefault();
    }
};
NLpassword.addEventListener("keyup", () => {
    passwordMessage.innerHTML = ""

    // console.log(NLpassword.value);
    // if (NLpassword.value.search(/[a-z]/i) < 0) {
    // }
    if (NLpassword.value.match(/^(?=.* [a-z])$/)) {
        console.log('as');

    }
    const handicap = new RegExp("[a-z]");
    if (!handicap.test(NLpassword.value)) {
        NLpassword.style.border = '4px solid red';
        // passwordMessage.innerHTML = "Il manque une minuscule"
    } else {
        NLpassword.style.border = '4px solid green';
    }
    const capital = new RegExp("[A-Z]")
    if (!capital.test(NLpassword.value)) {
        NLpassword.style.border = '4px solid red';
        // passwordMessage.innerHTML = "Il manque une majuscule"
    } else {
        NLpassword.style.border = '4px solid green';
    }
    const number = new RegExp("[0-9]")
    if (!number.test(NLpassword.value)) {
        NLpassword.style.border = '4px solid red';
        // passwordMessage.innerHTML = "il manque un numéro"
    } else {
        NLpassword.style.border = '4px solid green';

    }
    if (NLpassword.value.length < 8 || NLpassword.value.length > 16) {
        console.log(NLpassword.value.length);
        NLpassword.style.border = '4px solid red';
    } else {
        NLpassword.style.border = '4px solid green';
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
});


let check = (e) => {
    checkMail(e);
    checkPassword(e);
    checkConfirmPassword(e);
    checkPseudo(e);
}

NLform.addEventListener("submit", check);








/**
 * verification of empty fields in new login
 */


document.NLform.NLpseudo.focus();
let NLpseudo = document.getElementById("NLpseudo");
let pseudoMessage = document.getElementById("pseudoMessage");
let NLemail = document.getElementById('NLemail')
// let emailMessage = document.getElementById("emailMessage");
// let messagePassword = document.getElementById("messagePassword");
let NLpassword = document.getElementById("NLpassword");
let passwordMessage = document.getElementById("passwordMessage");

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
// let emailLogin = document.getElementById('emailLogin');
// NLemail.addEventListener('keydown', () => {
//     emailMessage.innerHTML = ""
// })


/** password **********************************************/
let checkPassword = (e) => {
    if (NLform.NLpassword.value == 0) {
        passwordMessage.innerHTML = "Le mot de passe est vide"
        e.preventDefault();
    }
};
NLpassword.addEventListener("keyup", () => {
    passwordMessage.innerHTML = ""
});

/** confirmPassword  *************************************/






let check = (e) => {
    checkMail(e);
    checkPassword(e);
    checkPseudo(e);

}

NLform.addEventListener("submit", check);


// let passwordLogin = document.getElementById('passwordLogin')
// passwordLogin.addEventListener('keyup', () => {
//     messagePassword.innerHTML = ""

// })



NLemail.addEventListener("keyup", () => {
    let mail = NLemail.value;
    emailMessage.innerHTML = ""
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "send");
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded", true);
    xhr.send('mail=' + mail);
    xhr.onreadystatechange = function () {
        // console.log(xhr.responseText);

        if (xhr.responseText !== 'ok') {
            NLemail.style.border = '4px solid green';
        } else {
            NLemail.style.border = '4px solid red';
        }

    }

});









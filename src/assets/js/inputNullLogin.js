/**
 * verification of empty fields in login
 */


document.form.emailLogin.focus();

let messagePassword = document.getElementById("messagePassword");
let messageEmail = document.getElementById("messageEmail");

let checkMail = (e) => {
    if (form.emailLogin.value == 0) {
        messageEmail.innerHTML = "L'e-mail est vide"
        e.preventDefault();
    }
}

let checkPassword = (e) => {
    if (form.password.value == 0) {
        messagePassword.innerHTML = "Le mot de passe est vide"
        e.preventDefault();
    }
}

let check = (e) => {
    checkMail(e);
    checkPassword(e);
}

form.addEventListener("submit", check);

let emailLogin = document.getElementById('emailLogin');
emailLogin.addEventListener('keyup', () => {
    messageEmail.innerHTML = ""
})

let passwordLogin = document.getElementById('passwordLogin')
passwordLogin.addEventListener('keyup', () => {
    messagePassword.innerHTML = ""

})









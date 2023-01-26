
/**
 * new user- login.
 * data verification in real time(email)
 * @params string
 */

NLemail.addEventListener("keyup", () => {
    let mail = NLemail.value;
    emailMessage.innerHTML = "" //alert <p> message empty <p> 
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "send");
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded", true);
    xhr.send('mail=' + mail);
    xhr.onreadystatechange = function () {
        if (xhr.responseText !== 'ok') {
            NLemail.style.border = '4px solid green';
        } else {
            NLemail.style.border = '4px solid red';
        }
    }
});



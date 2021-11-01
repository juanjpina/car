
console.log('ok');

let mcEmail = document.getElementById('mc-email')
mcEmail.addEventListener("keyup", () => {
    let mail = mcEmail.value;
    const xhr2 = new XMLHttpRequest();
    xhr2.open("POST", "send");
    xhr2.setRequestHeader("Content-Type", "application/x-www-form-urlencoded", true);
    xhr2.send('mail=' + mail);
    xhr2.onreadystatechange = function () {

        if (xhr2.response !== 'ok') {
            mcEmail.style.border = '4px solid green';
        } else {
            mcEmail.style.border = '4px solid red';
        }

    }

});





let emails = document.getElementById('email')
emails.addEventListener("keyup", () => {
    let mail = emails.value;
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "send");
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded", true);
    xhr.send('mail=' + mail);
    xhr.onreadystatechange = function () {
        console.log(xhr.responseText);

        if (xhr.responseText !== 'ok') {
            emails.style.border = '4px solid green';
        } else {
            emails.style.border = '4px solid red';
        }

    }

});



